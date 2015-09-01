<?php

use LeagueWrap\Api;
use Phalcon\Http\Response;

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
            $this->view->setVar('filename',$set_location); 
            $this->view->setVar('champion', $champion_name);
            $this->view->setVar('option_list', $combined_list);
        }
        else
        {
            $this->response->redirect('../');
        }
    }  

    // Causes user to download json
    public function downloadAction()
    {
        $this->view->disable(); 
        $filename = $this->request->getPost("filename");
        $json_string = $this->request->getPost("json_content");

        $response = new \Phalcon\Http\Response();
        $response->setHeader("Content-Type", "application/json");
        $response->setHeader("Content-Disposition", 'attachment; filename="' . $filename . '"');
        $response->setHeader("Content-Length" , strlen($json_string));
        $response->setContent($json_string);
        $response->send();
    }

    // Action to get the set for champion, then forwards to setAction
    public function getAction($champion_name)
    {
        // Get the user chosen options from POST data
        $item_set = $this->request->getPost("item_set");
        /**
        $skill_set = $this->request->getPost("skill_set");
        **/
        $combined_set = $this->request->getPost("combined_set");

        if($combined_set !== '')
        {
            $item_set = $combined_set;
            /**
            $skill_set = $combined_set;
            **/
        }

        // Get the kind of set type to find
        $item_type = ($item_set == "Overall") ? "overall" : "vs";
        /**
        $skill_type = ($skill_set == "Overall") ? "overall" : "vs";
        **/

        // Convert all champion names into IDs, to be used for CachedData conditionals
        $champion_id = Champion::findFirst(array("champion_name" => $champion_name))->champion_id;
        $vs_item_id = ($item_set == "Overall") ? "overall" : Champion::findFirst(array("champion_name" => $item_set))->champion_id;
        /**
        $vs_skill_id = ($skill_set == "Overall") ? "overall" : Champion::find(array("champion_name" => $skill_set))->champion_id;
        **/

        // 432 000 = 5 days in seconds
        $find_item_set = CachedData::findFirst(
            array(
                "type" => $item_type . "_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_item_id))
            )
        );

        $item_set_array = explode(' ', $find_item_set->value);

        /**
        $find_skill_set = CachedData::find(
            array(
                "type" => $skill_type . "_skill_set", 
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_skill_id))
            )
        );
        
        // Insert skill set into item set
        $json = json_decode($find_item_set->value, true);
        $json[blocks][0][type] = $find_skill_set->value;
        $json_data = json_encode($json);
        **/

        $compiled_item_set = 
        array(
            "title" => $champion_name . " vs " . $item_set,
            "type" => "custom",
            "map" => "any",
            "mode" => "any",
            "priority" => false,
            "sortrank" => 1,
            "blocks" => array(
                array(
                    "type" => "Basic Items",
                    "recMath" => false,
                    "minSummonerLevel" => -1,
                    "maxSummonerLevel" => -1,
                    "showIfSummonerSpell" => "",
                    "hideIfSummonerSpell" => "",
                    "items" => array(
                        "id" => "2003",
                        "count" => 1,
                        "id" => "3340",
                        "count" => 1,
                        "id" => "3341",
                        "count" => 1,
                        "id" => "3342",
                        "count" => 1,
                        "id" => "2044",
                        "count" => 1,
                        "id" => "2043",
                        "count" => 1
                    )
                ),
                array(
                    "type" => "Item Set",
                    "recMath" => false,
                    "minSummonerLevel" => -1,
                    "maxSummonerLevel" => -1,
                    "showIfSummonerSpell" => "",
                    "hideIfSummonerSpell" => "",
                    "items" => array(
                        array(
                            "id" => $item_set_array[0],
                            "count" => 1
                        ),
                        array(
                            "id" => $item_set_array[1],
                            "count" => 1,
                        ),
                        array(
                            "id" => $item_set_array[2],
                            "count" => 1,
                        ),
                        array(
                            "id" => $item_set_array[3],
                            "count" => 1,
                        ),
                        array(
                            "id" => $item_set_array[4],
                            "count" => 1,
                        ),
                        array(
                            "id" => $item_set_array[5],
                            "count" => 1
                        )
                    )
                )
            )    
        );

        // Get JSON data and location to be sent to user
        $filename= $champion_name . "vs" . $item_set . ".json";
        $json_string = json_encode($compiled_item_set); 
        // Send data back to user forwarding through setAction
        $this->dispatcher->forward(array(
            "action" => "set",
            "params" => array($champion_name, $filename, $json_string) 
            )
        );
    }
}

