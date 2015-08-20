<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        set_include_path(dirname(__FILE__) . '/../config/');
        // Connect to database
        $config = new Phalcon\Config\Adapter\Php("champion.php");
        $connection = new \Phalcon\Db\Adapter\Pdo\Mysql($config->database->toArray());
        $champions = array();
        $results = $connection->fetchAll("SELECT * FROM champion");
        foreach($results as $result){
            array_push($champions, $result["champion_name"]);
        }
        $this->view->setVar('champions',$champions);
    }
}
