<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_search_history")
 */
class SearchHistory
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
     * @ORM\Column(type="integer")
     */
    public $user_id;

   /**
     * @ORM\Column(type="string")
     */
    public $reference_number;

		   /**
     * @ORM\Column(type="string")
     */
    public $serial_number;

	   /**
     * @ORM\Column(type="string")
     */
    public $lomp;

	   /**
     * @ORM\Column(type="string")
     */
    public $lessor_name;

	   /**
     * @ORM\Column(type="string")
     */
    public $lessee_name;

	   /**
     * @ORM\Column(type="string")
     */
    public $grantor_name;

	   /**
     * @ORM\Column(type="string")
     */
    public $grantee_name;

	   /**
     * @ORM\Column(type="string")
     */
    public $lessor_nin;

	   /**
     * @ORM\Column(type="string")
     */
    public $lessee_nin;

	   /**
     * @ORM\Column(type="string")
     */
    public $grantor_nin;

	   /**
     * @ORM\Column(type="string")
     */
    public $grantee_nin;
	

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
    public $land_situation;


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
     * @param string $type
     * @return SearchHistory
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
     * Set reference_number
     *
     * @param string $referenceNumber
     * @return SearchHistory
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
     * Set serial_number
     *
     * @param string $serialNumber
     * @return SearchHistory
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

    /**
     * Set lomp
     *
     * @param string $lomp
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * Set execution_date
     *
     * @param string $executionDate
     * @return SearchHistory
     */
    public function setExecutionDate($executionDate)
    {
        $this->execution_date = $executionDate;
    
        return $this;
    }

    /**
     * Get execution_date
     *
     * @return string 
     */
    public function getExecutionDate()
    {
        return $this->execution_date;
    }

    /**
     * Set receipt_date
     *
     * @param string $receiptDate
     * @return SearchHistory
     */
    public function setReceiptDate($receiptDate)
    {
        $this->receipt_date = $receiptDate;
    
        return $this;
    }

    /**
     * Get receipt_date
     *
     * @return string 
     */
    public function getReceiptDate()
    {
        return $this->receipt_date;
    }

    /**
     * Set land_situation
     *
     * @param string $landSituation
     * @return SearchHistory
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
     * Set creator_id
     *
     * @param integer $creatorId
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
     * @return SearchHistory
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
	 public function __construct()
    {
        $this->setCreationDatetime(new \DateTime());
        $this->setModificationDatetime(new \DateTime());
    }


    /**
     * Set user_id
     *
     * @param integer $userId
     * @return SearchHistory
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
    
        return $this;
    }

    /**
     * Get user_id
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set lessor_name
     *
     * @param string $lessorName
     * @return SearchHistory
     */
    public function setLessorName($lessorName)
    {
        $this->lessor_name = $lessorName;
    
        return $this;
    }

    /**
     * Get lessor_name
     *
     * @return string 
     */
    public function getLessorName()
    {
        return $this->lessor_name;
    }

    /**
     * Set lessee_name
     *
     * @param string $lesseeName
     * @return SearchHistory
     */
    public function setLesseeName($lesseeName)
    {
        $this->lessee_name = $lesseeName;
    
        return $this;
    }

    /**
     * Get lessee_name
     *
     * @return string 
     */
    public function getLesseeName()
    {
        return $this->lessee_name;
    }

    /**
     * Set grantor_name
     *
     * @param string $grantorName
     * @return SearchHistory
     */
    public function setGrantorName($grantorName)
    {
        $this->grantor_name = $grantorName;
    
        return $this;
    }

    /**
     * Get grantor_name
     *
     * @return string 
     */
    public function getGrantorName()
    {
        return $this->grantor_name;
    }

    /**
     * Set grantee_name
     *
     * @param string $granteeName
     * @return SearchHistory
     */
    public function setGranteeName($granteeName)
    {
        $this->grantee_name = $granteeName;
    
        return $this;
    }

    /**
     * Get grantee_name
     *
     * @return string 
     */
    public function getGranteeName()
    {
        return $this->grantee_name;
    }

    /**
     * Set lessor_nin
     *
     * @param string $lessorNin
     * @return SearchHistory
     */
    public function setLessorNin($lessorNin)
    {
        $this->lessor_nin = $lessorNin;
    
        return $this;
    }

    /**
     * Get lessor_nin
     *
     * @return string 
     */
    public function getLessorNin()
    {
        return $this->lessor_nin;
    }

    /**
     * Set lessee_nin
     *
     * @param string $lesseeNin
     * @return SearchHistory
     */
    public function setLesseeNin($lesseeNin)
    {
        $this->lessee_nin = $lesseeNin;
    
        return $this;
    }

    /**
     * Get lessee_nin
     *
     * @return string 
     */
    public function getLesseeNin()
    {
        return $this->lessee_nin;
    }

    /**
     * Set grantor_nin
     *
     * @param string $grantorNin
     * @return SearchHistory
     */
    public function setGrantorNin($grantorNin)
    {
        $this->grantor_nin = $grantorNin;
    
        return $this;
    }

    /**
     * Get grantor_nin
     *
     * @return string 
     */
    public function getGrantorNin()
    {
        return $this->grantor_nin;
    }

    /**
     * Set grantee_nin
     *
     * @param string $granteeNin
     * @return SearchHistory
     */
    public function setGranteeNin($granteeNin)
    {
        $this->grantee_nin = $granteeNin;
    
        return $this;
    }

    /**
     * Get grantee_nin
     *
     * @return string 
     */
    public function getGranteeNin()
    {
        return $this->grantee_nin;
    }
}