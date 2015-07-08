<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_user_plan")
 */
class UserPlan
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;
    /**
     * @ORM\Column(type="integer")
     */
    public $user_id;
    /**
     * @ORM\Column(type="integer")
     */
    public $plan_id;
	    /**
     * @ORM\Column(type="string")
     */
    public $token;

		    /**
     * @ORM\Column(type="integer")
     */
    public $payment_status;


    /**
     * @ORM\Column(type="integer")
     */
    public $status;

         /**
     * @ORM\Column(type="datetime")
     */
    public $purchase_datetime;
       
        /**
     * @ORM\Column(type="datetime")
     */
    public $activation_datetime;

     /**
     * @ORM\Column(type="datetime")
     */
    public $expiration_datetime;



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
     * Set user_id
     *
     * @param integer $userId
     * @return UserPlan
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
     * Set plan_id
     *
     * @param integer $planId
     * @return UserPlan
     */
    public function setPlanId($planId)
    {
        $this->plan_id = $planId;
    
        return $this;
    }

    /**
     * Get plan_id
     *
     * @return integer 
     */
    public function getPlanId()
    {
        return $this->plan_id;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return UserPlan
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
     * Set purchase_datetime
     *
     * @param \DateTime $purchaseDatetime
     * @return UserPlan
     */
    public function setPurchaseDatetime($purchaseDatetime)
    {
        $this->purchase_datetime = $purchaseDatetime;
    
        return $this;
    }

    /**
     * Get purchase_datetime
     *
     * @return \DateTime 
     */
    public function getPurchaseDatetime()
    {
        return $this->purchase_datetime;
    }

    /**
     * Set activation_datetime
     *
     * @param \DateTime $activationDatetime
     * @return UserPlan
     */
    public function setActivationDatetime($activationDatetime)
    {
        $this->activation_datetime = $activationDatetime;
    
        return $this;
    }

    /**
     * Get activation_datetime
     *
     * @return \DateTime 
     */
    public function getActivationDatetime()
    {
        return $this->activation_datetime;
    }

    /**
     * Set expiration_datetime
     *
     * @param \DateTime $expirationDatetime
     * @return UserPlan
     */
    public function setExpirationDatetime($expirationDatetime)
    {
        $this->expiration_datetime = $expirationDatetime;
    
        return $this;
    }

    /**
     * Get expiration_datetime
     *
     * @return \DateTime 
     */
    public function getExpirationDatetime()
    {
        return $this->expiration_datetime;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return UserPlan
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
     * Set payment_status
     *
     * @param integer $paymentStatus
     * @return UserPlan
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->payment_status = $paymentStatus;
    
        return $this;
    }

    /**
     * Get payment_status
     *
     * @return integer 
     */
    

	public function __construct()
    {
        $this->setExpirationDatetime(new \DateTime());
        
    }


    /**
     * Get payment_status
     *
     * @return integer 
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }
}