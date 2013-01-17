<?php

namespace WYUR\ShowsBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity
 * @Vich\Uploadable
 * @ORM\Table(name="shows")
 */
class Show
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
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=100, unique=true)
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $image;

    /**
     * @Assert\File(
     *     maxSize="5M",
     *     mimeTypes={"image/png", "image/jpeg", "image/pjpeg"}
     * )
     * @Vich\UploadableField(mapping="show_image", fileNameProperty="image")
     *
     * @var File $imageFile
     */
    public $imageFile;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    protected $hosts;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $soundCloudID;

	/**
     * @ORM\OneToOne(targetEntity="Slot", inversedBy="show")
     * @ORM\JoinColumn(name="slot_id", referencedColumnName="id", nullable=true)
     */
    protected $slot;

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
     * @return Show
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
     * Set slug
     *
     * @param string $slug
     * @return Show
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Show
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set hosts
     *
     * @param string $hosts
     * @return Show
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;
    
        return $this;
    }

    /**
     * Get hosts
     *
     * @return string 
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Show
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set soundCloudID
     *
     * @param integer $soundCloudID
     * @return Show
     */
    public function setSoundCloudID($soundCloudID)
    {
        $this->soundCloudID = $soundCloudID;
    
        return $this;
    }

    /**
     * Get soundCloudID
     *
     * @return integer 
     */
    public function getSoundCloudID()
    {
        return $this->soundCloudID;
    }

    /**
     * Set slot
     *
     * @param \WYUR\ShowsBundle\Entity\Slot $slot
     * @return Show
     */
    public function setSlot(\WYUR\ShowsBundle\Entity\Slot $slot = null)
    {
        $this->slot = $slot;
    
        return $this;
    }

    /**
     * Get slot
     *
     * @return \WYUR\ShowsBundle\Entity\Slot 
     */
    public function getSlot()
    {
        return $this->slot;
    }
}