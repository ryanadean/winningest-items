<?php

class MatchParticipant extends \Phalcon\Mvc\Model
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
    public $player_id;

    /**
     *
     * @var integer
     */
    public $champion_id;

    /**
     *
     * @var integer
     */
    public $summoner_1;

    /**
     *
     * @var integer
     */
    public $summoner_2;

    /**
     *
     * @var integer
     */
    public $team_id;

    /**
     *
     * @var integer
     */
    public $assigned_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'match_participant';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchParticipant[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return MatchParticipant
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
