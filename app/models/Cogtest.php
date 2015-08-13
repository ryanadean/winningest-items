<?php

class Cogtest extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $verify_key;

    /**
     *
     * @var string
     */
    public $verified_on;

    /**
     *
     * @var string
     */
    public $verified_ip;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cogtest';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cogtest[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Cogtest
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
