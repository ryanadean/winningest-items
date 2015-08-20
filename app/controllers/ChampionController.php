<?php

use LeagueWrap\Api;

class ChampionController extends ControllerBase
{
    public function indexAction()
    {
    }

    public function updateAction()
    {
        // Connect to Riot Api and get champion data
        $key = '';
        $api = new Api($key);
        $champions = $api->staticData()->getChampions();

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
            $new_champion->save(
                array(
                    "champion_id" => $champion->id,
                    "champion_name" => $champion_name
                )
            );

            print("Inserted: " . $champion->id . " " . $champion_name . "<br>");
        }

    }    

    public function pageAction($champion_name)
    {
        print($champion_name);
    }  
}

