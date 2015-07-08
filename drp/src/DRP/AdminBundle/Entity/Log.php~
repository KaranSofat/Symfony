<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_log")
 */
class Log
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
    public $event;
	   /**
     * @ORM\Column(type="string")
     */
    public $description;
   /**
     * @ORM\Column(type="string")
     */
    public $user_id;
   /**
     * @ORM\Column(type="string")
     */
    public $ip_address;
   /**
     * @ORM\Column(type="integer")
     */
    public $creator_id;
	   /**
     * @ORM\Column(type="datetime")
     */
    public $last_updated;





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
     * Set event
     *
     * @param string $event
     * @return Log
     */
    public function setEvent($event)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return string 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Log
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
     * Set user_id
     *
     * @param string $userId
     * @return Log
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return string 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set ip_address
     *
     * @param string $ipAddress
     * @return Log
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    
        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set creator_id
     *
     * @param integer $creatorId
     * @return Log
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
     * Set last_updated
     *
     * @param \DateTime $lastUpdated
     * @return Log
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->last_updated = $lastUpdated;
    
        return $this;
    }

    /**
     * Get last_updated
     *
     * @return \DateTime 
     */
    public function getLastUpdated()
    {
        return $this->last_updated;
    }

	public function __construct()
    {
        $this->setLastUpdated(new \DateTime());
        
    }

}