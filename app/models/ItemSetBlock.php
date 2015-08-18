<?php

class ItemSetBlock extends \Phalcon\Mvc\Model
{
    
    /**
     *
     * @var integer
     */
    public $item_set_block_id;
    
    /**
     *
     * @var string
     */
	public $type;
    
    /**
     *
     * @var boolean
     */	
	public $rec_math;
    
    /**
     *
     * @var integer
     */	
	public $min_summoner_level;
    
    /**
     *
     * @var integer
     */	
	public $max_summoner_level;
    
    /**
     *
     * @var string
     */	
	public $show_if_summoner_spell;
    
    /**
     *
     * @var string
     */	
	public $hide_if_summoner_spell;
    
    /**
     *
     * @var integer
     */	
	public $item_set_block_item_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'item_set_block';
    }

    public function initialize()
    {
        $this->hasMany("item_set_block_item_id", "ItemSetBlockItem", "item_set_block_item_id");
        $this->belongsTo("item_set_block_id", "ItemSet", "item_set_block_id");
    }
}
