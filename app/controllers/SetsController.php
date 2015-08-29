<?php

class SetsController extends ControllerBase
{
    public function indexAction()
    {
    }

    // Updates Item and Skill sets for overall option
    public function updateChampionOverallAction($champion_id)
    {
        $overall_phql = "
SELECT match_participant.id, match_participant.player_id, champion_id, summoner_1, summoner_2, team_id, item0, item1, item2, item3, item4, item5, item6, winner
FROM match_participant
INNER JOIN participant_stats ON match_participant.player_id = participant_stats.player_id
AND match_participant.id = participant_stats.id
WHERE champion_id = :champion_id
AND winner = 1";
        $champions = $manager->executeQuery($overall_phql, array("champion_id" => $champion_id));
        
        foreach($champions as $champion)
        {
            print($champion);
        }

        $overall_item_set = new CachedData();
        $overall_item_set->save(
            array(
                "type" => "overall_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                "value" => "",
                "updated_at" => time()
            )
        );

        $overall_skill_set = new CachedData();
        $overall_skill_set->save(
            array(
                "type" => "overall_skill_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                "value" => "",
                "updated_at" => time()
            )
        );
    }

    // Updates Item and Skill sets for matchups
    public function updateChampionVSAction($champion_id, $vs_id)
    {
        $vs_phql = "
SELECT t1.* FROM
(
SELECT match_participant.id, match_participant.player_id, champion_id, summoner_1, summoner_2, team_id, item0, item1, item2, item3, item4, item5, item6, winner
FROM match_participant
INNER JOIN participant_stats ON match_participant.player_id = participant_stats.player_id
AND match_participant.id = participant_stats.id
WHERE (champion_id = 1 AND winner = 1)
) t1
INNER JOIN
(
SELECT match_participant.id, match_participant.player_id, champion_id, summoner_1, summoner_2, team_id, item0, item1, item2, item3, item4, item5, item6, winner
FROM match_participant
INNER JOIN participant_stats ON match_participant.player_id = participant_stats.player_id
AND match_participant.id = participant_stats.id
WHERE (champion_id = 2 AND winner = 0)
) t2
ON t1.id = t2.id

WHERE t1.champion_id = :champion_id AND t2.champion_id = :vs_id";

        $champions = $manager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
        foreach($champions as $champion)
        {
            print($champion);
        }

        $vs_item_set = new CachedData();
        $vs_item_set->save(
            array(
                "type" => "vs_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                "value" => "",
                "updated_at" => time()
            )
        );

        $vs_skill_set = new CachedData();
        $vs_skill_set->save(
            array(
                "type" => "vs_skill_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                "value" => "",
                "updated_at" => time()
            )
        );
    }
}
