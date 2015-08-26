<?php

use LeagueWrap\Api;

class ChampionController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->redirect('../');
    }

    // Updates the list of champions
    public function updateAction()
    {
        // Connect to Riot Api and get champion data
        $key = '15db67da-4a5e-4628-bb75-fd8188b853a7';
        $api = new Api($key);
        $champions = $api->staticData()->getChampions();

        // Create transaction
        $manager = new \Phalcon\Mvc\Model\Transaction\Manager();
        $transaction = $manager->get();

        // Insert champion id and champion name into MySQL
        foreach($champions as $champion)
        {

            // Remove spaces, periods, and apostrophes from names to better correspond with img names
            $to_remove = array("'", ".", " ");
            $to_replace = array("", "", "");
            $champion_name = $champion->name; 
            $champion_name = str_replace($to_remove, $to_replace, $champion_name);

            // Make directory to hold each champions' item/skill sets
            mkdir("sets/" . $champion_name, 0664);

            // Insert champion id and name
            $new_champion = new Champion();
            $new_champion->setTransaction($transaction);
            $new_champion->save(
                array(
                    "champion_id" => $champion->id,
                    "champion_name" => $champion_name
                )
            );

            print("Inserted: " . $champion->id . " " . $champion_name . "<br>");
        }

        $transaction->commit();

    }    

    // Action to display champion page
    public function pageAction($champion_name)
    {
        // Try to find if $chamion_name exists in our list of champions
        $champion_exists= Champion::find(
            array(
                "columns" => "champion_name",
                "conditions" => "champion_name = '" . $champion_name . "'"
            )
        );

        // Make array for option selection list, prepending the "Overall" option
        $option_list = Champion::find(array("columns" => "champion_name", "order" => "champion_name"))->toArray();
        array_unshift($option_list, array("champion_name" => "Overall"));
        $option_list = array_values($option_list);

        // Make associative array with all keys == values for dropdown list
        $combined_list = array();
        foreach($option_list as $option)
        {
            array_push($combined_list, $option["champion_name"]);
        }
        $combined_list = array_combine($combined_list, $combined_list);

        // If valid champion name, show page.  If not then redirect to home
        if (count($champion_exists) == 1)
        {
            $this->view->setVar('champion', $champion_name);
            $this->view->setVar('option_list', $combined_list);
        }
        else
        {
            $this->response->redirect('../');
        }
    }  

    // Action to display champion page with set
    public function setAction($champion_name, $set_location, $json_string)
    {
        // Try to find if $chamion_name exists in our list of champions
        $champion_exists= Champion::find(
            array(
                "columns" => "champion_name",
                "conditions" => "champion_name = '" . $champion_name . "'"
            )
        );

        // Make array for option selection list, prepending the "Overall" option
        $option_list = Champion::find(array("columns" => "champion_name", "order" => "champion_name"))->toArray();
        array_unshift($option_list, array("champion_name" => "Overall"));
        $option_list = array_values($option_list);

        // Make associative array with all keys == values for dropdown list
        $combined_list = array();
        foreach($option_list as $option)
        {
            array_push($combined_list, $option["champion_name"]);
        }
        $combined_list = array_combine($combined_list, $combined_list);

        // If valid champion name, show page.  If not then redirect to home
        if (count($champion_exists) == 1)
        {
            $this->view->setVar('json_content', $json_string);
            $this->view->setVar('set_location',$set_location); 
            $this->view->setVar('champion', $champion_name);
            $this->view->setVar('option_list', $combined_list);
        }
        else
        {
            $this->response->redirect('../');
        }
    }  

    // Action to get the set for champion
    public function getAction($champion_name)
    {
        // Get the user chosen options from POST data
        $item_set = $this->request->getPost("item_set");
        $skill_set = $this->request->getPost("skill_set");
        $combined_set = $this->request->getPost("combined_set");


        $set_location = "sets/test.json";
        $json_string = file_get_contents($set_location); 
        $set_location = "../../" . "sets/test.json";

        // Send relevant data back to user
        $this->dispatcher->forward(array(
            "action" => "set",
            "params" => array($champion_name, $set_location, $json_string) 
            )
        );
    }
}

