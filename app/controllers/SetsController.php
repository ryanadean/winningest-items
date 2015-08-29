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
        $champions = $manager->executeQuery($overall_phql, array("champion_id" => $champion_id));
        
        foreach($champions as $champion)
        {
            print($champion);
        }

        print("Inserting overall item set");
        $overall_item_set = new CachedData();
        $overall_item_set->save(
            array(
                "type" => "overall_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => "overall")), 
                "value" => "",
                "updated_at" => time()
            )
        );

        print("Inserting overall skill set");
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
        $champions = $manager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
        foreach($champions as $champion)
        {
            print($champion);
        }

        print("Inserting vs item set");
        $vs_item_set = new CachedData();
        $vs_item_set->save(
            array(
                "type" => "vs_item_set",
                "conditionals" => json_encode(array("champion_id" => $champion_id, "vs_id" => $vs_id)),
                "value" => "",
                "updated_at" => time()
            )
        );

        print("Inserting vs skill set");
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
