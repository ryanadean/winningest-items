<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        set_include_path(dirname(__FILE__) . '/../config/');
        // Connect to database
        $config = new Phalcon\Config\Adapter\Php("champion.php");
        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());

        // Make array for champion list
        $champions = array();
        // Get all champions in database
        $results = $connection->fetchAll("SELECT * FROM champion ORDER BY champion_name;");

        // Push each champion onto array
        foreach($results as $result){
            array_push($champions, $result["champion_name"]);
        }
        $this->view->setVar('champions',$champions);
    }
}
