<?php

class ItemSetBlockItem extends \Phalcon\Mvc\Model
{
    
    /**
     *
     * @var integer
     */
    public $item_set_block_item_id;
    /**
     *
     * @var string
     */	
	public $id;
    
    /**
     *
     * @var integer
     */	
	public $count;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'item_set_block_item';
    }

    public function initialize()
    {
        $this->belongsTo("item_set_block_item_id", "ItemSetBlock", "item_set_block_item_id");
    }
}
