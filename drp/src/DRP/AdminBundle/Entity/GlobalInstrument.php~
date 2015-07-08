<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_global_instrument")
 */
class GlobalInstrument
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
    public $description;

 
    /**
     * @ORM\Column(type="integer")
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
     * Set type
     *
     * @param string $name
     * @return GlobalInstrument
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
     * Set description
     *
     * @param string $description
     * @return GlobalInstrument
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
     * @param integer $status
     * @return GlobalInstrument
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
     * Set creator_id
     *
     * @param integer $creatorId
     * @return GlobalInstrument
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
     * @return GlobalInstrument
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
     * @return GlobalInstrument
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
     * @return GlobalInstrument
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