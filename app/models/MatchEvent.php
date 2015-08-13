<?php

class MatchEvent extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $match_id;

    /**
     *
     * @var integer
     */
    public $assigned_id;

    /**
     *
     * @var string
     */
    public $event_type;

    /**
     *
     * @var string
     */
    public $position;

    /**
     *
     * @var integer
     */
    public $team_id;

    /**
     *
     * @var integer
     */
    public $timestamp;

    /**
     *
     * @var string
     */
    public $building_type;

    /**
     *
     * @var string
     */
    public $tower_type;

    /**
     *
     * @var integer
     */
    public $item_id;

    /**
     *
     * @var string
     */
    public $monster_type;

    /**
     *
     * @var string
     */
    public $lane;

    /**
     *
     * @var integer
     */
    public $killer_id;

    /**
     *
     * @var integer
     */
    public $victim_id;

    /**
     *
     * @var integer
     */
    public $assist_id1;

    /**
     *
     * @var integer
     */
    public $assist_id2;

    /**
     *
     * @var integer
     */
    public $assist_id3;

    /**
     *
     * @var integer
     */
    public $assist_id4;

    /**
     *
     * @var string
     */
    public $ward_type;

    /**
     *
     * @var integer
     */
    public $skill_slot;

    /**
     *
     * @var integer
     */
    public $item_slot;

    /**
     *
     * @var string
     */
    public $levelup_type;

    /**
     *
     * @var integer
     */
    public $item_before;

    /**
     *
     * @var string
     */
    public $item_after;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'match_event';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchEvent[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchEvent
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
