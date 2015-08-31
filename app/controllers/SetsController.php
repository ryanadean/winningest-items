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

        $all_item_sets = array();
        
        foreach($games as $game)
        {
            // Gets item list and sorts
            $game_items = implode(' ', sort(explode(' ', $game->items)));

            // If item set exists then increment, otherwise add in item set
            if (array_key_exists($item_array, $all_item_sets))
            {
                $all_item_sets['game_items'] += 1;
            }else
            {
                $all_item_sets += array('game_items' => 1);
            }
        }

        // Get item set with most wins
        $winningest_item_set = array_search(max($all_item_sets),$all_item_sets);

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
        $vs_phql = "";

        print("Executing query");
        $games = $manager->executeQuery($vs_phql, array("champion_id" => $champion_id, "vs_id" => $vs_id));
        
        $all_item_sets = array();
        
        foreach($games as $game)
        {
            // Gets item list and sorts
            $game_items = implode(' ', sort(explode(' ', $game->items)));

            // If item set exists then increment, otherwise add in item set
            if (array_key_exists($item_array, $all_item_sets))
            {
                $all_item_sets['game_items'] += 1;
            }else
            {
                $all_item_sets += array('game_items' => 1);
            }
        }

        // Get item set with most wins
        $winningest_item_set = array_search(max($all_item_sets),$all_item_sets);
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
