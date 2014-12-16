<?php

namespace WYUR\ShowsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="days")
 */
class Day
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $orderNum;
	
    /**
     * @ORM\OneToMany(targetEntity="Slot", mappedBy="day")
     */
    protected $slots;

    public function __construct()
    {
        $this->slots = new ArrayCollection();
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
     * @return Day
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
     * Set orderNum
     *
     * @param integer $orderNum
     * @return Day
     */
    public function setOrderNum($orderNum)
    {
        $this->orderNum = $orderNum;
    
        return $this;
    }

    /**
     * Get orderNum
     *
     * @return integer 
     */
    public function getOrderNum()
    {
        return $this->orderNum;
    }

    /**
     * Add slots
     *
     * @param \WYUR\ShowsBundle\Entity\Slot $slots
     * @return Day
     */
    public function addSlot(\WYUR\ShowsBundle\Entity\Slot $slots)
    {
        $this->slots[] = $slots;
    
        return $this;
    }

    /**
     * Remove slots
     *
     * @param \WYUR\ShowsBundle\Entity\Slot $slots
     */
    public function removeSlot(\WYUR\ShowsBundle\Entity\Slot $slots)
    {
        $this->slots->removeElement($slots);
    }

    /**
     * Get slots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlots()
    {
        return $this->slots;
    }
}
