<?php

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $champions = array('Ahri', 'Aatrox', 'Sejuani');
        //$champions = Champion::find();
        $this->view->setVar('champions',$champions);
    }
}
