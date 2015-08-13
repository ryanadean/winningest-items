<?php

class MatchFrame extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $assigned_id;

    /**
     *
     * @var string
     */
    public $position;

    /**
     *
     * @var integer
     */
    public $current_gold;

    /**
     *
     * @var integer
     */
    public $total_gold;

    /**
     *
     * @var integer
     */
    public $minions_killed;

    /**
     *
     * @var integer
     */
    public $xp;

    /**
     *
     * @var integer
     */
    public $level;

    /**
     *
     * @var integer
     */
    public $timestamp;

    /**
     *
     * @var integer
     */
    public $match_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'match_frame';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchFrame[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchFrame
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
