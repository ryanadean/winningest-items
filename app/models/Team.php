<?php

class Team extends \Phalcon\Mvc\Model
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
    public $name;

    /**
     *
     * @var string
     */
    public $tag;

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
    public $captain_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'team';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Team[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Team
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
