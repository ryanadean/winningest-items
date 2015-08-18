<?php

class HighestOverallWinLossItems extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    public $champion_id; 

    /**
     *
     * @var integer
     */
    public $item_set_id;

    /**
     * Update all champions' highest w/l matchup item sets
     *
     */
    public function updateAll()
    {
    }

    /**
     * Update specific champion's highest w/l matchup item set
     *
     */
    public function updateSpecific()
    {
    }

    /**
     * Get item set for specific champion
     *
     */ 
    public function getSpecific()
    {
    }

    /**
     * Get item sets for all champions
     *
     */ 
    public function getAll()
    {
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'highest_overall_win_loss_items';
    }

    public function initialize()
    {
        $this->hasOne("item_set_id", "ItemSet", "item_set_id");
    }
}
