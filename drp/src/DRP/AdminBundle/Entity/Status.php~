<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_status")
 */
class Status
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @ORM\Column(type="string")
     */
   
    public $description;
   /**
     * @ORM\Column(type="string")
     */
    public $status;	
	    /**
     * @ORM\Column(type="integer")
     */
    public $creator_id;
         /**
     * @ORM\Column(type="datetime")
     */
    public $creation_datetime;
        /**
     * @ORM\Column(type="integer")
     */
    public $modifier_id;

        /**
     * @ORM\Column(type="datetime")
     */
    public $modification_datetime;


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
     * Set description
     *
     * @param string $description
     * @return Status
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
     * Set status
     *
     * @param string $status
     * @return Status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set creator_id
     *
     * @param integer $creatorId
     * @return Status
     */
    public function setCreatorId($creatorId)
    {
        $this->creator_id = $creatorId;
    
        return $this;
    }

    /**
     * Get creator_id
     *
     * @return integer 
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Set creation_datetime
     *
     * @param \DateTime $creationDatetime
     * @return Status
     */
    public function setCreationDatetime($creationDatetime)
    {
        $this->creation_datetime = $creationDatetime;
    
        return $this;
    }

    /**
     * Get creation_datetime
     *
     * @return \DateTime 
     */
    public function getCreationDatetime()
    {
        return $this->creation_datetime;
    }

    /**
     * Set modifier_id
     *
     * @param integer $modifierId
     * @return Status
     */
    public function setModifierId($modifierId)
    {
        $this->modifier_id = $modifierId;
    
        return $this;
    }

    /**
     * Get modifier_id
     *
     * @return integer 
     */
    public function getModifierId()
    {
        return $this->modifier_id;
    }

    /**
     * Set modification_datetime
     *
     * @param \DateTime $modificationDatetime
     * @return Status
     */
    public function setModificationDatetime($modificationDatetime)
    {
        $this->modification_datetime = $modificationDatetime;
    
        return $this;
    }

    /**
     * Get modification_datetime
     *
     * @return \DateTime 
     */
    public function getModificationDatetime()
    {
        return $this->modification_datetime;
    }
}