<?php

use LeagueWrap\Api;

class ChampionController extends ControllerBase
{
    public function indexAction()
    {
    }

    public function updateAction()
    {
        set_include_path(dirname(__FILE__) . '/../config/');
        // Connect to database
        $config = new Phalcon\Config\Adapter\Php("champion.php");
        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());

        // Connect to Riot Api and get champion data
        $key = 'c7b81d50-420a-44d4-bfa3-fa97e86c0c0a';
        $api = new Api($key);
        $champions = $api->staticData()->getChampions();

        try{
            // Start transaction
            $connection->begin();

            // Insert champion id and champion name into MySQL
            foreach($champions as $champion)
            {

                // Remove spaces, periods, and apostrophes from names to better correspond with img names
                $champion_name = $champion->name; 
                $champion_name = str_replace(' ', '', $champion_name);
                $champion_name = str_replace("'", "", $champion_name);
                $champion_name = str_replace(".", "", $champion_name);

                // Insert champion id and champion name
                $connection->insert(
                    "champion",
                    array(
                        "champion_id" => $champion->id,
                        "champion_name" => $champion_name
                    )
                );

                print("Inserted: ");
                print($champion->id);
                print(" ");
                print($champion_name);
                print("<br>");

            }

            // Commit transaction
            $connection->commit();

        }catch (Exception $e){
            $connection->rollback();
        }

    }    

    public function pageAction($champion_name)
    {
        print($champion_name);
    }  
}

