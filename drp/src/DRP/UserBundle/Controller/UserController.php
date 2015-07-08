<?php

namespace DRP\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use DRP\AdminBundle\Entity\User;
use DRP\AdminBundle\Entity\Business;
use DRP\AdminBundle\Entity\BusinessType;
use DRP\AdminBundle\Entity\Plan;
use DRP\AdminBundle\Entity\GlobalInstrument;
use DRP\AdminBundle\Entity\RegistrationType;
use DRP\AdminBundle\Entity\Book;
use DRP\AdminBundle\Entity\Lessor;
use DRP\AdminBundle\Entity\Lease;
use DRP\AdminBundle\Entity\Company;
use DRP\AdminBundle\Entity\UserPlan;
use DRP\AdminBundle\Entity\Log;
use DRP\AdminBundle\Entity\SearchHistory;

class UserController extends Controller
{

    /*===Start function for user login======*/	
    public function loginAction(Request $request)
    {

	

	$session = $this->getRequest()->getSession();
	if( $session->get('userId') && $session->get('userId') != '' && $session->get('type') == 4)
	{
	        //if user is login then it will be redirect to login page    			
	   return $this->redirect($this->generateUrl('user_mySearches'));
	}
	$em = $this->getDoctrine()->getEntityManager();
		$plans = $em->createQueryBuilder()
		->select('plan')
		->from('DRPAdminBundle:Plan',  'plan')
		->getQuery()
		->getResult();
	$businessType = $em->createQueryBuilder()
		->select('businsess')
		->from('DRPAdminBundle:BusinessType',  'businsess')
		->getQuery()
		->getResult();	
	$repository = $em->getRepository('DRPAdminBundle:User');
	if ($request->getMethod() == 'POST')
        {
		$session->clear();
	    	$userName = $request->get('username');
	    	$password = md5($request->get('password'));
	    	
		//find email, password type and status of User
                $user = $repository->findOneBy(array('username' => $userName, 'password' => $password,'type'=>4,'status'=>1 ));
		$userEmail = $repository->findOneBy(array('email' => $userName, 'password' => $password,'type'=>4,'status'=>1 ));
		


         	if ($user) 
         	{
              	
			//set session of User login                        
		        $session->set('userId', $user->getId());
			  $session->set('type', 4);
			$session->set('name', $user->getFirstName());
			$session->set('picture', $user->getPicture()); 

			//echo "<pre>";print_r($session->get('picture'));die;            
		        return $this->redirect($this->generateUrl('user_mySearches'));
         	} 

		if ($userEmail) 
         	{
              	
			//set session of User login                        
		        $session->set('userId', $userEmail->getId());
			  $session->set('type', 4);
			$session->set('name', $userEmail->getFirstName());
			$session->set('picture', $userEmail->getPicture()); 

			//echo "<pre>";print_r($session->get('picture'));die;            
		        return $this->redirect($this->generateUrl('user_mySearches'));
         	} 

        	else 
         	{
			
                	return $this->render('DRPUserBundle:Pages:login.html.twig', array('plans'=>$plans,'name' => 'Invalid Email/Password','businessType'=>$businessType));
         	}

        	
		
	}    
		return $this->render('DRPUserBundle:Pages:login.html.twig',array('plans'=>$plans,'businessType'=>$businessType));
     }
    /*===End function for user login======*/

	public function dashboardAction()
   	 {
	
	$session = $this->getRequest()->getSession();
	if($session->get('type')!= 4)
	{
	        //if user is login then it will be redirect to login page    			
	  return $this->redirect($this->generateUrl('user_home'));
	}
        return $this->render('DRPUserBundle:Pages:dashboard.html.twig');
    }
    /*===End function for dashboard======*/


	function checkEmailExistanceAction()
	{
		$session = $this->getRequest()->getSession();	
		
		$emailId = $_POST['email'];
		$em = $this->getDoctrine()->getEntityManager();
		$emailExistanceCheck = $em->createQueryBuilder()
		->select('checkEmail')
		->from('DRPAdminBundle:User',  'checkEmail')
		->where('checkEmail.email=:email')
		->setParameter('email', $emailId)
		->getQuery()
		->getArrayResult();

		//echo $emailId."<pre>";print_r($emailExistanceCheck);die;
		
		if(count($emailExistanceCheck) > 0)
		{
			return new response('SUCCESS');	
		}
		
		return new response('FAILURE');
	}



	public function registrationAction(Request $request)
   	 {
		
		
		
		$em = $this->getDoctrine()->getEntityManager();
		if($request->getMethod() == 'POST') 
		{
			
		
			$sourcePath = $file = $_FILES['image']['name'];
			 $file1  = $_FILES['image']['tmp_name'];  
    			move_uploaded_file($_FILES["image"]["tmp_name"],
      			"uploads/user/" . $_FILES["image"]["name"]);
			$firstName = $request->get('firstname');
			$password=$request->get('password');
			$middleName = $request->get('middlename');
			$lastName = $request->get('lastname');
			$email = $request->get('email');
			$userName = $request->get('username');
			$telephone1 = $request->get('tel1');
			$telephone2 = $request->get('tel2');
			$nin = $request->get('nin');
			$tin = $request->get('tin');
			$token= $this->generateRandomString(8);
			

			$name = $request->get('name');
			$description=$request->get('description');
			$emailCompany = $request->get('emailCompany');
			$address = $request->get('addressCompany');
			$tinCompany = $request->get('tinCompany');
			$telephone1Company = $request->get('tel1Company');
			$telephone2Company = $request->get('tel2Company');
			
			$planId= $request->get('plan');

			$plans = $em->createQueryBuilder()
			->select('plan')
			->from('DRPAdminBundle:Plan',  'plan')
			//->leftJoin('DRPAdminBundle:UserPlan', 'userPlan', "WITH", "userPlan.plan_id=plan.id")
			->where('plan.id=:id')
			->setParameter('id', $planId)
			->getQuery()
			->getArrayResult();
			//echo"<pre>";print_r($plans[0]['searches']);die;

			
			$addUser = new User();
			$addUser->setFirstName($firstName);
			$addUser->setMiddleName($middleName);
			$addUser->setLastName($lastName);
			$addUser->setEmail($email);
			$addUser->setUsername($userName);
			$addUser->setTelephone1($telephone1);
			$addUser->setTelephone2($telephone2);
			$addUser->setPassword(md5($password));
			$addUser->setNin($nin);
			$addUser->setTin($tin);
			$addUser->setStatus(1);
			$addUser->setType(4);
			//$addUser->setPicture($sourcePath);
			$addUser->setToken($token);
			//$addUser->setSearchCountTotal($plans[0]['searches']);
			$em->persist($addUser);

			$em->flush();

			$userId = $addUser->getId(); 
			$userName = $addUser->getFirstName(); 
			
			
			$addBusiness = new Business();
			$addBusiness->setName($name);
			$addBusiness->setDescription($description);
			$addBusiness->setEmail($emailCompany);
			$addBusiness->setAddress($address);
			$addBusiness->setTin($tinCompany);
			$addBusiness->setTelephone1($telephone1Company);
			$addBusiness->setTelephone2($telephone2Company);
			$addBusiness->setUserId($userId);
			$em->persist($addBusiness);
			$em->flush();	

			$plan = new UserPlan();
			$plan->setPlanId($planId);
			$plan->setToken($token);
			$plan->setUserId($userId);
			$plan->setStatus(0);
			$plan->setPaymentStatus(0);
			$em->persist($plan);
			$em->flush();	


			$date=date("Y/m/d.");
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <support@rdrp.com>' . "\r\n";
			$to = $email;
			$subject = "User Registration";
			$txt='Hello '. $firstName.' '. $lastName.',<br><br>Your have created account on '.$date.'<br><br>Email is: <b>'.	$email.'</b>'.'and your password is'.$password;
			mail($to,$subject,$txt,$headers);

			$ipAddress = $_SERVER['REMOTE_ADDR'];
				$params['event'] = $this->getLogEventTitleAction('REGISTRATION');
				$params['description'] = $this->getLogEventDescriptionAction('REGISTRATION');
				$params['userId'] =$userId;
				$params['ipAddress'] = $ipAddress;
				$params['creatorId'] = $userId;
				$this->setLogAction($params);


			 return $this->redirect($this->generateUrl('user_printRegistration'));
		}
        	return $this->render('DRPUserBundle:Pages:registrationSuccess.html.twig');
    	}
    /*===End function for dashboard======*/


	function generateRandomString($length) 
	{
    		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		$randomString = '';
    		for ($i = 0; $i < $length; $i++) 
    		{
        		$randomString .= $characters[rand(0, strlen($characters) - 1)];
    		}
    		return $randomString;
	}
	
		public function userPlanAction(Request $request)
   	 	{	
			$session = $this->getRequest()->getSession();	
			if($session->get('type')!= 4)
			{
	        	//if user is login then it will be redirect to login page    			
	  			return $this->redirect($this->generateUrl('user_home'));
			}

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			$userPlan = $em->createQueryBuilder()
			->select('plan.name,plan.price,plan.description,plan.searches,userPlan.activation_datetime,userPlan.status')
			->from('DRPAdminBundle:Plan',  'plan')
			->leftJoin('DRPAdminBundle:UserPlan', 'userPlan', "WITH", "userPlan.plan_id=plan.id")
			->where('userPlan.user_id=:id')
			->setParameter('id', $session->get('userId'))
			->andwhere('userPlan.status=:status')
			->setParameter('status',1)
			->addOrderBy('userPlan.id', 'DESC')
			->setMaxResults(1)
			->getQuery()
			->getArrayResult();

			//echo"<pre>";print_r($userPlan);die;	
	
			if(isset($userPlan[0]['status']) == 0)
			{
				return $this->render('DRPUserBundle:Pages:pendingPayment.html.twig');

			}
			
			return $this->render('DRPUserBundle:Pages:userPlan.html.twig',array('userPlan'=>$userPlan));
		
		}

		public function changePlanAction(Request $request)
   	 	{

			$session = $this->getRequest()->getSession();	
			if($session->get('type')!= 4)
			{
	        	//if user is login then it will be redirect to login page    			
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();

			
			$userPlan = $em->createQueryBuilder()
			->select('plan.name,plan.price,plan.description,plan.searches,userPlan.activation_datetime,userPlan.plan_id')
			->from('DRPAdminBundle:Plan',  'plan')
			->leftJoin('DRPAdminBundle:UserPlan', 'userPlan', "WITH", "userPlan.plan_id=plan.id")
			->where('userPlan.user_id=:id')
			->setParameter('id', $session->get('userId'))
			->andwhere('userPlan.status=:status')
			->setParameter('status',1)
			->addOrderBy('userPlan.id', 'DESC')
			->setMaxResults(1)
			->getQuery()
			->getResult();
			//echo"<pre>";print_r($userPlan[0]['plan_id']);die;
			$plans = $em->createQueryBuilder()
			->select('plans')
			->from('DRPAdminBundle:Plan',  'plans')
			->getQuery()
			->getResult();	
			
			if($request->getMethod() == 'POST') 
			{
				
				//echo"<pre>";print_r($_POST);die;
				/*$disablePrevious = $em->createQueryBuilder() 
				->select('userPlan')
				->update('DRPAdminBundle:UserPlan',  'userPlan')
				->set('userPlan.status', ':status')
				->where('userPlan.user_id = :id')
				->setParameter('status', 0)
				->setParameter('id', $session->get('userId'))
				->getQuery()
				->getResult();*/
				$token = $this->generateRandomString(8);
				$newPlan = $request->get('select');
				//echo $newPlan;die;
				$plan = new UserPlan();
				$plan->setPlanId($newPlan);
				$plan->setUserId($session->get('userId'));
				$plan->setStatus(0);
				$plan->setPaymentStatus(0);
				$plan->setToken($token);
				$em->persist($plan);
				$em->flush();

				$ipAddress = $_SERVER['REMOTE_ADDR'];
				$params['event'] = $this->getLogEventTitleAction('CHANGE_PLAN');
				$params['description'] = $this->getLogEventDescriptionAction('CHANGE_PLAN');
				$params['userId'] =$session->get('userId');
				$params['ipAddress'] = $ipAddress;
				$params['creatorId'] = $session->get('userId');
				$this->setLogAction($params);



				
				return $this->redirect($this->generateUrl('user_printChangePlan'));
		
			}

			

			
			return $this->render('DRPUserBundle:Pages:changePlan.html.twig',array('userPlan'=>$userPlan,'plans'=>$plans,'planId'=>$userPlan[0]['plan_id']));

		}
		public function printChangePlanAction(Request $request)
		{
			$em = $this->getDoctrine()->getEntityManager();
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	        		//if user is login then it will be redirect to login page    			
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$userProfile = $em->getRepository('DRPAdminBundle:User')->find($session->get('userId'));

				//echo"<pre>";print_r($userProfile);die;

				$plan = $em->createQueryBuilder()
				->select('plan.token,userPlan.name')
				->from('DRPAdminBundle:UserPlan',  'plan')
				->leftJoin('DRPAdminBundle:Plan', 'userPlan', "WITH", "userPlan.id=plan.plan_id")
				->where('plan.user_id=:id')
				->setParameter('id', $session->get('userId'))
				//->andwhere('userPlan.status=:status')
				//->setParameter('status',1)
				->addOrderBy('plan.id', 'DESC')
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();
		//echo"<pre>";print_r($plan);die;
		return $this->render('DRPUserBundle:Pages:userDetail.html.twig',array('userProfile'=>$userProfile,'plan'=>$plan[0]['token'],'planName'=>$plan[0]['name']));

		}	



		public function planDetailAction(Request $request)
   	 	{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	        //if user is login then it will be redirect to login page    			
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$planId = $_POST['id'];
			
			$em = $this->getDoctrine()->getEntityManager();

			$plans = $em->createQueryBuilder()
			->select('plans')
			->from('DRPAdminBundle:Plan',  'plans')
			->where('plans.id=:id')
			->setParameter('id', $planId)
			->getQuery()
			->getArrayResult();	

		
			$html = '';
			foreach($plans as $Newplans)
			{
				//$html.=$registration['type'];

				$html.='<div class="portlet-body">
							<div class="row margin-bottom-40">
								<!-- Pricing -->
								<div class="col-md-3">
									<div class="pricing hover-effect">
										<div class="pricing-head">
											
											<h3>
												'.$Newplans['name'].'
											</h3>
											<h4><i>Dal </i>'.$Newplans['price'].'<i></i>
											<span>
											</span>
											</h4>
										</div>
										<ul class="pricing-content list-unstyled">
										<li>'.$Newplans['searches'].' Searches'.'</li>
										<li>'.$Newplans['description'].'</li>
										</ul>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>';



				//$html.= $plans['description'];

				
			}
		
		return new response($html);
			


		}	

		public function renewPlanAction(Request $request)
   	 	{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	        //if user is login then it will be redirect to login page    			
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$session = $this->getRequest()->getSession();	
			$em = $this->getDoctrine()->getEntityManager();
			$plans = $em->createQueryBuilder()
			->select('UserPlan')
			->from('DRPAdminBundle:UserPlan',  'UserPlan')
			->where('UserPlan.user_id=:id')
			->setParameter('id', $session->get('userId'))
			->SetMaxResults(1)
			->addOrderBy('UserPlan.id', 'DESC')
			->getQuery()
			->getArrayResult();
			
			//******update plan*******//
		
			$planDetail = $em->createQueryBuilder()
			->select('plan')
			->from('DRPAdminBundle:Plan',  'plan')
			->where('plan.id=:id')
			->setParameter('id', $plans[0]['plan_id'])
			->getQuery()
			->getArrayResult();

			$userDetail = $em->createQueryBuilder()
			->select('user')
			->from('DRPAdminBundle:User',  'user')
			->where('user.id=:id')
			->setParameter('id', $session->get('userId'))
			->getQuery()
			->getArrayResult();

			$newSearches = $userDetail[0]['search_count_total'] + $planDetail[0]['searches'];
			

		
			/*$renewPlan = $em->createQueryBuilder() 
				->select('renewPlan')
				->update('DRPAdminBundle:User',  'renewPlan')
				->set('renewPlan.search_count_total', ':total')
				->where('renewPlan.id = :id')
				->setParameter('total', $newSearches)
				->setParameter('id', $session->get('userId'))
				->getQuery()
				->getResult();*/
			//******update plan*******//


			$token = $this->generateRandomString(8);
			$plan = new UserPlan();
				$plan->setPlanId($plans[0]['plan_id']);
				$plan->setUserId($session->get('userId'));
				$plan->setStatus(0);
				$plan->setPaymentStatus(0);
				$plan->setToken($token);
				$em->persist($plan);
				$em->flush();
				$ipAddress = $_SERVER['REMOTE_ADDR'];
				$params['event'] = $this->getLogEventTitleAction('RENEW_PLAN');
				$params['description'] = $this->getLogEventDescriptionAction('RENEW_PLAN');
				$params['userId'] =$session->get('userId');
				$params['ipAddress'] = $ipAddress;
				$params['creatorId'] = $session->get('userId');
				$this->setLogAction($params);


			
				return $this->redirect($this->generateUrl('user_printRenewPlan'));
			

		}

			function printRenewPlanAction()
		        {

				$session = $this->getRequest()->getSession();
				if($session->get('type')!= 4)
				{
	        //if user is login then it will be redirect to login page    			
	  				return $this->redirect($this->generateUrl('user_home'));
				}
				$em = $this->getDoctrine()->getEntityManager();
				$userProfile = $em->getRepository('DRPAdminBundle:User')->find(array('id'=>$session->get('userId')));
				$plan = $em->createQueryBuilder()
				->select('plan.token,userPlan.name')
				->from('DRPAdminBundle:UserPlan',  'plan')
				->leftJoin('DRPAdminBundle:Plan', 'userPlan', "WITH", "userPlan.id=plan.plan_id")
				->where('plan.user_id=:id')
				->setParameter('id', $session->get('userId'))
				//->andwhere('userPlan.status=:status')
				//->setParameter('status',1)
				->addOrderBy('plan.id', 'DESC')
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();
				return $this->render('DRPUserBundle:Pages:userDetail.html.twig',array('userProfile'=>$userProfile,'plan'=>$plan[0]['token'],'planName'=>$plan[0]['name']));

			}
	


		  /*===Start function for admin logout======*/	
	     public function logoutAction(Request $request)
	     {
		
		$session = $this->getRequest()->getSession();				
		if($session->get('type')!= 4)
		{
	        //if user is login then it will be redirect to login page    			
	  		return $this->redirect($this->generateUrl('user_home'));
		}
	    	//$session->remove('userId');
		$session->clear();
	    	return $this->redirect($this->generateUrl('user_home'));
	     }	
    	 /*===End function for admin logout======*/	

		 public function mySearchesAction(Request $request)
	     	 {
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();

			
				$user = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:User',  'User')
				->leftJoin('DRPAdminBundle:UserPlan', 'userPlan', "WITH", "userPlan.user_id=User.id")
				->where('User.id=:Id')
				->setParameter('Id', $session->get('userId'))
				->andwhere('userPlan.status=:status')
				->andwhere('User.type=4')
				->addOrderBy('userPlan.id','ASC')
				->setParameter('status', 1)
				->getQuery()
				->getArrayResult();

				//echo"<pre>";print_r($user);die;

				$searchHistory = $em->createQueryBuilder() 
			->select('history.serial_number,history.lessor_name,history.lessor_nin,history.lessee_nin,history.id,history.serial_number,history.lomp,history.lessee_name,history.creation_datetime,history.execution_date,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'lease')
			->setMaxResults(5)
			->addOrderBy('history.id','DESC')
			->getQuery()
			->getResult();

//echo"<pre>";print_r($searchHistory);die;

			$searchDRB = $em->createQueryBuilder() 
			->select('history.id,history.grantor_name,history.grantor_nin,history.grantee_name,history.grantee_nin,history.reference_number,history.serial_number,history.serial_number,history.creation_datetime,history.lomp,history.execution_date,gI.type as newType,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=history.instrument_type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'drb')
			->setMaxResults(5)
			->addOrderBy('history.id','DESC')
			->getQuery()
			->getResult();

			
			
			if(isset($user[0]['status']) == 0)
			{
				return $this->render('DRPUserBundle:Pages:pendingPayment.html.twig');

			}
			/*if($user[0]['search_count_balance'] ==0)
			{
				
				return $this->render('DRPUserBundle:Pages:usedSearches.html.twig');
			}*/

			return $this->render('DRPUserBundle:Pages:mySearches.html.twig',array('user'=>$user,'searchLease'=>$searchHistory,'searchDRB'=>$searchDRB,'userSearches'=>$user[0]['search_count_balance']));


		 }
		
		function printRegistrationAction()
		{

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
				$user = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:User',  'User')
				->addOrderBy('User.id', 'DESC')
				  ->setMaxResults(1)
				//->where('business.type=:type')
				//->setParameter('type', 1)
				->getQuery()
				->getArrayResult();

				$company = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:Business',  'User')
				->addOrderBy('User.id', 'DESC')
				  ->setMaxResults(1)
				//->where('business.type=:type')
				//->setParameter('type', 1)
				->getQuery()
				->getArrayResult();
				
				$plan = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:Plan',  'User')
				->addOrderBy('User.id', 'DESC')
				  ->setMaxResults(1)
				//->where('business.type=:type')
				//->setParameter('type', 1)
				->getQuery()
				->getArrayResult();

	


			return $this->render('DRPUserBundle:Pages:printRegistration.html.twig',array('user'=>$user,'plan'=>$plan,'company'=>$company));
					


		}

		public function showRegistrationTypeAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$propertyType = $_POST['id'];
			
			$url = $this->container->getParameter('gbl_upload_path_url');
			$em = $this->getDoctrine()->getEntityManager();
			$regType = $em->createQueryBuilder()
			->select('drb')
			->from('DRPAdminBundle:RegistrationType',  'drb')
			//->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->where('drb.property_type=:type')
			->setParameter('type', $propertyType)
			->getQuery()
			->getArrayResult();
			//echo"<pre>";print_r($regType);die;
			
			$html = '';
			foreach($regType as $registration)
			{
				//$html.=$registration['type'];
				$html.= '<li id="'.$registration['code'].'">';

				$html.='<a href="'.$url.$registration['property_type'].'/search/'.$registration['code'].'">'.'Search '.$registration['type'].'</a>';
							
				$html.=	'</li>';
			}
		
		return new response($html);
			
		

			//return $this->render('DRPAdminBundle::layout_admin_dashboard.html.twig');


		}			

		public function searchLeaseAction(Request $request,$code)
		{

			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
				$searchProperties = $em->createQueryBuilder()
				->select('properties')
				->from('DRPAdminBundle:RegistrationType',  'properties')
				//->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
				->where('properties.code=:code')
				->setParameter('code',$code)
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();

				/*$user = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:User',  'User')
				->leftJoin('DRPAdminBundle:UserPlan', 'userPlan', "WITH", "userPlan.user_id=User.id")
				->where('User.id=:Id')
				->setParameter('Id', $session->get('userId'))
				->andwhere('userPlan.status=:status')
				->addOrderBy('userPlan.id','ASC')
				->setParameter('status', 1)
				->getQuery()
				->getArrayResult();

				if($user[0]['search_count_balance'] == 0)
				{
				
					return $this->render('DRPUserBundle:Pages:usedSearches.html.twig');
				}*/


		//echo "<pre>";print_r($searchProperties);die;
			return $this->render('DRPUserBundle:Pages:showLease.html.twig',array('type'=>$searchProperties,'code'=>$code));


		}


		public function resultLeaseAction(Request $request)
		{
			

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			if($request->getMethod() == 'POST') 
			{
				


				$code = $request->get('hidCode');
				$serialNumber = ltrim($request->get('serialNumber'));

				$lomp = ltrim($request->get('lomp'));
				$lessor = ltrim($request->get('lessor'));
				$lessee = ltrim($request->get('lessee'));
				
				$situationOfLand = ltrim($request->get('sol'));
				$partyRegistring = ltrim($request->get('pr'));
				$recipient = ltrim($request->get('recipient'));
				$lessorName = ltrim($request->get('lessorName'));
				$lessorNIN = ltrim($request->get('lessorNin'));
				$lesseeName = ltrim($request->get('lesseeName'));

				$lesseeNIN = ltrim($request->get('lesseeNin'));
				//echo"<pre>";print_r($situationOfLand);die;


				$orNumber = ltrim($request->get('orNumber'));
			
				$searchHistory = new SearchHistory();
				$searchHistory->setSerialNumber($serialNumber);
				$searchHistory->setLessorName($lessorName);
				$searchHistory->setLesseeName($lesseeName);
				$searchHistory->setLessorNin($lessorNIN);
				$searchHistory->setLesseeNin($lesseeNIN);
				$searchHistory->setUserId($session->get('userId'));
				$searchHistory->setOrNumber($orNumber);
				$searchHistory->setLandSituation($situationOfLand);

				$searchHistory->setType($code);

				
				$em->persist($searchHistory);
	
				$em->flush();

			


					$type = 'LR';
					$nType = 'LE';	

									


					$searchProperties = $em->createQueryBuilder()
					->select('properties.id,properties.execution_date,properties. 	receipt_date,properties.lomp,properties.serial_number,properties.land_situation,properties.or_number,lessee.first_name as lesseeName,lessee.last_name as lesseeLast,lessor.first_name as lessorName,lessor.last_name as lessorLast,lessee.nin as lesseeNIN,lessor.nin as lessorNIN,pr.first_name as prName,pr.last_name as prLast,rp.first_name as rpName,rp.last_name as rpLast,rp.nin as rpNIN,pr.nin as prNIN')
					->from('DRPAdminBundle:Book',  'properties')
					->leftJoin('DRPAdminBundle:Company', 'lessee', "WITH", "lessee.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'lessor', "WITH", "lessor.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'pr', "WITH", "pr.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'rp', "WITH", "rp.book_id=properties.id")
					->where('properties.registration_type=:type')
					->setParameter('type',$code)	
					->andwhere('properties.serial_number like :serialNumber')
					->setParameter('serialNumber', '%'.$serialNumber.'%')
					->andwhere('properties.land_situation like :land')
					->setParameter('land', '%'.$situationOfLand.'%')
					->andwhere('properties.or_number like :orNumber')
					->setParameter('orNumber', '%'.$orNumber.'%')
				
					->andwhere('lessee.first_name like :name')
					->setParameter('name', '%'.$lesseeName.'%')
					->andwhere('lessee.nin like :lnin')
					->setParameter('lnin', '%'.$lesseeNIN.'%')
			
					->andwhere('lessor.first_name like :fname')
					->setParameter('fname', '%'.$lessorName.'%')

					->andwhere('lessor.nin like :lessnin')
					->setParameter('lessnin', '%'.$lessorNIN.'%')
					
					->andwhere('lessee.type = :ltype')
					->setParameter('ltype', $nType)

					->andwhere('pr.type = :prtype')
					->setParameter('prtype', 'PR')

					->andwhere('rp.type = :rptype')
					->setParameter('rptype', 'RP')

					->andwhere('lessor.type = :lesType')
					
					->setParameter('lesType', $type)

				

					->getQuery()
					//->getSQL();
					->getArrayResult();

			
				//echo"<pre>";print_r($searchProperties);die;
					

		
			




				
				$getType = $em->createQueryBuilder()
				->select('properties')
				->from('DRPAdminBundle:RegistrationType',  'properties')
				//->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
				->where('properties.code=:code')
				->setParameter('code',$code)
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();

				$type= $getType[0]['type'];
				//echo $type;die;
				$arrProperty = array();
				$arrAllProperties = array();
		
				if( is_array($searchProperties) && count($searchProperties) > 0 )
				{
					$lessorFN = '';
					$lessorLN = '';
	 				$lessorTel1 = '';
	  				

					$lesseeFN = '';
					$lesseeLN = '';

					$partyRegistringFN = '';
					$partyRegistringLN = '';

					$recipientFN = '';
					$recipientLN = '';

					foreach($searchProperties as $property)
					{

						$arrProperty = $property;

						$propertyDetail = $em->createQueryBuilder()
						->select('propertyDetail')
						->from('DRPAdminBundle:Company',  'propertyDetail')
						->where('propertyDetail.book_id=:bookId')
						->setParameter('bookId',$property['id'])
						->getQuery()
						->getArrayResult();
						//echo"<pre>";print_r($propertyDetail);die;

						foreach($propertyDetail as $propertyObject)
						{
							if($propertyObject['type']=='LR' )
							{
								$lessorFN = $propertyObject['first_name'];
								$lessorLN = $propertyObject['last_name'];
								$lessorTel1 = $propertyObject['telephone1'];
							
							}


							if($propertyObject['type']=='LE' )
							{
								$lesseeFN = $propertyObject['first_name'];
								$lesseeLN = $propertyObject['last_name'];
								$lesseeTel1 = $propertyObject['telephone1'];
							}

							if($propertyObject['type']=='PR' )
							{
								$partyRegistringFN = $propertyObject['first_name'];
								$partyRegistringLN = $propertyObject['last_name'];
							}
							if($propertyObject['type']=='RP' )
							{
								$recipientFN = $propertyObject['first_name'];
								$recipientLN = $propertyObject['last_name'];
							}
					
						}
					}
					$arrProperty['lessorFN'] = $lessorFN;
					$arrProperty['lessorLN'] = $lessorLN;
					$arrProperty['lessorTelephone1'] = $lessorTel1;
	  				

					$arrProperty['lesseeFN'] = $lesseeFN;
					$arrProperty['lesseeLN'] = $lesseeLN;
					$arrProperty['lesseeTelephone1'] = $lessorTel1;

					$arrProperty['partyRegistringFN'] = $partyRegistringFN;
					$arrProperty['partyRegistringLN'] = $partyRegistringLN;
			
					$arrProperty['recipientFN'] = $recipientFN;
					$arrProperty['recipientLN'] = $recipientLN;


					//echo"<pre>";print_r($arrProperty);die;

					array_push($arrAllProperties, $arrProperty);

					$session = $this->getRequest()->getSession();
					$currentSearches = $em->createQueryBuilder()
					->select('User')
					->from('DRPAdminBundle:User',  'User')
					->where('User.id=:Id')
					->setParameter('Id',$session->get('userId'))
					->getQuery()
					->getArrayResult();
					$balanceSearch = $currentSearches[0]['search_count_balance']-1;
					$usedSearch = $currentSearches[0]['search_count_used']+1;

					$updateBalanceSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_balance', ':balance')
					->where('userPlan.id = :id')
					->setParameter('balance', $balanceSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
					
					$updateUsedSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_used', ':Used')
					->where('userPlan.id = :id')
					->setParameter('Used', $usedSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
			
					
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$params['event'] = $this->getLogEventTitleAction('SEARCH');
					$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
					$params['userId'] =$session->get('userId');
					$params['ipAddress'] = $ipAddress;
					$params['creatorId'] = $session->get('userId');
					$this->setLogAction($params);
				}
				else
				{
					$arrAllProperties = '';
					

					
				}
				return $this->render('DRPUserBundle:Pages:searchLease.html.twig',array('properties'=>$searchProperties,'type'=>$code,'searchProperties'=>$searchProperties,'code'=>$type));	

			}
				//echo "<PRE>";print_r($arrAllProperties);die;
					$searchProperties = '';	
					$code = '';
					$type = '';
	
						return $this->render('DRPUserBundle:Pages:searchLease.html.twig',array('properties'=>$searchProperties,'type'=>$code,'searchProperties'=>$searchProperties,'code'=>$type));

		}




		public function resultDRBAction(Request $request)
		{
			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			if($request->getMethod() == 'POST') 
			{

				$code = ltrim($request->get('hidCode'));
				$ref = 	ltrim($request->get('ref'));
				$serialNumber =  ltrim($request->get('serialNumber'));
				$grantorName = ltrim($request->get('grantorName'));
				$grantorNIN = ltrim($request->get('grantorNIN'));
				$granteeName = ltrim($request->get('granteeName'));

			//echo $granteeName ;die;

				$granteeNIN = $request->get('granteeNIN');
				$orNumber = $request->get('orNumber');

				$searchHistory = new SearchHistory();
				$searchHistory->setReferenceNumber($ref);
				$searchHistory->setSerialNumber($serialNumber);
				$searchHistory->setGrantorName($grantorName);

				$searchHistory->setGranteeNin($granteeNIN);
				$searchHistory->setUserId($session->get('userId'));
				$searchHistory->setGranteeName($granteeName);
				$searchHistory->setGrantorNin($grantorNIN);
				$searchHistory->setOrNumber($orNumber);
			
	
				$searchHistory->setType($code);

				
				$em->persist($searchHistory);
	
				$em->flush();

			
				
				$type = 'GR';
					$nType = 'GE';	

			
					$searchProperties = $em->createQueryBuilder()
					->select('rType.type,properties.id,properties.reference_number,properties.execution_date 	receipt_date,properties.execution_date,properties.lomp,properties.serial_number,properties.land_situation,properties.or_number,grantee.first_name as granteeName,grantee.last_name as granteeLast,grantor.first_name as grantorName,grantor.last_name as grantorLast,grantee.nin as granteeNIN,grantor.nin as grantorNIN,pr.first_name as prName,pr.last_name as prLast,pr.nin as prNIN,rp.first_name as rpName,rp.last_name as rpLast,rp.nin as rpNIN')
					->from('DRPAdminBundle:Book',  'properties')
					->leftJoin('DRPAdminBundle:GlobalInstrument', 'rType', "WITH", "rType.id=properties.instrument_type")
					->leftJoin('DRPAdminBundle:Company', 'grantor', "WITH", "grantor.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'grantee', "WITH", "grantee.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'pr', "WITH", "pr.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'rp', "WITH", "rp.book_id=properties.id")
					->where('properties.registration_type=:type')
					->setParameter('type',$code)	
					->andwhere('properties.serial_number like :serialNumber')
					->setParameter('serialNumber', '%'.$serialNumber.'%')
					->andwhere('properties.reference_number like :reference')
					->setParameter('reference', '%'.$ref.'%')
	
					->andwhere('properties.or_number like :orNumber')
					->setParameter('orNumber', '%'.$orNumber.'%')
				
					->andwhere('grantor.first_name like :name')
					->setParameter('name', '%'.$grantorName.'%')

					->andwhere('grantor.nin like :lessnin')
					->setParameter('lessnin', '%'.$grantorNIN.'%')

					->andwhere('grantee.first_name like :fname')
					->setParameter('fname', '%'.$granteeName.'%')

					->andwhere('grantee.nin like :lnin')
					->setParameter('lnin', '%'.$granteeNIN.'%')
			
					
					
					->andwhere('grantee.type = :ltype')
					->setParameter('ltype', $nType)

					->andwhere('pr.type = :prtype')
					->setParameter('prtype', 'PR')

					->andwhere('rp.type = :rptype')
					->setParameter('rptype', 'RP')

					->andwhere('grantor.type = :lesType')
					
					->setParameter('lesType', $type)

				

					->getQuery()
					//->getSQL();
					->getArrayResult();
			//echo"<pre>";print_r($searchProperties);die;

				
				$getType = $em->createQueryBuilder()
				->select('properties')
				->from('DRPAdminBundle:RegistrationType',  'properties')
				->where('properties.code=:code')
				->setParameter('code',$code)
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();

				$type= $getType[0]['type'];

				//echo"<pre>";print_r($searchProperties);die;
				$instrumentType = $em->createQueryBuilder()
				->select('instrument')
				->from('DRPAdminBundle:GlobalInstrument',  'instrument')
				->getQuery()
				->getArrayResult();
				//echo"<pre>";print_r($searchProperties);die;

				
				
				
				//echo"<pre>";print_r($code);die;
				$arrProperty = array();
				$arrAllProperties = array();

				if( is_array($searchProperties) && count($searchProperties) > 0 )
				{

						$grantorFN = '';
						$grantorLN = '';
						$grantortel1 = '';
				

						$granteeFN = '';
						$granteeLN = '';
						$granteetel1 = '';

						$partyRegistringFN = '';
						$partyRegistringLN = '';

						$recipientFN = '';
						$recipientLN= '';
				

					foreach($searchProperties as $property)
					{
						
						$arrProperty = $property;

						

						$propertyDetail = $em->createQueryBuilder()
						->select('propertyDetail')
						->from('DRPAdminBundle:Company',  'propertyDetail')
						->where('propertyDetail.book_id=:bookId')
						->setParameter('bookId',$property['id'])
						->getQuery()
						->getArrayResult();

		
						foreach($propertyDetail as $propertyObject)
						{
							if($propertyObject['type']=='GR' )
							{
								$grantorFN = $propertyObject['first_name'];
								$grantorLN = $propertyObject['last_name'];
								$grantortel1 = $propertyObject['telephone1'];
							}
							//echo $lessorFN;die;
						
							if($propertyObject['type']=='GE' )
							{
								$granteeFN = $propertyObject['first_name'];
								$granteeLN = $propertyObject['last_name'];
								$granteetel1 = $propertyObject['telephone1'];
							}

							if($propertyObject['type']=='PR' )
							{
								$partyRegistringFN = $propertyObject['first_name'];
								$partyRegistringLN = $propertyObject['last_name'];
							}
							if($propertyObject['type']=='RP' )
							{
								$recipientFN = $propertyObject['first_name'];
								$recipientLN = $propertyObject['last_name'];
							}
					
						}
					}
					$arrProperty['grantorFN'] = $grantorFN;
					$arrProperty['grantorLN'] = $grantorLN;
					$arrProperty['grantortel1'] = $grantortel1;

					$arrProperty['granteeFN'] = $granteeFN;
					$arrProperty['granteeLN'] = $granteeLN;
					$arrProperty['granteetel1'] = $granteetel1;

					$arrProperty['partyRegistringFN'] = $partyRegistringFN;
					$arrProperty['partyRegistringLN'] = $partyRegistringLN;
			
					$arrProperty['recipientFN'] = $recipientFN;
					$arrProperty['recipientLN'] = $recipientLN;


					//echo"<pre>";print_r($arrProperty);die;

					array_push($arrAllProperties, $arrProperty);

					$session = $this->getRequest()->getSession();
					$currentSearches = $em->createQueryBuilder()
						->select('User')
						->from('DRPAdminBundle:User',  'User')
						->where('User.id=:Id')
						->setParameter('Id',$session->get('userId'))
						->getQuery()
						->getArrayResult();
						$balanceSearch = $currentSearches[0]['search_count_balance']-1;
						$usedSearch = $currentSearches[0]['search_count_used']+1;

						$updateBalanceSearch = $em->createQueryBuilder() 
						->select('userPlan')
						->update('DRPAdminBundle:User',  'userPlan')
						->set('userPlan.search_count_balance', ':balance')
						->where('userPlan.id = :id')
						->setParameter('balance', $balanceSearch)
						->setParameter('id', $session->get('userId'))
						->getQuery()
						->getResult();
					
						$updateUsedSearch = $em->createQueryBuilder() 
						->select('userPlan')
						->update('DRPAdminBundle:User',  'userPlan')
						->set('userPlan.search_count_used', ':Used')
						->where('userPlan.id = :id')
						->setParameter('Used', $usedSearch)
						->setParameter('id', $session->get('userId'))
						->getQuery()
						->getResult();
			
					
						$ipAddress = $_SERVER['REMOTE_ADDR'];
						$params['event'] = $this->getLogEventTitleAction('SEARCH');
						$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
						$params['userId'] =$session->get('userId');
						$params['ipAddress'] = $ipAddress;
						$params['creatorId'] = $session->get('userId');
						$this->setLogAction($params);

					}
				
				else
				{
					$arrAllProperties = '';
					
						
				}	
					return $this->render('DRPUserBundle:Pages:searchDrb.html.twig',array('properties'=>$searchProperties,'type'=>$code,'searchProperties'=>$arrAllProperties,'code'=>$type,'instrumentType'=>$instrumentType));
			}
			$searchProperties = '';	
			$code = '';
			$type = '';
			$arrAllProperties = '';
			$instrumentType ='';	
					
		return $this->render('DRPUserBundle:Pages:searchDrb.html.twig',array('properties'=>$searchProperties,'type'=>$code,'searchProperties'=>$arrAllProperties,'code'=>$type,'instrumentType'=>$instrumentType));
						
		}




			public function searchDrbAction(Request $request,$code)
			{
				$session = $this->getRequest()->getSession();
				
				if($session->get('type')!= 4)
				{
	      		
	  				return $this->redirect($this->generateUrl('user_home'));
				}
				$em = $this->getDoctrine()->getEntityManager();
				$searchProperties = $em->createQueryBuilder()
				->select('properties')
				->from('DRPAdminBundle:RegistrationType',  'properties')
				//->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
				->where('properties.code=:code')
				->setParameter('code',$code)
				->setMaxResults(1)
				->getQuery()
				->getArrayResult();


				$instrumentType = $em->createQueryBuilder()
				->select('instrument')
				->from('DRPAdminBundle:GlobalInstrument',  'instrument')
				->getQuery()
				->getArrayResult();

				

				//echo"<pre>";print_r($instrumentType);die;


				return $this->render('DRPUserBundle:Pages:showDrb.html.twig',array('type'=>$searchProperties,'code'=>$code,'instrumentType'=>$instrumentType));


		}







		public function setLogAction($param)
		{
			$em = $this->getDoctrine()->getEntityManager();
			$event = $param['event'];
			$description = $param['description'];
			$userId = $param['userId'];
			$ipAddress = $param['ipAddress'];
			$creatorId = $param['creatorId'];

			$insertLog = new Log();
			$insertLog->setEvent($event);
			$insertLog->setDescription($description);
			$insertLog->setUserId($userId);
			$insertLog->setIpAddress($ipAddress);
			$insertLog->setCreatorId($creatorId);
			$em->persist($insertLog);
			$em->flush();
			return true;
		}
		public function getLogAction($param)
		{


		}

		public function getLogEventTitleAction($param)
		{
			if( $param == 'ADD_USER' )			
				return 'ADD_USER';
			else if( $param == 'REGISTRATION' )			
				return 'REGISTRATION';
			else if( $param == 'LOGIN_SUCCESS' )			
				return 'LOGIN_SUCCESS';
			else if( $param == 'LOGIN_FAILURE' )			
				return 'LOGIN_FAILURE';
			else if( $param == 'LOGOUT_SUCCESS' )			
				return 'LOGOUT_SUCCESS';
			else if( $param == 'SEARCH' )			
				return 'SEARCH';

			else if( $param == 'CHANGE_PLAN' )			
				return 'CHANGE_PLAN';	

			else if( $param == 'RENEW_PLAN' )			
				return 'RENEW_PLAN';	

			else if( $param == 'TRANSACTION_SEARCH' )			
				return 'TRANSACTION_SEARCH';


		}

		public function getLogEventDescriptionAction($param)
		{
			if( $param == 'ADD_USER' )			
				return 'ADD_USER';
			else if( $param == 'REGISTRATION' )			
				return 'REGISTRATION';
			else if( $param == 'LOGIN_SUCCESS' )			
				return 'LOGIN_SUCCESS';
			else if( $param == 'LOGIN_FAILURE' )			
				return 'LOGIN_FAILURE';
			else if( $param == 'SEARCH' )			
				return 'SEARCH';

			else if( $param == 'CHANGE_PLAN' )			
				return 'CHANGE_PLAN';	

			else if( $param == 'TRANSACTION_SEARCH' )			
				return 'TRANSACTION_SEARCH';	
		}

		/*===Start function for show profile of admin======*/
	public function userProfileAction(Request $request,$id)
	{
		$session = $this->getRequest()->getSession();
		if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
		$em = $this->getDoctrine()->getEntityManager();
		$viewProfile = $em->getRepository('DRPAdminBundle:User')->find($id);
	
		return $this->render('DRPUserBundle:Pages:userProfile.html.twig',array('viewProfile'=>$viewProfile));
	}
	/*===End function for show profile of admin======*/

	/*===Start function for admin settings======*/
	public function userSettingsAction(Request $request,$id)
	{

		$session = $this->getRequest()->getSession();
		if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
		$em = $this->getDoctrine()->getEntityManager();
		$userInfo = $em->getRepository('DRPAdminBundle:User')->find($id);
	
		return $this->render('DRPUserBundle:Pages:userSettings.html.twig',array('userInfo'=>$userInfo));
	}
	/*===End function for admin settings======*/

	/*===Start function for update admin Info======*/
	public function updateUserInfoAction(Request $request)
	{

		$session = $this->getRequest()->getSession();
		if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}	
		$userId = $session->get('userId');			
		$firstName = $_POST['firstname'];
		$lastName = $_POST['lastname'];
		$email = $_POST['email'];
		//$userName = $_POST['username'];
		//$passcode = $_POST['passcode'];
		//$telephone1 = $_POST['telephone1'];
		//$telephone2 = $_POST['telephone2'];
		//$id = $_POST['id'];
		$em = $this->getDoctrine()->getEntityManager();
		$updateInfo = $em->createQueryBuilder() 
		->select('user')
		->update('DRPAdminBundle:User',  'user')
		->set('user.first_name', ':fname')
		->setParameter('fname', $firstName)
		->set('user.last_name', ':lname')
		->setParameter('lname', $lastName)
		->set('user.email', ':email')
		->setParameter('email', $email)
		//->set('user.username', ':username')
		//->setParameter('username', $userName)
		//->set('user.passcode', ':passcode')
		//->setParameter('passcode', $passcode)
		//->set('user.telephone1', ':telephone1')
		//->setParameter('telephone1', $telephone1)
		//->set('user.telephone2', ':telephone2')
		//->setParameter('telephone2', $telephone2)
		->where('user.id = :id')
		->setParameter('id', $userId)
		->getQuery()
		->getResult();
		$session->remove('name');
		$session->set('name', $firstName); 
		return new response('SUCCESS');	
		
	}
	/*===End function for update admin Info======*/
	
	public function updateUserImageAction(Request $request)
	{
		
		$session = $this->getRequest()->getSession();
		if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
		$adminId = $session->get('userId');	
		$sourcePath = $file = $_FILES['file']['name'];
		 $file1  = $_FILES['file']['tmp_name'];  
    		move_uploaded_file($_FILES["file"]["tmp_name"],
      		"uploads/user/" . $_FILES["file"]["name"]);
		$em = $this->getDoctrine()->getEntityManager();
			$confirmedSubscribe = $em->createQueryBuilder() 
			->select('admin')
			->update('DRPAdminBundle:User',  'admin')
			->set('admin.picture', ':image')
			->setParameter('image', $sourcePath)
			->where('admin.id = :id')
			->setParameter('id', $adminId)
			->getQuery()
			->getResult();
			$session->remove('picture');
			$session->set('picture', $sourcePath); 

			return new response('SUCCESS');		
		
		
	}	

	public function changePasswordAction()
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}		
		    	$userId = $session->get('userId');		
			//echo $userId."<PRE>";print_r($_POST);die;
			$em = $this->getDoctrine()->getEntityManager();
			$salonCurrentPassword = $em->createQueryBuilder() 
			->select('user')
			->from('DRPAdminBundle:User',  'user')
			->where('user.id = :id')
			->setParameter('id', $userId)
			->andwhere('user.type = :type')
			->setParameter('type', 4)
			->andwhere('user.status = :status')
			->setParameter('status', 1)
			->getQuery()
			->getResult();
			
			$currentPassword = $salonCurrentPassword[0]->password ;  //  echo "<PRE>";print_r($currentPassword);die;
			$oldPassword = $_POST["oldPassword"];     
			$newPassword = $_POST["newPassword"];     
			$repeatPassword = $_POST["repeatPassword"];     
			//echo $newPassword."----".$repeatPassword;die;
			$em = $this->getDoctrine()->getEntityManager();
			
			if( ($currentPassword == md5($oldPassword)) && ($newPassword == $repeatPassword) )
			{
				$queryUpdatePassword = $em->createQueryBuilder() 
				->select('user')
				->update('DRPAdminBundle:User',  'user')
				->set('user.password', ':password')
				->setParameter('password', md5($newPassword))
				->where('user.id = :id')
				->setParameter('id', $userId)
				->getQuery()
				->getResult();
				
				// echo "<PRE>";print_r($newPasswords);die;
				return new response("SUCCESS");
			}
			else
			{
				if( $currentPassword != md5($oldPassword) )
				{
					return new response("OLD_MISMATCH");
				}
				else
				{
					return new response("NEW_MISMATCH");
				}
			}
		}
		public function viewDetailLeaseAction(Request $request,$id)
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			// find the id of user
			$viewLease = $em->getRepository('DRPAdminBundle:Book')->find($id);
			$viewLessor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LR'));
			$viewLeasse = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LE'));
			$viewPr = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'PR'));
			$viewRP = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'RP'));	
			//echo"<pre>";print_r($viewRP);die;
			$getType = $em->createQueryBuilder()
			->select('rtype')
			->from('DRPAdminBundle:Book',  'properties')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->where('properties.id=:id')
			->setParameter('id', $id)
			->setMaxResults(1)
			->getQuery()
			->getArrayResult();
			$generalInfo = $em->createQueryBuilder()
			->select('user.first_name,user.last_name,rtype.status')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=rtype.registrar_general_id")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();
//echo"<pre>";print_r($generalInfo);die;
			return $this->render('DRPUserBundle:Pages:viewDetailLease.html.twig',array('viewLease'=>$viewLease,'viewLessor'=>$viewLessor,'viewLeasse'=>$viewLeasse,'viewPr'=>$viewPr,'viewRP'=>$viewRP,'getType'=>$getType[0]['type'],'generalInfo'=>$generalInfo));


		}

		public function viewDetailDRBAction(Request $request,$id)
		{
			$session = $this->getRequest()->getSession();
			
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			// find the id of user
			$viewDRB = $em->getRepository('DRPAdminBundle:Book')->find($id);
			

			$viewLessor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GR'));
			$viewLeasse = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GE'));
			$viewPr = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'PR'));
			$viewRP = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'RP'));	
			//echo"<pre>";print_r($viewRP);die;
			$getType = $em->createQueryBuilder()
			->select('rtype.type ,gI.type as globalInstrument')
			->from('DRPAdminBundle:Book',  'properties')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=properties.instrument_type")
			->where('properties.id=:id')
			->setParameter('id', $id)
			->setMaxResults(1)
			->getQuery()
			->getArrayResult();


			$instrument = $getType[0]['globalInstrument'];

			$generalInfo = $em->createQueryBuilder()
			->select('user.first_name,user.last_name,rtype.status')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=rtype.registrar_general_id")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();

			return $this->render('DRPUserBundle:Pages:viewDetailDRB.html.twig',array('viewDRB'=>$viewDRB,'viewLessor'=>$viewLessor,'viewLeasse'=>$viewLeasse,'viewPr'=>$viewPr,'viewRP'=>$viewRP,'getType'=>$getType[0]['type'],'generalInfo'=>$generalInfo,'instrumentType'=>$instrument));


		}

		public function searchLeaseHistoryAction(Request $request)
		{
			$session = $this->getRequest()->getSession();

			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$searchHistory = $em->createQueryBuilder() 
			->select('history.serial_number,history.lessor_name,history.lessor_nin,history.lessee_nin,history.id,history.serial_number,history.lomp,history.lessee_name,history.creation_datetime,history.execution_date,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'lease')
			
			->getQuery()
			->getResult();

			//echo"<pre>";print_r($searchHistory);die;
			return $this->render('DRPUserBundle:Pages:searchHistory.html.twig',array('recentSearches'=>$searchHistory));

		}

		public function searchDRBHistoryAction(Request $request)
		{
			$session = $this->getRequest()->getSession();

			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$searchDRB = $em->createQueryBuilder() 
			->select('history.id,history.grantor_name,history.grantor_nin,history.grantee_name,history.grantee_nin,history.reference_number,history.serial_number,history.serial_number,history.creation_datetime,history.lomp,history.execution_date,gI.type as newType,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=history.instrument_type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'drb')
			
			->getQuery()
			->getResult();

			//echo"<pre>";print_r($searchDRB);die;
			return $this->render('DRPUserBundle:Pages:drbSearchHistory.html.twig',array('recentSearches'=>$searchDRB));

		}

		//******Code Starts for Pdf***********//
		public function genrateLeaseHistoryAction(Request $request)
		{
			ini_set('max_execution_time', 10000000); 
			$url = $this->container->getParameter('gbl_pdf_path_url');	
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$searchHistory = $em->createQueryBuilder() 
			->select('history.serial_number,history.lessor_name,history.lessor_nin,history.lessee_nin,history.id,history.serial_number,history.lomp,history.lessee_name,history.creation_datetime,history.execution_date,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'lease')
			
			->getQuery()
			->getResult();

			//echo"<pre>";print_r($searchHistory);die;
			
			$html = '';
			$html.= '<img style="width:20%;margin-left:38%;"src='.$url.'><br>';
			$html.='<h3 style="text-align:center;">Search Records of Lease </h3>';
			$html.= $this->render('DRPUserBundle:Pages:searchHistory.html.twig',array('recentSearches'=>$searchHistory));

			
			$html.= '<style>.navbar-collapse.collapse {
   				 display: hidden !important;
  
				}
				.page-header.navbar.navbar-fixed-top {
				    display: none;
				    z-index: 9995;
				}.btn-group.pull-right
				{
				display: none !important;
				}
				.modal-dialog
				{
				display: none !important;
				}.action
				{
				display:none;
				}.col-md-6 {
				    display: none !important;
				}
				.portlet-title
				{
				display:none !important;
				}.portlet-body.port {
				    display: none;
				}
				.logo-default {
				    display: none;
				}
				.pdf_Action
				{

					display:none !important;
				}
				table.table-bordered.dataTable {
				    border-collapse: separate !important;
				}
				.table-scrollable > .table-bordered {
				    border: 0 none;
				}
				.table-scrollable > .table {
				    background-color: #fff;
				    margin: 0 !important;
				    width: 100% !important;
				}
				table.dataTable {
				    clear: both;
				    margin-bottom: 6px !important;
				    margin-top: 6px !important;
				    max-width: none !important;
				}
				.dataTable {
				    clear: both;
				    margin-top: 5px;
				    width: 100%;
				}
				.table-bordered {
				    border: 1px solid #ddd;
				}
				.table {
				    margin-bottom: 20px;
				    max-width: 100%;
				    width: 100%;
				}
				table {
				    background-color: transparent;
				}
				table {
				    border-collapse: collapse;
				    border-spacing: 0;
				}.table-striped > tbody > tr:nth-of-type(2n+1) {
				    background-color: #f9f9f9;
				}.table-scrollable > .table-bordered > thead > tr > th:first-child, .table-scrollable > .table-bordered > tbody > tr > th:first-child, .table-scrollable > .table-bordered > tfoot > tr > th:first-child, .table-scrollable > .table-bordered > thead > tr > td:first-child, .table-scrollable > .table-bordered > tbody > tr > td:first-child, .table-scrollable > .table-bordered > tfoot > tr > td:first-child {
				    border-left: 0 none;
				}table.table-bordered tbody th, table.table-bordered tbody td {
				    border-bottom-width: 0;
				    border-left-width: 0;
				}
				.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
				    border: 1px solid #ddd;
				}
				.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
				    border-top: 1px solid #ddd;
				    line-height: 1.42857;
				    padding: 8px;
				    vertical-align: top;
				}
				table.dataTable td, table.dataTable th {
				    box-sizing: content-box;
				}
				td, th {
				    padding: 0;
					 font-size:10px;!important;	
				}
			
				</style>';
   			 $dompdf = $this->get('slik_dompdf');

   
   			 $dompdf->getpdf($html);

  
   			 $dompdf->stream("lease.pdf");

   
  			  $pdfoutput = $dompdf->output();
		}


		public function genrateDRBHistoryAction(Request $request)
		{
			ini_set('max_execution_time', 10000000); 
			$url = $this->container->getParameter('gbl_pdf_path_url');	
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$searchDRB = $em->createQueryBuilder() 
			->select('history.id,history.grantor_name,history.grantor_nin,history.grantee_name,history.grantee_nin,history.reference_number,history.serial_number,history.serial_number,history.creation_datetime,history.lomp,history.execution_date,gI.type as newType,history.receipt_date,history.land_situation,history.or_number,rtype.type')
			->from('DRPAdminBundle:SearchHistory',  'history')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=history.type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=history.instrument_type")
			->where('history.user_id = :id')
			->setParameter('id', $session->get('userId'))
			->andwhere('rtype.property_type = :type')
			->setParameter('type', 'drb')
			
			->getQuery()
			->getResult();

			//echo"<pre>";print_r($searchDRB);die;
			$html = '';
			$html.= '<img style="width:20%;margin-left:38%;"src='.$url.'><br>';
			$html.='<h3 style="text-align:center;"> Search Records of DRB </h3>';
			$html.=  $this->render('DRPUserBundle:Pages:drbSearchHistory.html.twig',array('recentSearches'=>$searchDRB));
			$html.= '<style>.navbar-collapse.collapse {
   				 display: hidden !important;
  
				}
				.page-header.navbar.navbar-fixed-top {
				    display: none;
				    z-index: 9995;
				}.btn-group.pull-right
				{
				display: none !important;
				}
				.modal-dialog
				{
				display: none !important;
				}.action
				{
				display:none;
				}.col-md-6 {
				    display: none !important;
				}
				.portlet-title
				{
				display:none !important;
				}.portlet-body.port {
				    display: none;
				}
				.logo-default {
				    display: none;
				}
				.pdf_Action
				{

					display:none !important;
				}
				table.table-bordered.dataTable {
				    border-collapse: separate !important;
				}
				.table-scrollable > .table-bordered {
				    border: 0 none;
				}
				.table-scrollable > .table {
				    background-color: #fff;
				    margin: 0 !important;
				    width: 100% !important;
				}
				table.dataTable {
				    clear: both;
				    margin-bottom: 6px !important;
				    margin-top: 6px !important;
				    max-width: none !important;
				}
				.dataTable {
				    clear: both;
				    margin-top: 5px;
				    width: 100%;
				}
				.table-bordered {
				    border: 1px solid #ddd;
				}
				.table {
				    margin-bottom: 20px;
				    max-width: 100%;
				    width: 100%;
				}
				table {
				    background-color: transparent;
				}
				table {
				    border-collapse: collapse;
				    border-spacing: 0;
				}.table-striped > tbody > tr:nth-of-type(2n+1) {
				    background-color: #f9f9f9;
				}.table-scrollable > .table-bordered > thead > tr > th:first-child, .table-scrollable > .table-bordered > tbody > tr > th:first-child, .table-scrollable > .table-bordered > tfoot > tr > th:first-child, .table-scrollable > .table-bordered > thead > tr > td:first-child, .table-scrollable > .table-bordered > tbody > tr > td:first-child, .table-scrollable > .table-bordered > tfoot > tr > td:first-child {
				    border-left: 0 none;
				}table.table-bordered tbody th, table.table-bordered tbody td {
				    border-bottom-width: 0;
				    border-left-width: 0;
				}
				.table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
				    border: 1px solid #ddd;
				}
				.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
				    border-top: 1px solid #ddd;
				    line-height: 1.42857;
				    padding: 8px;
				    vertical-align: top;
				}
				table.dataTable td, table.dataTable th {
				    box-sizing: content-box;
				}
				td, th {
				    padding: 0;
					 font-size:10px;!important;	
				}
			
				</style>';
   			 $dompdf = $this->get('slik_dompdf');

   
   			 $dompdf->getpdf($html);

  
   			 $dompdf->stream("DRB.pdf");

   
  			  $pdfoutput = $dompdf->output();
		}



		//******Code Starts for Pdf***********//

		public function forgotPasswordAction(Request $request)
    		 {
			
			$email = $_POST['email'];

			$em = $this->getDoctrine() ->getEntityManager();
		    	$repository = $em->getRepository('DRPAdminBundle:User');
    	
			   $user = $repository->findOneBy(array('email' => $email,'type'=>4));
			   if ($user) 
			   {   
				//genrate a random number
				$newPassword=$this->generateRandomString(8);
				//echo $newPassword;
				$encPass=md5($newPassword);
				$forgotPassword = $em->createQueryBuilder()
				->select('fPassword')
				->update('DRPAdminBundle:User',  'fPassword')
				->set('fPassword.password', ':password')
				->setParameter('password', $encPass)
				->where('fPassword.email=:email')
				->setParameter('email', $email)
				->getQuery()
				->getResult();
				$date=date("Y/m/d.");

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <support@drp.com>' . "\r\n";
				$to = $email;
				$subject = "User Password Reset";



				$txt='

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;"><tr><td align="center" bgcolor="#eff3f8" >


<!--[if gte mso 10]>
<table width="680" border="0" cellspacing="0" cellpadding="0" >
<tr><td>
<![endif]-->

<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;" >
	
	<!--header -->
	<tr><td align="center" >
		<!-- padding -->
		<table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin: 30px 0 31px;">
			
	<!--header END-->

	<!--content 1 -->
	<tr><td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr><td align="left" valign="top" class="mob_center">
									<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
									<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
									<img src="http://bwcmultimedia.com/PS/drp/images/logo.png" width="115" height="85px" alt="DRP" border="0" style="display: block;" /></font></a>
								</td></tr>

			<tr><td align="center">
				
				<div style="line-height: 44px;">
					<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
						User Password Reset
					</span></font>
				</div>
				<!-- padding -->
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Hello '. $user->getFirstName().' '. $user->getLastName().' you have Successfuly Reset Your Password <br> Your New Password is: <b>'.$newPassword.'</b> .
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							 <a href="http://bwcmultimedia.com/PS/drp/" style="background-color: #3598dc;
    color: #ffffff; font-size: 17px;
    outline: medium none !important;
    padding: 13px 42px;
    text-decoration: none;" >Click Here For Login</a></font></a>
				</div>
				<!-- padding --><div style="height: 60px; line-height: 60px; font-size: 10px;">&nbsp;</div>
			</td></tr>
		</table>		
	</td></tr>
	<!--content 1 END-->

	<!--content 2 -->
	
</table>
<!--[if gte mso 10]>
</td></tr>
</table>
<![endif]-->
 
</td></tr>
</table>
			
';
				








				//$txt='Hello '. $user->getFirstName().' '. $user->getLastName().',<br><br>Your password has been reset on '.$date.'<br><br>Your new Password is: <b>'.	$newPassword.'</b>';
				mail($to,$subject,$txt,$headers);	


				return new response('SUCCESS');	
        		  }							               
	 		return new response('FAILURE');	
	 }
	/*===End function for forgot password======*/

	/*===Start function for reset password message======*/
	public function resetPasswordAction(Request $request)
	{
				
		 return $this->render('DRPUserBundle:Pages:passwordSuccess.html.twig');	

	}
	/*===End function for reset password message======*/

	public function userLogsAction(Request $request)
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$logs = $em->createQueryBuilder()
			->select('logs.event,logs.description,logs.id,user.first_name,user.last_name,logs.user_id,logs.last_updated')
			->from('DRPAdminBundle:Log',  'logs')
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=logs.user_id")
			->where('user.id=:id')
			->setParameter('id', $session->get('userId'))
			->getQuery()
			->getResult();
			//echo"<pre>";print_r($logs);die;
			
			return $this->render('DRPUserBundle:Pages:manageLogs.html.twig',array('logs'=>$logs));

		}
		public function userLeaseDocumentsAction(Request $request)
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$id = $_REQUEST['id'];
			$documents = $em->createQueryBuilder()
			->select('documents')
			->from('DRPAdminBundle:Document',  'documents')
			->where('documents.book_id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();
			
			
			return $this->render('DRPUserBundle:Pages:userLeaseDocuments.html.twig',array('documents'=>$documents));

		}

		public function userDRBDocumentsAction(Request $request)
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$id = $_REQUEST['id'];
			$documents = $em->createQueryBuilder()
			->select('documents')
			->from('DRPAdminBundle:Document',  'documents')
			->where('documents.book_id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();
			
			
			return $this->render('DRPUserBundle:Pages:userDRBDocuments.html.twig',array('documents'=>$documents));

		}
		public function searchesLeftAction(Request $request)
		{
			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$user = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:User',  'User')
				->where('User.id=:Id')
				->setParameter('Id', $session->get('userId'))
				->getQuery()
				->getArrayResult();

			
				if($user[0]['search_count_balance'] == 0)
				{

					return new response('SUCCESS');	
        		  	}							               
	 			return new response('FAILURE');	

		}

		public function searchCountAction(Request $request)
		{

			$session = $this->getRequest()->getSession();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			$user = $em->createQueryBuilder()
				->select('User')
				->from('DRPAdminBundle:User',  'User')
				->where('User.id=:Id')
				->setParameter('Id', $session->get('userId'))
				->getQuery()
				->getArrayResult();

			
				

					return new response($user[0]['search_count_balance']);	
        		
		}


		public function transactionReportsAction(Request $request)
		{

			


				return $this->render('DRPUserBundle:Pages:transactionReports.html.twig');
		}
			

		public function resultAction(Request $request)
		{

			$registrationNumber = $request->get('regNumber');
			$em = $this->getDoctrine()->getEntityManager();
			$searchProperties = $em->createQueryBuilder()
			->select('book.id,book.serial_number,book.reference_number,book.execution_date,book.or_number,book.id,gI.type')
			->from('DRPAdminBundle:Book',  'book')
			->where('book.serial_number=:SerialNumber')
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=book.instrument_type")
			->setParameter('SerialNumber', $registrationNumber)
			->orwhere('book.reference_number=:refNumber')
			->setParameter('refNumber', $registrationNumber)
			->getQuery()
			->getArrayResult();
			
			//echo"<pre>";print_r($searchProperties);die;
		

				$arrProperty = array();
				$arrAllProperties = array();
		
				if( is_array($searchProperties) && count($searchProperties) > 0 )
				{
					

					foreach($searchProperties as $property)
					{
						$lessorFN = '';
						$lessorLN = '';
		 				$lessorTel1 = '';
						$lessorNIN = '';
		  				

						$lesseeFN = '';
						$lesseeLN = '';
						$lesseeNIN = '';

						$grantorFN = '';
						$grantorLN = '';
						$grantorNIN = '';

						$granteeFN = '';
						$granteeLN = '';
						$granteeNIN = '';

						$arrProperty[$property['id']] = $property;

						$propertyDetail = $em->createQueryBuilder()
						->select('propertyDetail')
						->from('DRPAdminBundle:Company',  'propertyDetail')
						->where('propertyDetail.book_id=:bookId')
						->setParameter('bookId',$property['id'])
						->getQuery()
						->getArrayResult();
						//echo"<pre>";print_r($propertyDetail);die;

						foreach($propertyDetail as $propertyObject)
						{
							if($propertyObject['type']=='LR' )
							{
								$lessorFN = $propertyObject['first_name'];
								$lessorLN = $propertyObject['last_name'];
								$lessorNIN = $propertyObject['nin'];
								
							}


							if($propertyObject['type']=='LE' )
							{
								$lesseeFN = $propertyObject['first_name'];
								$lesseeLN = $propertyObject['last_name'];
								$lesseeNIN = $propertyObject['nin'];
								
							}

							if($propertyObject['type']=='PR' )
							{
								$partyRegistringFN = $propertyObject['first_name'];
								$partyRegistringLN = $propertyObject['last_name'];
							}
							if($propertyObject['type']=='RP' )
							{
								$recipientFN = $propertyObject['first_name'];
								$recipientLN = $propertyObject['last_name'];
							}
							if($propertyObject['type']=='GR' )
							{
								$grantorFN = $propertyObject['first_name'];
								$grantorLN = $propertyObject['last_name'];
								$grantorNIN = $propertyObject['nin'];
							}
						
							if($propertyObject['type']=='GE' )
							{
								$granteeFN = $propertyObject['first_name'];
								$granteeLN = $propertyObject['last_name'];
								$granteeNIN = $propertyObject['nin'];
							}
	
					
						}
						$arrProperty[$property['id']]['lessorFN'] = $lessorFN;
						$arrProperty[$property['id']]['lessorLN'] = $lessorLN;
						$arrProperty[$property['id']]['lessorTelephone1'] = $lessorTel1;
						$arrProperty[$property['id']]['lessorNIN'] = $lessorNIN;
		  				

						$arrProperty[$property['id']]['lesseeFN'] = $lesseeFN;
						$arrProperty[$property['id']]['lesseeLN'] = $lesseeLN;
						$arrProperty[$property['id']]['lesseeTelephone1'] = $lessorTel1;
						$arrProperty[$property['id']]['lesseeNIN'] = $lesseeNIN;

						$arrProperty[$property['id']]['partyRegistringFN'] = $partyRegistringFN;
						$arrProperty[$property['id']]['partyRegistringLN'] = $partyRegistringLN;
			
						$arrProperty[$property['id']]['recipientFN'] = $recipientFN;
						$arrProperty[$property['id']]['recipientLN'] = $recipientLN;
			
						$arrProperty[$property['id']]['granteeFN'] = $granteeFN;
						$arrProperty[$property['id']]['granteeLN'] = $granteeLN;
						$arrProperty[$property['id']]['granteeNIN'] = $granteeNIN;

						$arrProperty[$property['id']]['grantorFN'] = $grantorFN;
						$arrProperty[$property['id']]['grantorLN'] = $grantorLN;
						$arrProperty[$property['id']]['grantorNIN'] = $grantorNIN;	

					}
					


					//echo"<pre>";print_r($arrProperty);die;

					array_push($arrAllProperties, $arrProperty);
					$session = $this->getRequest()->getSession();
					$currentSearches = $em->createQueryBuilder()
					->select('User')
					->from('DRPAdminBundle:User',  'User')
					->where('User.id=:Id')
					->setParameter('Id',$session->get('userId'))
					->getQuery()
					->getArrayResult();
					$balanceSearch = $currentSearches[0]['search_count_balance']-1;
					$usedSearch = $currentSearches[0]['search_count_used']+1;

					$updateBalanceSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_balance', ':balance')
					->where('userPlan.id = :id')
					->setParameter('balance', $balanceSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
					
					$updateUsedSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_used', ':Used')
					->where('userPlan.id = :id')
					->setParameter('Used', $usedSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
			
					
					

					
				}
				else
				{

					

					$arrAllProperties = '';
					$session = $this->getRequest()->getSession();
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$params['event'] = $this->getLogEventTitleAction('SEARCH');
					$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
					$params['userId'] =$session->get('userId');
					$params['ipAddress'] = $ipAddress;
					$params['creatorId'] = $session->get('userId');
					$this->setLogAction($params);
					
					return $this->render('DRPUserBundle:Pages:result.html.twig',array('searchProperties'=>$arrAllProperties));
				}

			foreach($arrAllProperties as $arrAllProperties);

			//echo"<pre>";print_r($arrAllProperties);die;





			$session = $this->getRequest()->getSession(); 
			$ipAddress = $_SERVER['REMOTE_ADDR'];
			$params['event'] = $this->getLogEventTitleAction('SEARCH');
			$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
			$params['userId'] =$session->get('userId');
			$params['ipAddress'] = $ipAddress;
			$params['creatorId'] = $session->get('userId');
			$this->setLogAction($params);

			return $this->render('DRPUserBundle:Pages:result.html.twig',array('searchProperties'=>$arrAllProperties));

			

		}
		public function viewTransactionDetailAction(Request $request,$id)
		{

			//echo"a";die;

			$session = $this->getRequest()->getSession();
			
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			$em = $this->getDoctrine()->getEntityManager();
			// find the id of user
			$viewLease = $em->getRepository('DRPAdminBundle:Book')->find($id);
			

			$viewLessor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GR'));
			$viewLeasse = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GE'));

			$viewgrantor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LR'));
			$viewgrantee = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LE'));

			$viewPr = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'PR'));
			$viewRP = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'RP'));	
			//echo"<pre>";print_r($viewRP);die;
			$getType = $em->createQueryBuilder()
			->select('rtype.type ,gI.type as globalInstrument')
			->from('DRPAdminBundle:Book',  'properties')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=properties.instrument_type")
			->where('properties.id=:id')
			->setParameter('id', $id)
			->setMaxResults(1)
			->getQuery()
			->getArrayResult();


			$instrument = $getType[0]['globalInstrument'];

			$generalInfo = $em->createQueryBuilder()
			->select('user.first_name,user.last_name,rtype.status')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=rtype.registrar_general_id")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();

			return $this->render('DRPUserBundle:Pages:viewTransaction.html.twig',array('viewLease'=>$viewLease,'viewLessor'=>$viewLessor,'viewLeasse'=>$viewLeasse,'viewPr'=>$viewPr,'viewRP'=>$viewRP,'getType'=>$getType[0]['type'],'generalInfo'=>$generalInfo,'instrument'=>$instrument,'viewgrantor'=>$viewgrantor,'viewgrantee'=>$viewgrantee));


		}
	
		/*============Start Global Search here============*/
		public function globalLeaseAction(Request $request)
		{

			
			return $this->render('DRPUserBundle:Pages:globalLease.html.twig');

		}


		public function resultGlobalLeaseAction(Request $request)
		{

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			if($request->getMethod() == 'POST') 
			{
			
				$serialNumber = ltrim($request->get('serialNumber'));
				$lomp = ltrim($request->get('lomp'));
				$lessor = ltrim($request->get('lessor'));
				$lessee = ltrim($request->get('lessee'));
				$situationOfLand = ltrim($request->get('sol'));
				$partyRegistring = ltrim($request->get('pr'));
				$recipient = ltrim($request->get('recipient'));
				$lessorName = ltrim($request->get('lessorName'));
				$lessorNIN = ltrim($request->get('lessorNin'));
				$lesseeName = ltrim($request->get('lesseeName'));
				$lesseeNIN = ltrim($request->get('lesseeNin'));
				$orNumber = ltrim($request->get('orNumber'));
				$searchHistory = new SearchHistory();
				$searchHistory->setSerialNumber($serialNumber);
				$searchHistory->setLessorName($lessorName);
				$searchHistory->setLesseeName($lesseeName);
				$searchHistory->setLessorNin($lessorNIN);
				$searchHistory->setLesseeNin($lesseeNIN);
				$searchHistory->setUserId($session->get('userId'));
				$searchHistory->setOrNumber($orNumber);
				$searchHistory->setLandSituation($situationOfLand);
				$em->persist($searchHistory);
				$em->flush();

				$type = 'LR';
				$nType = 'LE';	
				$searchProperties = $em->createQueryBuilder()
					->select('properties.id,properties.execution_date,properties. 	receipt_date,properties.lomp,properties.serial_number,properties.land_situation,properties.or_number,lessee.first_name as lesseeName,lessee.last_name as lesseeLast,lessor.first_name as lessorName,lessor.last_name as lessorLast,lessee.nin as lesseeNIN,lessor.nin as lessorNIN,pr.first_name as prName,pr.last_name as prLast,rp.first_name as rpName,rp.last_name as rpLast,rp.nin as rpNIN,pr.nin as prNIN')
					->from('DRPAdminBundle:Book',  'properties')
					->leftJoin('DRPAdminBundle:Company', 'lessee', "WITH", "lessee.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'lessor', "WITH", "lessor.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'pr', "WITH", "pr.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'rp', "WITH", "rp.book_id=properties.id")
					->andwhere('properties.serial_number like :serialNumber')
					->setParameter('serialNumber', '%'.$serialNumber.'%')
					->andwhere('properties.land_situation like :land')
					->setParameter('land', '%'.$situationOfLand.'%')
					->andwhere('properties.or_number like :orNumber')
					->setParameter('orNumber', '%'.$orNumber.'%')
				
					->andwhere('lessee.first_name like :name')
					->setParameter('name', '%'.$lesseeName.'%')
					->andwhere('lessee.nin like :lnin')
					->setParameter('lnin', '%'.$lesseeNIN.'%')
			
					->andwhere('lessor.first_name like :fname')
					->setParameter('fname', '%'.$lessorName.'%')

					->andwhere('lessor.nin like :lessnin')
					->setParameter('lessnin', '%'.$lessorNIN.'%')
					
					->andwhere('lessee.type = :ltype')
					->setParameter('ltype', $nType)

					->andwhere('pr.type = :prtype')
					->setParameter('prtype', 'PR')

					->andwhere('rp.type = :rptype')
					->setParameter('rptype', 'RP')

					->andwhere('lessor.type = :lesType')
					
					->setParameter('lesType', $type)
					->getQuery()
					->getArrayResult();

					if( is_array($searchProperties) && count($searchProperties) > 0 )
					{
					

					$session = $this->getRequest()->getSession();
					$currentSearches = $em->createQueryBuilder()
					->select('User')
					->from('DRPAdminBundle:User',  'User')
					->where('User.id=:Id')
					->setParameter('Id',$session->get('userId'))
					->getQuery()
					->getArrayResult();
					$balanceSearch = $currentSearches[0]['search_count_balance']-1;
					$usedSearch = $currentSearches[0]['search_count_used']+1;

					$updateBalanceSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_balance', ':balance')
					->where('userPlan.id = :id')
					->setParameter('balance', $balanceSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
					
					$updateUsedSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_used', ':Used')
					->where('userPlan.id = :id')
					->setParameter('Used', $usedSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
			
					}	
					else
					{
						$searchProperties = '';

					}
					
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$params['event'] = $this->getLogEventTitleAction('SEARCH');
					$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
					$params['userId'] =$session->get('userId');
					$params['ipAddress'] = $ipAddress;
					$params['creatorId'] = $session->get('userId');
					$this->setLogAction($params);
							
				

				return $this->render('DRPUserBundle:Pages:globalResultLease.html.twig',array('searchProperties'=>$searchProperties));
			}
			
			$searchProperties = '';
			
			return $this->render('DRPUserBundle:Pages:globalResultLease.html.twig',array('searchProperties'=>$searchProperties));

		}	

	

		
		public function globalDRBAction(Request $request)
		{

			
			return $this->render('DRPUserBundle:Pages:globalDRB.html.twig');

		}	
		

		public function resultGlobalDRBAction(Request $request)
		{

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			if($session->get('type')!= 4)
			{
	      		
	  			return $this->redirect($this->generateUrl('user_home'));
			}
			if($request->getMethod() == 'POST') 
			{

				
				$ref = 	ltrim($request->get('ref'));
				$serialNumber =  ltrim($request->get('serialNumber'));
				$grantorName = ltrim($request->get('grantorName'));
				$grantorNIN = ltrim($request->get('grantorNIN'));
				$granteeName = ltrim($request->get('granteeName'));
				$granteeNIN = $request->get('granteeNIN');
				$orNumber = $request->get('orNumber');
				$searchHistory = new SearchHistory();
				$searchHistory->setReferenceNumber($ref);
				$searchHistory->setSerialNumber($serialNumber);
				$searchHistory->setGrantorName($grantorName);
				$searchHistory->setGranteeNin($granteeNIN);
				$searchHistory->setUserId($session->get('userId'));
				$searchHistory->setGranteeName($granteeName);
				$searchHistory->setGrantorNin($grantorNIN);
				$searchHistory->setOrNumber($orNumber);
				
				$em->persist($searchHistory);
				$em->flush();
				$type = 'GR';
				$nType = 'GE';	
				$searchProperties = $em->createQueryBuilder()
				->select('rType.type,properties.id,properties.reference_number,properties.execution_date 	receipt_date,properties.execution_date,properties.lomp,properties.serial_number,properties.land_situation,properties.or_number,grantee.first_name as granteeName,grantee.last_name as granteeLast,grantor.first_name as grantorName,grantor.last_name as grantorLast,grantee.nin as granteeNIN,grantor.nin as grantorNIN,pr.first_name as prName,pr.last_name as prLast,pr.nin as prNIN,rp.first_name as rpName,rp.last_name as rpLast,rp.nin as rpNIN')
					->from('DRPAdminBundle:Book',  'properties')
					->leftJoin('DRPAdminBundle:GlobalInstrument', 'rType', "WITH", "rType.id=properties.instrument_type")
					->leftJoin('DRPAdminBundle:Company', 'grantor', "WITH", "grantor.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'grantee', "WITH", "grantee.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'pr', "WITH", "pr.book_id=properties.id")
					->leftJoin('DRPAdminBundle:Company', 'rp', "WITH", "rp.book_id=properties.id")
					
					->andwhere('properties.serial_number like :serialNumber')
					->setParameter('serialNumber', '%'.$serialNumber.'%')

					->andwhere('properties.reference_number like :reference')
					->setParameter('reference', '%'.$ref.'%')
	
					->andwhere('properties.or_number like :orNumber')
					->setParameter('orNumber', '%'.$orNumber.'%')
				
					->andwhere('grantor.first_name like :name')
					->setParameter('name', '%'.$grantorName.'%')

					->andwhere('grantor.nin like :lessnin')
					->setParameter('lessnin', '%'.$grantorNIN.'%')

					->andwhere('grantee.first_name like :fname')
					->setParameter('fname', '%'.$granteeName.'%')

					->andwhere('grantee.nin like :lnin')
					->setParameter('lnin', '%'.$granteeNIN.'%')
			
					->andwhere('grantee.type = :ltype')
					->setParameter('ltype', $nType)

					->andwhere('pr.type = :prtype')
					->setParameter('prtype', 'PR')

					->andwhere('rp.type = :rptype')
					->setParameter('rptype', 'RP')

					->andwhere('grantor.type = :lesType')
					
					->setParameter('lesType', $type)

					->getQuery()
				
					->getArrayResult();

				if( is_array($searchProperties) && count($searchProperties) > 0 )
					{
					

					$session = $this->getRequest()->getSession();
					$currentSearches = $em->createQueryBuilder()
					->select('User')
					->from('DRPAdminBundle:User',  'User')
					->where('User.id=:Id')
					->setParameter('Id',$session->get('userId'))
					->getQuery()
					->getArrayResult();
					$balanceSearch = $currentSearches[0]['search_count_balance']-1;
					$usedSearch = $currentSearches[0]['search_count_used']+1;

					$updateBalanceSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_balance', ':balance')
					->where('userPlan.id = :id')
					->setParameter('balance', $balanceSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
					
					$updateUsedSearch = $em->createQueryBuilder() 
					->select('userPlan')
					->update('DRPAdminBundle:User',  'userPlan')
					->set('userPlan.search_count_used', ':Used')
					->where('userPlan.id = :id')
					->setParameter('Used', $usedSearch)
					->setParameter('id', $session->get('userId'))
					->getQuery()
					->getResult();
			
					}	
					else
					{
						$searchProperties = '';

					}
					
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$params['event'] = $this->getLogEventTitleAction('SEARCH');
					$params['description'] = $this->getLogEventDescriptionAction('SEARCH');
					$params['userId'] =$session->get('userId');
					$params['ipAddress'] = $ipAddress;
					$params['creatorId'] = $session->get('userId');
					$this->setLogAction($params);
					return $this->render('DRPUserBundle:Pages:resultGlobalDRB.html.twig',array('searchProperties'=>$searchProperties));
			}

			$searchProperties = '';
			return $this->render('DRPUserBundle:Pages:resultGlobalDRB.html.twig',array('searchProperties'=>$searchProperties));

		}	



}		
