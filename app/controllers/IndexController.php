<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        // Get all champions in database, don't need champion ids
        $results = Champion::find(
            array(
                "columns" => "champion_name",
                "order" => "champion_name"
            )
        );

        // Make array for champion list
        $champions = array();

        // Push each champion onto array
        foreach($results as $result){
            array_push($champions, $result->champion_name);
        }
        $this->view->setVar('champions',$champions);
    }
}
