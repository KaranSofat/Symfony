<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_book")
 */
class Book
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
    public $registration_type;

   /**
     * @ORM\Column(type="string")
     */
    public $reference_number;

	  /**
     * @ORM\Column(type="text")
     */
    public $note;


   /**
     * @ORM\Column(type="string")
     */
    public $parent_reference_number;
   /**
     * @ORM\Column(type="string")
     */
    public $origin_reference_number;
	   /**
     * @ORM\Column(type="integer")
     */
    public $reference_in_register;
	   /**
     * @ORM\Column(type="string")
     */
    public $lomp;
	   /**
     * @ORM\Column(type="string")
     */
    public $lessor;
	   /**
     * @ORM\Column(type="string")
     */
    public $lessee;
	   /**
     * @ORM\Column(type="string")
     */
    public $grantor;
	   /**
     * @ORM\Column(type="string")
     */
    public $grantee;
	   /**
     * @ORM\Column(type="string")
     */
    public $stamp_duty;
	   /**
     * @ORM\Column(type="string")
     */
    public $or_number;
	   /**
     * @ORM\Column(type="string")
     */
    public $recipient;
	   /**
     * @ORM\Column(type="string")
     */
    public $instrument_type;
	   /**
     * @ORM\Column(type="string")
     */
    public $serial_number;

	   /**
     * @ORM\Column(type="string")
     */
    public $recipient_date;
		   /**
     * @ORM\Column(type="string")
     */
    public $execution_date;
		   /**
     * @ORM\Column(type="string")
     */
    public $receipt_date;

		   /**
     * @ORM\Column(type="string")
     */
    public $registrar_general_initial;
			   /**
     * @ORM\Column(type="string")
     */
    public $registering_party;
				   /**
     * @ORM\Column(type="string")
     */
    public $land_situation;


	   /**
     * @ORM\Column(type="datetime")
     */
    public $creator_id;
	   /**
     * @ORM\Column(type="integer")
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
     * Set registration_type
     *
     * @param integer $registrationType
     * @return Book
     */
    public function setRegistrationType($registrationType)
    {
        $this->registration_type = $registrationType;
    
        return $this;
    }

    /**
     * Get registration_type
     *
     * @return integer 
     */
    public function getRegistrationType()
    {
        return $this->registration_type;
    }

    /**
     * Set reference_number
     *
     * @param string $referenceNumber
     * @return Book
     */
    public function setReferenceNumber($referenceNumber)
    {
        $this->reference_number = $referenceNumber;
    
        return $this;
    }

    /**
     * Get reference_number
     *
     * @return string 
     */
    public function getReferenceNumber()
    {
        return $this->reference_number;
    }

    /**
     * Set parent_reference_number
     *
     * @param string $parentReferenceNumber
     * @return Book
     */
    public function setParentReferenceNumber($parentReferenceNumber)
    {
        $this->parent_reference_number = $parentReferenceNumber;
    
        return $this;
    }

    /**
     * Get parent_reference_number
     *
     * @return string 
     */
    public function getParentReferenceNumber()
    {
        return $this->parent_reference_number;
    }

    /**
     * Set origin_reference_number
     *
     * @param string $originReferenceNumber
     * @return Book
     */
    public function setOriginReferenceNumber($originReferenceNumber)
    {
        $this->origin_reference_number = $originReferenceNumber;
    
        return $this;
    }

    /**
     * Get origin_reference_number
     *
     * @return string 
     */
    public function getOriginReferenceNumber()
    {
        return $this->origin_reference_number;
    }

    /**
     * Set reference_in_register
     *
     * @param \DateTime $referenceInRegister
     * @return Book
     */
    public function setReferenceInRegister($referenceInRegister)
    {
        $this->reference_in_register = $referenceInRegister;
    
        return $this;
    }

    /**
     * Get reference_in_register
     *
     * @return \DateTime 
     */
    public function getReferenceInRegister()
    {
        return $this->reference_in_register;
    }

    /**
     * Set lomp
     *
     * @param string $lomp
     * @return Book
     */
    public function setLomp($lomp)
    {
        $this->lomp = $lomp;
    
        return $this;
    }

    /**
     * Get lomp
     *
     * @return string 
     */
    public function getLomp()
    {
        return $this->lomp;
    }

    /**
     * Set lessor
     *
     * @param string $lessor
     * @return Book
     */
    public function setLessor($lessor)
    {
        $this->lessor = $lessor;
    
        return $this;
    }

    /**
     * Get lessor
     *
     * @return string 
     */
    public function getLessor()
    {
        return $this->lessor;
    }

    /**
     * Set lessee
     *
     * @param string $lessee
     * @return Book
     */
    public function setLessee($lessee)
    {
        $this->lessee = $lessee;
    
        return $this;
    }

    /**
     * Get lessee
     *
     * @return string 
     */
    public function getLessee()
    {
        return $this->lessee;
    }

    /**
     * Set grantor
     *
     * @param string $grantor
     * @return Book
     */
    public function setGrantor($grantor)
    {
        $this->grantor = $grantor;
    
        return $this;
    }

    /**
     * Get grantor
     *
     * @return string 
     */
    public function getGrantor()
    {
        return $this->grantor;
    }

    /**
     * Set grantee
     *
     * @param string $grantee
     * @return Book
     */
    public function setGrantee($grantee)
    {
        $this->grantee = $grantee;
    
        return $this;
    }

    /**
     * Get grantee
     *
     * @return string 
     */
    public function getGrantee()
    {
        return $this->grantee;
    }

    /**
     * Set stamp_duty
     *
     * @param string $stampDuty
     * @return Book
     */
    public function setStampDuty($stampDuty)
    {
        $this->stamp_duty = $stampDuty;
    
        return $this;
    }

    /**
     * Get stamp_duty
     *
     * @return string 
     */
    public function getStampDuty()
    {
        return $this->stamp_duty;
    }

    /**
     * Set or_number
     *
     * @param string $orNumber
     * @return Book
     */
    public function setOrNumber($orNumber)
    {
        $this->or_number = $orNumber;
    
        return $this;
    }

    /**
     * Get or_number
     *
     * @return string 
     */
    public function getOrNumber()
    {
        return $this->or_number;
    }

    /**
     * Set recipient
     *
     * @param string $recipient
     * @return Book
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;
    
        return $this;
    }

    /**
     * Get recipient
     *
     * @return string 
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Set instrument_type
     *
     * @param string $instrumentType
     * @return Book
     */
    public function setInstrumentType($instrumentType)
    {
        $this->instrument_type = $instrumentType;
    
        return $this;
    }

    /**
     * Get instrument_type
     *
     * @return string 
     */
    public function getInstrumentType()
    {
        return $this->instrument_type;
    }

    /**
     * Set recipient_date
     *
     * @param string $recipientDate
     * @return Book
     */
    public function setRecipientDate($recipientDate)
    {
        $this->recipient_date = $recipientDate;
    
        return $this;
    }

    /**
     * Get recipient_date
     *
     * @return string 
     */
    public function getRecipientDate()
    {
        return $this->recipient_date;
    }

    /**
     * Set creator_id
     *
     * @param \DateTime $creatorId
     * @return Book
     */
    public function setCreatorId($creatorId)
    {
        $this->creator_id = $creatorId;
    
        return $this;
    }

    /**
     * Get creator_id
     *
     * @return \DateTime 
     */
    public function getCreatorId()
    {
        return $this->creator_id;
    }

    /**
     * Set creation_datetime
     *
     * @param integer $creationDatetime
     * @return Book
     */
    public function setCreationDatetime($creationDatetime)
    {
        $this->creation_datetime = $creationDatetime;
    
        return $this;
    }

    /**
     * Get creation_datetime
     *
     * @return integer 
     */
    public function getCreationDatetime()
    {
        return $this->creation_datetime;
    }

    /**
     * Set modifier_id
     *
     * @param \DateTime $modifierId
     * @return Book
     */
    public function setModifierId($modifierId)
    {
        $this->modifier_id = $modifierId;
    
        return $this;
    }

    /**
     * Get modifier_id
     *
     * @return \DateTime 
     */
    public function getModifierId()
    {
        return $this->modifier_id;
    }

    /**
     * Set modification_datetime
     *
     * @param \DateTime $modificationDatetime
     * @return Book
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
     * Set registrar_general_initial
     *
     * @param string $registrarGeneralInitial
     * @return Book
     */
    public function setRegistrarGeneralInitial($registrarGeneralInitial)
    {
        $this->registrar_general_initial = $registrarGeneralInitial;
    
        return $this;
    }

    /**
     * Get registrar_general_initial
     *
     * @return string 
     */
    public function getRegistrarGeneralInitial()
    {
        return $this->registrar_general_initial;
    }

    /**
     * Set registering_party
     *
     * @param string $registeringParty
     * @return Book
     */
    public function setRegisteringParty($registeringParty)
    {
        $this->registering_party = $registeringParty;
    
        return $this;
    }

    /**
     * Get registering_party
     *
     * @return string 
     */
    public function getRegisteringParty()
    {
        return $this->registering_party;
    }

    /**
     * Set land_situation
     *
     * @param string $landSituation
     * @return Book
     */
    public function setLandSituation($landSituation)
    {
        $this->land_situation = $landSituation;
    
        return $this;
    }

    /**
     * Get land_situation
     *
     * @return string 
     */
    public function getLandSituation()
    {
        return $this->land_situation;
    }

    /**
     * Set execution_date
     *
     * @param \DateTime $executionDate
     * @return Book
     */
    public function setExecutionDate($executionDate)
    {
        $this->execution_date = $executionDate;
    
        return $this;
    }

    /**
     * Get execution_date
     *
     * @return \DateTime 
     */
    public function getExecutionDate()
    {
        return $this->execution_date;
    }

    /**
     * Set receipt_date
     *
     * @param \DateTime $receiptDate
     * @return Book
     */
    public function setReceiptDate($receiptDate)
    {
        $this->receipt_date = $receiptDate;
    
        return $this;
    }

    /**
     * Get receipt_date
     *
     * @return \DateTime 
     */
    public function getReceiptDate()
    {
        return $this->receipt_date;
    }

    /**
     * Set serial_number
     *
     * @param string $serialNumber
     * @return Book
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serial_number = $serialNumber;
    
        return $this;
    }

    /**
     * Get serial_number
     *
     * @return string 
     */
    public function getSerialNumber()
    {
        return $this->serial_number;
    }
	public function __construct()
    {
       
        $this->setModificationDatetime(new \DateTime());
    }


    /**
     * Set note
     *
     * @param string $note
     * @return Book
     */
    public function setNote($note)
    {
        $this->note = $note;
    
        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }
}