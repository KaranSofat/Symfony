<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_user")
 */
class User
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
    public $first_name;
    /**
     * @ORM\Column(type="string")
     */
    public $middle_name;

    /**
     * @ORM\Column(type="string")
     */
    public $last_name;
    /**
     * @ORM\Column(type="string")
     */
    public $email;

    /**
     * @ORM\Column(type="string")
     */
    public $username;
    /**
     * @ORM\Column(type="string")
     */
    public $password;
        /**
     * @ORM\Column(type="string")
     */
    public $token;



     /**
     * @ORM\Column(type="string")
     */
    public $nin;
    /**
     * @ORM\Column(type="string")
     */
    public $tin;

    /**
     * @ORM\Column(type="string")
     */
    public $passcode;
    /**
     * @ORM\Column(type="string")
     */
    public $telephone1;
      /**
     * @ORM\Column(type="string")
     */
    public $telephone2;
       /**
     * @ORM\Column(type="string")
     */
    public $picture;
       /**
     * @ORM\Column(type="string")
     */
    public $business_id;

       /**
     * @ORM\Column(type="integer")
     */
    public $type;
      /**
     * @ORM\Column(type="integer")
     */
    public $status;
	      /**
     * @ORM\Column(type="string")
     */
    public $search_count_total;
      /**
     * @ORM\Column(type="string")
     */
    public $search_count_used;
      /**
     * @ORM\Column(type="string")
     */
    public $search_count_balance;
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
     * Set first_name
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
    
        return $this;
    }

    /**
     * Get first_name
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * Set middle_name
     *
     * @param string $middleName
     * @return User
     */
    public function setMiddleName($middleName)
    {
        $this->middle_name = $middleName;
    
        return $this;
    }

    /**
     * Get middle_name
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middle_name;
    }

    /**
     * Set last_name
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
    
        return $this;
    }

    /**
     * Get last_name
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;
    
        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set nin
     *
     * @param string $nin
     * @return User
     */
    public function setNin($nin)
    {
        $this->nin = $nin;
    
        return $this;
    }

    /**
     * Get nin
     *
     * @return string 
     */
    public function getNin()
    {
        return $this->nin;
    }

    /**
     * Set tin
     *
     * @param string $tin
     * @return User
     */
    public function setTin($tin)
    {
        $this->tin = $tin;
    
        return $this;
    }

    /**
     * Get tin
     *
     * @return string 
     */
    public function getTin()
    {
        return $this->tin;
    }

    /**
     * Set passcode
     *
     * @param string $passcode
     * @return User
     */
    public function setPasscode($passcode)
    {
        $this->passcode = $passcode;
    
        return $this;
    }

    /**
     * Get passcode
     *
     * @return string 
     */
    public function getPasscode()
    {
        return $this->passcode;
    }

    /**
     * Set telephone1
     *
     * @param string $telephone1
     * @return User
     */
    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;
    
        return $this;
    }

    /**
     * Get telephone1
     *
     * @return string 
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * Set telephone2
     *
     * @param string $telephone2
     * @return User
     */
    public function setTelephone2($telephone2)
    {
        $this->telephone2 = $telephone2;
    
        return $this;
    }

    /**
     * Get telephone2
     *
     * @return string 
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }

    /**
     * Set picture
     *
     * @param integer $picture
     * @return User
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return integer 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set business_id
     *
     * @param string $businessId
     * @return User
     */
    public function setBusinessId($businessId)
    {
        $this->business_id = $businessId;
    
        return $this;
    }

    /**
     * Get business_id
     *
     * @return string 
     */
    public function getBusinessId()
    {
        return $this->business_id;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return User
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
     * @return User
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
     * @return User
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
     * @param string $modifierId
     * @return User
     */
    public function setModifierId($modifierId)
    {
        $this->modifier_id = $modifierId;
    
        return $this;
    }

    /**
     * Get modifier_id
     *
     * @return string 
     */
    public function getModifierId()
    {
        return $this->modifier_id;
    }

    /**
     * Set modification_datetime
     *
     * @param \DateTime $modificationDatetime
     * @return User
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
     * Set token
     *
     * @param string $token
     * @return User
     */
    public function setToken($token)
    {
        $this->token = $token;
    
        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set search_count_total
     *
     * @param string $searchCountTotal
     * @return User
     */
    public function setSearchCountTotal($searchCountTotal)
    {
        $this->search_count_total = $searchCountTotal;
    
        return $this;
    }

    /**
     * Get search_count_total
     *
     * @return string 
     */
    public function getSearchCountTotal()
    {
        return $this->search_count_total;
    }

    /**
     * Set search_count_used
     *
     * @param string $searchCountUsed
     * @return User
     */
    public function setSearchCountUsed($searchCountUsed)
    {
        $this->search_count_used = $searchCountUsed;
    
        return $this;
    }

    /**
     * Get search_count_used
     *
     * @return string 
     */
    public function getSearchCountUsed()
    {
        return $this->search_count_used;
    }

    /**
     * Set search_count_balance
     *
     * @param string $searchCountBalance
     * @return User
     */
    public function setSearchCountBalance($searchCountBalance)
    {
        $this->search_count_balance = $searchCountBalance;
    
        return $this;
    }

    /**
     * Get search_count_balance
     *
     * @return string 
     */
    public function getSearchCountBalance()
    {
        return $this->search_count_balance;
    }
   public function __construct()
    {
        $this->setCreationDatetime(new \DateTime());
        $this->setModificationDatetime(new \DateTime());
    }
	
  

}