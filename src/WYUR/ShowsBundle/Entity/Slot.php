<?php

namespace WYUR\ShowsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="slots")
 */
class Slot
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Day", inversedBy="slots")
     * @ORM\OrderBy({"orderNum" = "ASC"})
     * @ORM\JoinColumn(name="day_id", referencedColumnName="id")
     */
    protected $day;

    /**
     * @ORM\ManyToOne(targetEntity="Hour", inversedBy="slots")
     * @ORM\OrderBy({"orderNum" = "ASC"})
     * @ORM\JoinColumn(name="hour_id", referencedColumnName="id")
     */
    protected $hour;
	
    /**
     * @ORM\OneToOne(targetEntity="Show", mappedBy="slot")
     */
    private $show;

	public function __toString()
	{
		return $this->day->getName().' '.$this->hour->getName();
	}
	
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Slot
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set day
     *
     * @param \WYUR\ShowsBundle\Entity\Day $day
     * @return Slot
     */
    public function setDay(\WYUR\ShowsBundle\Entity\Day $day = null)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return \WYUR\ShowsBundle\Entity\Day 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set hour
     *
     * @param \WYUR\ShowsBundle\Entity\Hour $hour
     * @return Slot
     */
    public function setHour(\WYUR\ShowsBundle\Entity\Hour $hour = null)
    {
        $this->hour = $hour;
    
        return $this;
    }

    /**
     * Get hour
     *
     * @return \WYUR\ShowsBundle\Entity\Hour 
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Set show
     *
     * @param \WYUR\ShowsBundle\Entity\Show $show
     * @return Slot
     */
    public function setShow(\WYUR\ShowsBundle\Entity\Show $show = null)
    {
        $this->show = $show;
    
        return $this;
    }

    /**
     * Get show
     *
     * @return \WYUR\ShowsBundle\Entity\Show 
     */
    public function getShow()
    {
        return $this->show;
    }
}
