<?php

use LeagueWrap\Api;

class ChampionController extends ControllerBase
{
    public function indexAction()
    {
        $this->response->redirect('../');
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
        // Get list of champions
        $results = Champion::find(
            array(
                "columns" => "champion_name",
                "conditions" => "champion_name = '" . $champion_name . "'"
            )
        );

        // If valid champion name, show page.  If not then redirect to home
        if (count($results) == 1)
        {
            $this->view->setVar('champion', $champion_name);
        }
        else
        {
            $this->response->redirect('../');
        }
    }  
}

