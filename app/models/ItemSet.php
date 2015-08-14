<?php

class ItemSet extends \Phalcon\Mvc\Model
{
    
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
     * @var ItemSetBlock[]
     */
	public $blocks;
}
?>
