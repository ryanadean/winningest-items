<?php

class ParticipantStats extends \Phalcon\Mvc\Model
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
    public $assists;

    /**
     *
     * @var integer
     */
    public $champion_level;

    /**
     *
     * @var integer
     */
    public $deaths;

    /**
     *
     * @var integer
     */
    public $doubles;

    /**
     *
     * @var integer
     */
    public $firstblood_assist;

    /**
     *
     * @var integer
     */
    public $firstblood_kill;

    /**
     *
     * @var integer
     */
    public $firstinhib_assist;

    /**
     *
     * @var integer
     */
    public $firstinhib_kill;

    /**
     *
     * @var integer
     */
    public $firsttower_assist;

    /**
     *
     * @var integer
     */
    public $firsttower_kill;

    /**
     *
     * @var integer
     */
    public $gold;

    /**
     *
     * @var integer
     */
    public $gold_spent;

    /**
     *
     * @var integer
     */
    public $inhib_kills;

    /**
     *
     * @var integer
     */
    public $item0;

    /**
     *
     * @var integer
     */
    public $item1;

    /**
     *
     * @var integer
     */
    public $item2;

    /**
     *
     * @var integer
     */
    public $item3;

    /**
     *
     * @var integer
     */
    public $item4;

    /**
     *
     * @var integer
     */
    public $item5;

    /**
     *
     * @var integer
     */
    public $item6;

    /**
     *
     * @var integer
     */
    public $killing_sprees;

    /**
     *
     * @var integer
     */
    public $kills;

    /**
     *
     * @var integer
     */
    public $minions_killed;

    /**
     *
     * @var integer
     */
    public $jungle_minions_killed;

    /**
     *
     * @var integer
     */
    public $enemy_jungle_minions_killed;

    /**
     *
     * @var integer
     */
    public $team_jungle_minions_killed;

    /**
     *
     * @var integer
     */
    public $pentas;

    /**
     *
     * @var integer
     */
    public $quadras;

    /**
     *
     * @var integer
     */
    public $sight_wards_purchased;

    /**
     *
     * @var string
     */
    public $damage_dealt;

    /**
     *
     * @var string
     */
    public $champion_damage_dealt;

    /**
     *
     * @var string
     */
    public $damage_taken;

    /**
     *
     * @var string
     */
    public $damage_healed;

    /**
     *
     * @var string
     */
    public $cc_dealt;

    /**
     *
     * @var integer
     */
    public $tower_kills;

    /**
     *
     * @var integer
     */
    public $vision_wards_purchased;

    /**
     *
     * @var integer
     */
    public $wards_killed;

    /**
     *
     * @var integer
     */
    public $wards_placed;

    /**
     *
     * @var integer
     */
    public $winner;

    /**
     *
     * @var string
     */
    public $lane;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'participant_stats';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParticipantStats[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParticipantStats
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
