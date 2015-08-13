<?php

class MatchTeam extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $team_id;

    /**
     *
     * @var integer
     */
    public $match_id;

    /**
     *
     * @var integer
     */
    public $barons;

    /**
     *
     * @var integer
     */
    public $dragons;

    /**
     *
     * @var integer
     */
    public $first_baron;

    /**
     *
     * @var integer
     */
    public $first_blood;

    /**
     *
     * @var integer
     */
    public $first_dragon;

    /**
     *
     * @var integer
     */
    public $first_tower;

    /**
     *
     * @var integer
     */
    public $inhib_kills;

    /**
     *
     * @var integer
     */
    public $tower_kills;

    /**
     *
     * @var string
     */
    public $winner;

    /**
     *
     * @var integer
     */
    public $first_inhib;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'match_team';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchTeam[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchTeam
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
