<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $champions = array('Ahri', 'Aatrox', 'Sejuani');
        //$champions = Champion::find();
        print(var_dump($champions));
        $this->view->setVar('champions', $champions);
    }

    public function championAction($champion_name)
    {
        print($champion_name);
    }
    
}

