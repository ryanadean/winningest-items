<?php

class Champion extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $champion_id;

    /**
     *
     * @var string
     */
    public $champion_name;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'champion';
    }
}
