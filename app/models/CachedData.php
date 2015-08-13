<?php

class CachedData extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $type;

    /**
     *
     * @var string
     */
    public $conditionals;

    /**
     *
     * @var string
     */
    public $value;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'cached_data';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return CachedData[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return CachedData
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
