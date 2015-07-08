<?php
namespace DRP\AdminBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="drp_payment")
 */
class Payment
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
     * @ORM\Column(type="integer")
     */
    public $transaction_id;
    /**
     * @ORM\Column(type="integer")
     */
    public $transaction_amount;
	 /**
     * @ORM\Column(type="integer")
     */
    public $status;

 
         /**
     * @ORM\Column(type="datetime")
     */
    public $transaction_date;
      
        /**
     * @ORM\Column(type="datetime")
     */
    public $transaction_time;



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
     * @return Payment
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
     * @return Payment
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
     * Set transaction_id
     *
     * @param integer $transactionId
     * @return Payment
     */
    public function setTransactionId($transactionId)
    {
        $this->transaction_id = $transactionId;
    
        return $this;
    }

    /**
     * Get transaction_id
     *
     * @return integer 
     */
    public function getTransactionId()
    {
        return $this->transaction_id;
    }

    /**
     * Set transaction_amount
     *
     * @param integer $transactionAmount
     * @return Payment
     */
    public function setTransactionAmount($transactionAmount)
    {
        $this->transaction_amount = $transactionAmount;
    
        return $this;
    }

    /**
     * Get transaction_amount
     *
     * @return integer 
     */
    public function getTransactionAmount()
    {
        return $this->transaction_amount;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Payment
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
     * Set transaction_date
     *
     * @param \DateTime $transactionDate
     * @return Payment
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transaction_date = $transactionDate;
    
        return $this;
    }

    /**
     * Get transaction_date
     *
     * @return \DateTime 
     */
    public function getTransactionDate()
    {
        return $this->transaction_date;
    }

    /**
     * Set transaction_time
     *
     * @param \DateTime $transactionTime
     * @return Payment
     */
    public function setTransactionTime($transactionTime)
    {
        $this->transaction_time = $transactionTime;
    
        return $this;
    }

    /**
     * Get transaction_time
     *
     * @return \DateTime 
     */
    public function getTransactionTime()
    {
        return $this->transaction_time;
    }
}