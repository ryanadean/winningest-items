<?php

class HighestWinLossSkills extends \Phalcon\Mvc\Model
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
     * Update all champions' highest w/l matchup skill sets
     *
     */
    public function updateAll()
    {
    }

    /**
     * Update specific champion's highest w/l matchup skill set
     *
     */
    public function updateSpecific()
    {
    }

    /**
     * Get skill set for specific champion
     *
     */ 
    public function getSpecific()
    {
    }

    /**
     * Get skill sets for all champions
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
        return 'highest_overall_win_loss_skills';
    }

    public function initialize()
    {
        $this->hasOne("item_set_id", "ItemSet", "item_set_id");
    }
}
