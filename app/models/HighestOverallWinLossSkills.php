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
        $this->hasMany("item_set_id", "ItemSet", "item_set_id");
    }
}
