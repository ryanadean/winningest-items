<?php

class ParticipantTimelineMeta extends \Phalcon\Mvc\Model
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
     * @var string
     */
    public $data_type;

    /**
     *
     * @var string
     */
    public $zero_ten;

    /**
     *
     * @var string
     */
    public $ten_twenty;

    /**
     *
     * @var string
     */
    public $twenty_thirty;

    /**
     *
     * @var string
     */
    public $thirty_end;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'participant_timeline_meta';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParticipantTimelineMeta[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ParticipantTimelineMeta
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
