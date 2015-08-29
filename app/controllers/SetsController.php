<?php

class SetsController extends ControllerBase
{
    public function indexAction()
    {
    }

    // Updates Item and Skill sets for overall option
    public function updateChampionOverallAction($champion_id)
    {
        $overall_phql = "";
        print("Executing query");
        $games = $manager->executeQuery($overall_phql, array("champion_id" => $champion_id));
        
        foreach($games as $game)
        {
            print($game);
        }

        print("Inserting overall item set into CachedData");
        $overall_item_set = new CachedData();
        $overall_item_set->save(
            array(
                "type" => "overall_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                "value" => "",
                "updated_at" => time()
            )
        );

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
    }

    // Updates Item and Skill sets for matchups
    public function updateChampionVSAction($champion_id, $vs_id)
    {
        $vs_phql = "";

        print("Executing query");
        $games = $manager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
        foreach($games as $game)
        {
            print($game);
        }

        print("Inserting vs item set into CachedData");
        $vs_item_set = new CachedData();
        $vs_item_set->save(
            array(
                "type" => "vs_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                "value" => "",
                "updated_at" => time()
            )
        );

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
    }
}
