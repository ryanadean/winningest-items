<?php

use Phalcon\Http\Response;

class SetController extends ControllerBase
{
    public function indexAction()
    {
    }

    public function getAction($champion_name)
    {
        $this->view->disable();
        $item_set = $this->request->getPost("item_set");
        $skill_set = $this->request->getPost("skill_set");
        $combined_set = $this->request->getPost("combined_set");

        $response = new Response();
        //$response->setContent($item_set . $skill_set . $combined_set);
        $response->setJsonContent(array("status" => "OK"));
        $response->redirect('../champion/page/' . $champion_name);
        $response->send();
    }

    public function downloadAction()
    {
        //file_put_contents($path, 'temp/' . $filename);
        $this->response->redirect('sets/test.json'); 
    }
}
