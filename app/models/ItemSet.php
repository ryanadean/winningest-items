<?php

class ItemSet extends \Phalcon\Mvc\Model
{
    
    /**
     *
     * @var integer
     */
    public $item_set_id; 

    /**
     *
     * @var string
     */
	public $title;
    
    /**
     *
     * @var string
     */
	public $type;
   
    /**
     *
     * @var string
     */
	public $map;
    
    /**
     *
     * @var string
     */
	public $mode;
   
    /**
     *
     * @var boolean
     */
	public $priority;
   
    /**
     *
     * @var integer
     */
	public $sort_rank;
   
    /**
     *
     * @var integer
     */
	public $item_set_block_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'item_set';
    }

    public function initialize()
    {
        $this->hasMany("item_set_block_id", "ItemSetBlock", "item_set_block_id");
        $this->hasManyToMany(
            "item_set_id",
            "HighestMatchupWinLossItems",
            "item_set_id",
            "HighestWinLossItems",
            "item_set_id"
        );
            
    }
}
