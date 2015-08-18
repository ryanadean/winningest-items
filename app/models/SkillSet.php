<?php

class SkillSet extends \Phalcon\Mvc\Model
{
    
    /**
     *
     * @var integer
     */
    public $skill_set_id;

    /**
     *
     * @var integer
     */	
	public $skill_1;

    /**
     *
     * @var integer
     */	
	public $skill_2;

    /**
     *
     * @var integer
     */	
	public $skill_3;

    /**
     *
     * @var integer
     */	
	public $skill_4;

    /**
     *
     * @var integer
     */	
	public $skill_5;

    /**
     *
     * @var integer
     */	
	public $skill_6;

    /**
     *
     * @var integer
     */	
	public $skill_7;

    /**
     *
     * @var integer
     */	
	public $skill_8;

    /**
     *
     * @var integer
     */	
	public $skill_9;

    /**
     *
     * @var integer
     */	
	public $skill_10;

    /**
     *
     * @var integer
     */	
	public $skill_11;

    /**
     *
     * @var integer
     */	
	public $skill_12;

    /**
     *
     * @var integer
     */	
	public $skill_13;

    /**
     *
     * @var integer
     */	
	public $skill_14;

    /**
     *
     * @var integer
     */	
	public $skill_15;

    /**
     *
     * @var integer
     */	
	public $skill_16;

    /**
     *
     * @var integer
     */	
	public $skill_17;

    /**
     *
     * @var integer
     */	
	public $skill_18;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'skill_set';
    }

    public function initialize()
    {
        $this->hasManyToMany(
            "skill_set_id",
            "HighestMatchupWinLossSkills",
            "skill_set_id",
            "HighestWinLossSkills",
            "skill_set_id"
        );
            
    }
}
