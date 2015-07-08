<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_global_registration_type")
 */
class RegistrationType
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
    public $type;
     /**
     * @ORM\Column(type="string")
     */
    public $code;

    /**
     * @ORM\Column(type="string")
     */
    public $description;

	   /**
     * @ORM\Column(type="integer")
     */
    public $status;	
		   /**
     * @ORM\Column(type="string")
     */
    public $property_type;	




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
     * Set type
     *
     * @param string $title
     * @return RegistrationType
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set code
     *
     * @param integer $code
     * @return RegistrationType
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return RegistrationType
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
     * Set creator_id
     *
     * @param integer $creatorId
     * @return RegistrationType
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
     * @return RegistrationType
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
     * @return RegistrationType
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
     * @return RegistrationType
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

    /**
     * Set status
     *
     * @param integer $status
     * @return RegistrationType
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set property_type
     *
     * @param string $propertyId
     * @return RegistrationType
     */
    public function setPropertyId($propertyId)
    {
        $this->property_type = $propertyId;
    
        return $this;
    }

    /**
     * Get property_type
     *
     * @return string 
     */
    public function getPropertyId()
    {
        return $this->property_type;
    }

    /**
     * Set property_type
     *
     * @param string $propertyType
     * @return RegistrationType
     */
    public function setPropertyType($propertyType)
    {
        $this->property_type = $propertyType;
    
        return $this;
    }

    /**
     * Get property_type
     *
     * @return string 
     */
    public function getPropertyType()
    {
        return $this->property_type;
    }
}