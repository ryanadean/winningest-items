<?php

class Player extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $region;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $rank;

    /**
     *
     * @var string
     */
    public $division;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $verified_on;

    /**
     *
     * @var integer
     */
    public $verified_ip;

    /**
     *
     * @var string
     */
    public $verofy_key;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'player';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Player[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Player
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
