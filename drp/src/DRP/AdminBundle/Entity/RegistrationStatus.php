<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_book_registrartion_status")
 */
class RegistrationStatus
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
    public $status;
     /**
     * @ORM\Column(type="integer")
     */
    public $book_id;

	     /**
     * @ORM\Column(type="string")
     */
    public $property_type;

    /**
     * @ORM\Column(type="string")
     */
    public $registrar_general_id;

	   /**
     * @ORM\Column(type="integer")
     */
    public $action_date;	
		 
    	

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
     * Set status
     *
     * @param string $status
     * @return RegistrationStatus
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
     * Set book_id
     *
     * @param integer $bookId
     * @return RegistrationStatus
     */
    public function setBookId($bookId)
    {
        $this->book_id = $bookId;
    
        return $this;
    }

    /**
     * Get book_id
     *
     * @return integer 
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * Set registrar_general_id
     *
     * @param string $registrarGeneralId
     * @return RegistrationStatus
     */
    public function setRegistrarGeneralId($registrarGeneralId)
    {
        $this->registrar_general_id = $registrarGeneralId;
    
        return $this;
    }

    /**
     * Get registrar_general_id
     *
     * @return string 
     */
    public function getRegistrarGeneralId()
    {
        return $this->registrar_general_id;
    }

    /**
     * Set action_date
     *
     * @param integer $actionDate
     * @return RegistrationStatus
     */
    public function setActionDate($actionDate)
    {
        $this->action_date = $actionDate;
    
        return $this;
    }

    /**
     * Get action_date
     *
     * @return integer 
     */
    public function getActionDate()
    {
        return $this->action_date;
    }

    /**
     * Set property_type
     *
     * @param string $propertyType
     * @return RegistrationStatus
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