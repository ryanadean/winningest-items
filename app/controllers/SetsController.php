<?php
ini_set('max_execution_time', 0);

use Phalcon\Mvc\Model\Query;

class SetsController extends ControllerBase
{
    public function indexAction()
    {
    }

    // Updates Item and Skill sets for overall option
    public function updateChampionOverallAction()
    {
        print("Finding champions: ");
        $champion_list = Champion::find(array("columns" => "champion_id"))->toArray();
        print("Champion list: " . $champion_list);

        foreach($champion_list as $champion)
        {
            $champion_id = $champion["champion_id"];

            $overall_phql = "SELECT MatchParticipant.id, MatchParticipant.player_id, champion_id, summoner_1, summoner_2, team_id, CONCAT(IFNULL(item0,''),' ',IFNULL(item1,''),' ',IFNULL(item2,''),' ',IFNULL(item3,''),' ',IFNULL(item4,''),' ',IFNULL(item5,'')) AS items, winner
FROM MatchParticipant 
INNER JOIN ParticipantStats ON MatchParticipant.player_id = ParticipantStats.player_id
AND MatchParticipant.id = ParticipantStats.id
WHERE champion_id = :champion_id:
AND winner = 1";
            print("Executing query for" . $champion_id. ": ");
            print($overall_phql);
            $games = $this->modelsManager->executeQuery($overall_phql, array("champion_id" => $champion_id));

            $all_item_sets = array();
       
            print("Analyzing "); 
            foreach($games as $game)
            {
                // Gets item list and sorts
                print("Game item list: " . $game->items);
                $items_as_array = explode(' ', $game->items);
                sort($items_as_array, SORT_NUMERIC);
                $game_items = implode(' ', $items_as_array);
                print(" [After sort: " . $game_items .  "]");

                // If item set exists then increment, otherwise add in item set
                if (array_key_exists($game_items, $all_item_sets))
                {
                    print("Incremented ");
                    $all_item_sets[$game_items] += 1;
                }else
                {
                    print("Added new ");
                    $all_item_sets += array($game_items => 1);
                }
            }

            // Get item set with most wins
            $winningest_item_set = array_search(max($all_item_sets),$all_item_sets);
            print($winningest_item_set);

            print("Inserting highest overall item set into CachedData");
            $overall_item_set = new CachedData();
            $overall_item_set->save(
                array(
                    "type" => "overall_item_set",
                    "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                    "value" => $winningest_item_set,
                    "updated_at" => date("Y-m-d H:I:s")
                )
            );
            /**
            print("Inserting overall skill set into CachedData");
            $overall_skill_set = new CachedData();
            $overall_skill_set->save(
                array(
                    "type" => "overall_skill_set",
                    "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                    "value" => "",
                    "updated_at" => time()
                )
            );
            **/
        }
    }

    // Updates Item and Skill sets for matchups
    public function updateChampionVSAction()
    {

        print("Finding champions: ");
        $champion_list = Champion::find(array("columns" => "champion_id"))->toArray();
        $vs_list = Champion::find(array("columns" => "champion_id"))->toArray();
        print("Champion list: " . $champion_list);
        print("VS Champion list: " . $vs_list);
        
        foreach($champion_list as $champion)
        {

            $champion_id = $champion["champion_id"];

            foreach($vs_list as $vs_champion)
            {

                $vs_id = $vs_champion["champion_id"];

                $vs_phql = "SELECT c1.id as matchId, c1.assigned_id as assignedId, CONCAT(IFNULL(stat.item0,''),' ',IFNULL(stat.item1,''),' ',IFNULL(stat.item2,''),' ',IFNULL(stat.item3,''),' ',IFNULL(stat.item4,''),' ',IFNULL(stat.item5,'')) AS items
        FROM MatchParticipant c1 
        JOIN MatchParticipant c2 ON c1.id = c2.id
        JOIN ParticipantStats stat ON c1.id = stat.id AND c1.player_id = stat.player_id WHERE c1.champion_id = :champion_id: AND c2.champion_id = :vs_id: AND c1.team_id != c2.team_id  AND stat.winner = 1";

                print("Executing query for" . $champion_id . "and" . $vs_id . ": ");
                print($vs_phql);
                $games = $this->modelsManager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
                $all_item_sets = array();
        
                print("Analyzing "); 
                foreach($games as $game)
                {
                    // Gets item list and sorts
                    $items_as_array = explode(' ', $game->items);
                    sort($items_as_array, SORT_NUMERIC);
                    $game_items = implode(' ', $items_as_array);

                    // If item set exists then increment, otherwise add in item set
                    if (array_key_exists($game_items, $all_item_sets))
                    {
                        $all_item_sets[$game_items] += 1;
                    }else
                    {
                        $all_item_sets += array($game_items => 1);
                    }
                }

                // Get item set with most wins
                $winningest_item_set = array_search(max($all_item_sets),$all_item_sets);
                print($winningest_item_set);

                $vs_item_set = new CachedData();
                $vs_item_set->save(
                    array(
                        "type" => "vs_item_set",
                        "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                        "value" => $winningest_item_set,
                        "updated_at" => date("Y-m-d H:I:s")
                    )
                );

                /**
                print("Inserting vs skill set into CachedData");
                $vs_skill_set = new CachedData();
                $vs_skill_set->save(
                    array(
                        "type" => "vs_skill_set",
                        "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                        "value" => "",
                        "updated_at" => time()
                    )
                );
                **/
            }
        }
    }
}
