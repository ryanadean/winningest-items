<?php

use LeagueWrap\Api;

class ChampionController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->redirect('../');
    }

    public function getAction()
    {
        sleep(5);
    }

    public function updateAction()
    {
        // Connect to Riot Api and get champion data
        $key = '';
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

    public function pageAction($champion_name)
    {
        // TODO: Check if vulnerable to SQL Injection O_o
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
}

