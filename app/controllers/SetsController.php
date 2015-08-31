<?php

use Phalcon\Mvc\Model\Query;

class SetsController extends ControllerBase
{
    public function indexAction()
    {
    }

    // Updates Item and Skill sets for overall option
    public function updateChampionOverallAction($champion_id)
    {
        $overall_phql = "SELECT MatchParticipant.id, MatchParticipant.player_id, champion_id, summoner_1, summoner_2, team_id, CONCAT(IFNULL(item0,''),' ',IFNULL(item1,''),' ',IFNULL(item2,''),' ',IFNULL(item3,''),' ',IFNULL(item4,''),' ',IFNULL(item5,''),' ',IFNULL(item6,'')) AS items, winner
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
            $game_items = implode(' ', sort(explode(' ', $game->items)));

            // If item set exists then increment, otherwise add in item set
            if (array_key_exists($game_items, $all_item_sets))
            {
                $all_item_sets['game_items'] += 1;
            }else
            {
                $all_item_sets += array('game_items' => 1);
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
                "updated_at" => time()
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

    // Updates Item and Skill sets for matchups
    public function updateChampionVSAction($champion_id, $vs_id)
    {
        $vs_phql = "SELECT t1.* FROM
(
SELECT MatchParticipant.id, MatchParticipant.player_id, champion_id, summoner_1, summoner_2, team_id, CONCAT(IFNULL(item0,''),' ',IFNULL(item1,''),' ',IFNULL(item2,''),' ',IFNULL(item3,''),' ',IFNULL(item4,''),' ',IFNULL(item5,''),' ',IFNULL(item6,'')) AS items, winner
FROM MatchParticipant
INNER JOIN ParticipantStats ON MatchParticipant.player_id = ParticipantStats.player_id
AND MatchParticipant.id = ParticipantStats.id
WHERE (champion_id = :champion_id: AND winner = 1)
) t1
INNER JOIN
(
SELECT MatchParticipant.id, MatchParticipant.player_id, champion_id, summoner_1, summoner_2, team_id, CONCAT(IFNULL(item0,''),' ',IFNULL(item1,''),' ',IFNULL(item2,''),' ',IFNULL(item3,''),' ',IFNULL(item4,''),' ',IFNULL(item5,''),' ',IFNULL(item6,'')) AS items, winner
FROM MatchParticipant
INNER JOIN ParticipantStats ON MatchParticipant.player_id = ParticipantStats.player_id
AND MatchParticipant.id = ParticipantStats.id
WHERE (champion_id = :vs_id: AND winner = 0)
) t2
ON t1.id = t2.id
WHERE t1.champion_id = :champion_id: AND t2.champion_id = :vs_id:";

        print("Executing query for" . $champion_id . "and" . $vs_id . ": ");
        print($vs_phql);
        $games = $this->modelsManager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
        $all_item_sets = array();
        
        print("Analyzing "); 
        foreach($games as $game)
        {
            // Gets item list and sorts
            $game_items = implode(' ', sort(explode(' ', $game->items)));

            // If item set exists then increment, otherwise add in item set
            if (array_key_exists($game_items, $all_item_sets))
            {
                $all_item_sets['game_items'] += 1;
            }else
            {
                $all_item_sets += array('game_items' => 1);
            }
        }

        // Get item set with most wins
        $winningest_item_set = array_search(max($all_item_sets),$all_item_sets);
        print($winningest_item_set);

        print("Inserting vs item set into CachedData");
        $vs_item_set = new CachedData();
        $vs_item_set->save(
            array(
                "type" => "vs_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                "value" => $winningest_item_set,
                "updated_at" => time()
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
