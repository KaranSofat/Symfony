<?php

namespace DRP\RegistrarGeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use DRP\AdminBundle\Entity\Document;
use DRP\AdminBundle\Entity\Log;

class RegistrarGeneralController extends Controller
{

    /*===Start function for user login======*/	
    public function loginAction(Request $request)
    {
	$session = $this->getRequest()->getSession();
	if( $session->get('userId') && $session->get('userId') != '' && $session->get('type') == '2')
	{
	        //if user is login then it will be redirect to login page    			
	   return $this->redirect($this->generateUrl('registrarGeneral_dashboard'));
	}
	$em = $this->getDoctrine()->getEntityManager();
	$repository = $em->getRepository('DRPAdminBundle:User');
	if ($request->getMethod() == 'POST')
        {
		$session->clear();
	    	$userName = $request->get('username');
	    	$password = md5($request->get('password'));
	    	
		//find email, password type and status of User
                $user = $repository->findOneBy(array('username' => $userName, 'password' => $password,'type'=>2,'status'=>1 ));
		$userEmail = $repository->findOneBy(array('email' => $userName, 'password' => $password,'type'=>2,'status'=>1 ));
         	if ($user) 
         	{
              	
			//set session of User login                        
		        $session->set('userId', $user->getId());
			$session->set('type', 2);
			$session->set('nameRegistrar', $user->getFirstName());
			$session->set('pictureRegistrar', $user->getPicture()); 

			//echo "<pre>";print_r($session->get('picture'));die;            
		        return $this->redirect($this->generateUrl('registrarGeneral_dashboard'));
         	} 

		if ($userEmail) 
         	{
              		
			$session->set('type', 2);                      
		        $session->set('userId', $userEmail->getId());
			$session->set('nameRegistrar', $userEmail->getFirstName());
			$session->set('pictureRegistrar', $userEmail->getPicture()); 

			//echo "<pre>";print_r($session->get('picture'));die;            
		       return $this->redirect($this->generateUrl('registrarGeneral_dashboard'));
         	} 

        	else 
         	{
                	return $this->render('DRPRegistrarGeneralBundle:Pages:login.html.twig', array('name' => 'Invalid Email/Password'));
         	}

        	
		
	}    
		return $this->render('DRPRegistrarGeneralBundle:Pages:login.html.twig');
     }
    /*===End function for user login======*/

	public function dashboardAction()
   	 {
		
		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}
		$em = $this->getDoctrine()
		 ->getEntityManager();
	 	 $totalLease = $em->createQueryBuilder()
   	 	->select('count(c.id) AS totalLease')
   		 ->from('DRPAdminBundle:RegistrationStatus',  'c')
    		->Where('c.status = 0')
		->andwhere('c.property_type=:type')
		->setParameter('type', 'lease')
    		->getQuery()
    		->getResult();

		 $totalDrb = $em->createQueryBuilder()
   	 	->select('count(c.id) AS totalDrb')
   		 ->from('DRPAdminBundle:RegistrationStatus',  'c')
    		->Where('c.status = 0')
		->andwhere('c.property_type=:type')
		->setParameter('type', 'drb')
    		->getQuery()
    		->getResult();



		$dashboardDetails = array('totalLease'=>$totalLease[0]['totalLease'], 'totalDrb'=>$totalDrb[0]['totalDrb']);


		$currentDate = date('Y-m-d');
	//$weekStartDate = date('Y-m-d', strtotime(' -7 day '));
	$currentMonth = date('Y-m');
	$currentYear = date('Y');
	$totalSearchesByUsers = array();
	//echo"<pre>";print_r($_POST);die;
	
	
	$totalSearchesByUsersToday = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByUsers')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentDate.'%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','SEARCH')    
    	->getQuery()
    	->getArrayResult();	

	$totalSearchesByUsersWeek = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByUsers')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentMonth.'%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','SEARCH')   
    	->getQuery()
    	->getArrayResult();

	$totalSearchesByUsersMonth = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByUsers')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentMonth.'%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','SEARCH')    
    	->getQuery()
    	->getArrayResult();

	$totalSearchesByUsersYear = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByUsers')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentYear.'-%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','SEARCH')  
	->getQuery()
    	->getArrayResult();

	
	
	$totalSearchesByAdminYear = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByAdmin')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentYear.'-%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','ADMIN_SEARCH')   
 
    	->getQuery()
    	->getArrayResult();


	$totalSearchesByAdminMonth = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByAdmin')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentMonth.'-%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','ADMIN_SEARCH')   
 
    	->getQuery()
    	->getArrayResult();

	$totalSearchesByAdminToday = $em->createQueryBuilder()
   	->select('count(SearchHistory.id) AS totalSearchesByAdmin')
   	->from('DRPAdminBundle:Log',  'SearchHistory')
	
	->where('SearchHistory.last_updated like :last_updated')
	->setParameter('last_updated',$currentDate.'%')   

	->andwhere('SearchHistory.event = :event')
	->setParameter('event','ADMIN_SEARCH')   
 
    	->getQuery()
    	->getArrayResult();


	$totalAmountYear = $em->createQueryBuilder()
   	->select('Plan')
   	->from('DRPAdminBundle:UserPlan',  'payment')
	->leftJoin('DRPAdminBundle:User', 'User', "WITH", "User.id=payment.user_id")
	->leftJoin('DRPAdminBundle:Plan', 'Plan', "WITH", "Plan.id=payment.plan_id")
	->where('payment.activation_datetime like :activation_datetime')
	->setParameter('activation_datetime',$currentYear.'%')   
	->andwhere('payment.status = 1')
    	->getQuery()
    	->getArrayResult();
	
	$year=0;
	foreach($totalAmountYear as $amount)
	{

		$year = $year+$amount['price'];
		
		
	}


	$totalAmountToday = $em->createQueryBuilder()
   	->select('Plan')
   	->from('DRPAdminBundle:UserPlan',  'payment')
	->leftJoin('DRPAdminBundle:User', 'User', "WITH", "User.id=payment.user_id")
	->leftJoin('DRPAdminBundle:Plan', 'Plan', "WITH", "Plan.id=payment.plan_id")
	->where('payment.activation_datetime like :activation_datetime')
	->setParameter('activation_datetime',$currentDate.'%')   
	->andwhere('payment.status = 1')
    	->getQuery()
    	->getArrayResult();


	$today=0;
	foreach($totalAmountToday as $amountToday)
	{

		$today = $today+$amountToday['price'];
		
		
	}

	


	$totalAmountMonth = $em->createQueryBuilder()
   	->select('Plan')
   	->from('DRPAdminBundle:UserPlan',  'payment')
	->leftJoin('DRPAdminBundle:User', 'User', "WITH", "User.id=payment.user_id")
	->leftJoin('DRPAdminBundle:Plan', 'Plan', "WITH", "Plan.id=payment.plan_id")
	->where('payment.activation_datetime like :activation_datetime')
	->setParameter('activation_datetime',$currentMonth.'%')   
	->andwhere('payment.status = 1')
    	->getQuery()
    	->getArrayResult();


	$month=0;
	foreach($totalAmountMonth as $amountMonth)
	{

		$month = $month+$amountMonth['price'];
		
		
	}


        return $this->render('DRPRegistrarGeneralBundle:Pages:dashboard.html.twig',array('dashboard'=>$dashboardDetails, 'totalSearchesByUsersToday'=>$totalSearchesByUsersToday[0]['totalSearchesByUsers'], 'totalSearchesByUsersWeek'=>$totalSearchesByUsersWeek[0]['totalSearchesByUsers'], 'totalSearchesByUsersMonth'=>$totalSearchesByUsersMonth[0]['totalSearchesByUsers'], 'totalSearchesByUsersYear'=>$totalSearchesByUsersYear[0]['totalSearchesByUsers'],'totalSearchesByAdminYear'=>$totalSearchesByAdminYear[0]['totalSearchesByAdmin'],'totalSearchesByAdminMonth'=>$totalSearchesByAdminMonth[0]['totalSearchesByAdmin'],'totalSearchesByAdminToday'=>$totalSearchesByAdminToday[0]['totalSearchesByAdmin'],'year'=>$year,'month'=>$month,'today'=>$today));











		

       
    }
    /*===End function for dashboard======*/


	public function showTypeAction(Request $request)
		{

			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	  		return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
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

				$html.='<a href="'.$url.$registration['property_type'].'/registrarGeneral/'.$registration['code'].'">'.$registration['type'].'</a>';
							
				$html.=	'</li>';
			}
		
		return new response($html);
			
		

			//return $this->render('DRPAdminBundle::layout_admin_dashboard.html.twig');


		}
		public function showLeaseAction(Request $request,$code)
		{
			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	 		 return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
			}
			$arrProperty = array();
			$arrAllProperties = array();

			$em = $this->getDoctrine()->getEntityManager();
			$properties = $em->createQueryBuilder()
			->select('properties.lomp,properties.id,properties.serial_number,properties.lessor,properties.lessee,properties.grantor,properties. 	grantee,properties.stamp_duty,properties.registrar_general_initial,rStatus.status,properties.registering_party,properties.or_number,properties.execution_date,properties.receipt_date,properties.reference_number,properties.recipient,properties.land_situation,properties.id,rtype.type')
			->from('DRPAdminBundle:Book',  'properties')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rStatus', "WITH", "rStatus.book_id=properties.id")
			->where('properties.registration_type=:type')
			->setParameter('type',$code)
			//->addOrderBy('properties.id','DESC')
			->getQuery()
			->getArrayResult();
			//echo"<pre>";print_r($properties);die;

			foreach($properties as $property)
			{

				$arrProperty = $property;

				$arrProperty['lessorFN'] = '';
				$arrProperty['lessorLN'] = '';
 				$arrProperty['lessorTelephone1'] = '';
  				$arrProperty['lessorTelephone2'] = '';
				$arrProperty['lessorNin'] = '';

				$arrProperty['lesseeFN'] = '';
				$arrProperty['lesseeLN'] = '';
				$arrProperty['lesseeNin'] = '';

				$arrProperty['partyRegistringFN'] = '';
				$arrProperty['partyRegistringLN'] = '';
				$arrProperty['partyRegistringNin'] = '';


				$arrProperty['recipientFN'] = '';
				$arrProperty['recipientLN'] = '';
				$arrProperty['recipientNin'] = '';

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
						$lessorTel2 = $propertyObject['telephone2'];
						$lessorNin = $propertyObject['nin'];
					}


					if($propertyObject['type']=='LE' )
					{
						$lesseeFN = $propertyObject['first_name'];
						$lesseeLN = $propertyObject['last_name'];
						$lesseeTel1 = $propertyObject['telephone1'];
						$lesseeNin = $propertyObject['nin'];
					}

					if($propertyObject['type']=='PR' )
					{
						$partyRegistringFN = $propertyObject['first_name'];
						$partyRegistringLN = $propertyObject['last_name'];
						$partyRegistringNin = $propertyObject['nin'];
					}
					if($propertyObject['type']=='RP' )
					{
						$recipientFN = $propertyObject['first_name'];
						$recipientLN = $propertyObject['last_name'];
						$recipientNin = $propertyObject['nin'];	
					}
					
				}
				$arrProperty['lessorFN'] = $lessorFN;
				$arrProperty['lessorLN'] = $lessorLN;
				$arrProperty['lessorTelephone1'] = $lessorTel1;
				$arrProperty['lessorNin'] = $lessorNin;
  				

				$arrProperty['lesseeFN'] = $lesseeFN;
				$arrProperty['lesseeLN'] = $lesseeLN;
				$arrProperty['lesseeTelephone1'] = $lessorTel1;
				$arrProperty['lesseeNin'] = $lesseeNin;

				$arrProperty['partyRegistringFN'] = $partyRegistringFN;
				$arrProperty['partyRegistringLN'] = $partyRegistringLN;
				$arrProperty['partyRegistringNin'] = $partyRegistringNin;				

				$arrProperty['recipientFN'] = $recipientFN;
				$arrProperty['recipientLN'] = $recipientLN;
				$arrProperty['recipientNin'] = $recipientNin;


				//echo"<pre>";print_r($arrProperty);die;

				array_push($arrAllProperties, $arrProperty);

			}
			//echo"<pre>";print_r($arrAllProperties);die;


			return $this->render('DRPRegistrarGeneralBundle:Pages:lease.html.twig',array('properties'=>$arrAllProperties,'b'=>$code));


		}

		public function showDrbAction(Request $request,$code)
			{
				
				
				$session = $this->getRequest()->getSession();
				if( $session->get('type')!= '2')
				{
	         			
	 	 			 return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
				}
				$em = $this->getDoctrine()->getEntityManager();
				$properties = $em->createQueryBuilder()
				->select('properties.lomp,properties.receipt_date,gI.type,rStatus.status,properties.id,properties.instrument_type,properties.serial_number,properties.execution_date,properties.reference_number,properties.grantor,properties. 	grantee,properties.stamp_duty,properties.registrar_general_initial,properties.registering_party,properties.or_number,properties.land_situation,properties.id')
				->from('DRPAdminBundle:Book',  'properties')
				->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "properties.instrument_type=gI.id")
				->leftJoin('DRPAdminBundle:RegistrationStatus', 'rStatus', "WITH", "rStatus.book_id=properties.id")
				->where('properties.registration_type=:type')
				->setParameter('type',$code)
				->getQuery()
				->getArrayResult();
			//echo"<pre>";print_r($properties);die;
				$arrAllProperties = array();
				foreach($properties as $property)
				{

				$arrProperty = $property;

				$arrProperty['grantorFN'] = '';
				$arrProperty['grantorLN'] = '';
				$arrProperty['grantortel1'] = '';
				$arrProperty['grantorNin'] = '';
				

				$arrProperty['granteeFN'] = '';
				$arrProperty['granteeLN'] = '';
				$arrProperty['granteetel1'] = '';
				$arrProperty['granteeNin'] = '';
				
				$arrProperty['partyRegistringFN'] = '';
				$arrProperty['partyRegistringLN'] = '';
				$arrProperty['partyRegistringNin'] = '';


				$arrProperty['recipientFN'] = '';
				$arrProperty['recipientLN'] = '';
				$arrProperty['recipientNin'] = '';

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
					if($propertyObject['type']=='GR' )
					{
						$grantorFN = $propertyObject['first_name'];
						$grantorLN = $propertyObject['last_name'];
						$grantortel1 = $propertyObject['telephone1'];
						$grantorNin = $propertyObject['nin'];
					}
						//echo $lessorFN;die;
						
					if($propertyObject['type']=='GE' )
					{
						$granteeFN = $propertyObject['first_name'];
						$granteeLN = $propertyObject['last_name'];
						$granteetel1 = $propertyObject['telephone1'];
						$granteeNin = $propertyObject['nin'];
					}

					if($propertyObject['type']=='PR' )
					{
						$partyRegistringFN = $propertyObject['first_name'];
						$partyRegistringLN = $propertyObject['last_name'];
						$partyRegistringNin = $propertyObject['nin'];
					}
					if($propertyObject['type']=='RP' )
					{
						$recipientFN = $propertyObject['first_name'];
						$recipientLN = $propertyObject['last_name'];
						$recipientNin = $propertyObject['nin'];	
					}
					
				}
				$arrProperty['grantorFN'] = $grantorFN;
				$arrProperty['grantorLN'] = $grantorLN;
				$arrProperty['grantortel1'] = $grantortel1;
				$arrProperty['grantorNin'] = $grantorNin;

				$arrProperty['granteeFN'] = $granteeFN;
				$arrProperty['granteeLN'] = $granteeLN;
				$arrProperty['granteetel1'] = $granteetel1;
				$arrProperty['granteeNin'] = $granteeNin;

				$arrProperty['partyRegistringFN'] = $partyRegistringFN;
				$arrProperty['partyRegistringLN'] = $partyRegistringLN;
				$arrProperty['partyRegistringNin'] = $partyRegistringNin;				

				$arrProperty['recipientFN'] = $recipientFN;
				$arrProperty['recipientLN'] = $recipientLN;
				$arrProperty['recipientNin'] = $recipientNin;


				//echo"<pre>";print_r($arrProperty);die;

				array_push($arrAllProperties, $arrProperty);

			}
				


				return $this->render('DRPRegistrarGeneralBundle:Pages:drb.html.twig',array('properties'=>$arrAllProperties,'code'=>$code));


		}

		public function changeRegistrationStatusAction()
		{



		$statusHtml = '';
		$em = $this->getDoctrine()->getEntityManager();
		$session = $this->getRequest()->getSession(); 
		if( isset($_POST['currentStatus']) && $_POST['currentStatus'] == 1 )
		{
			$status = 1;
			$statusString = '<span class="label label-sm label-info status" style="float:left" >Approved</span>';
			$ipAddress = $_SERVER['REMOTE_ADDR'];
				$params['event'] = $this->getLogEventTitleAction('APPROVED_REGISTRATION');
				$params['description'] = $this->getLogEventDescriptionAction('APPROVED_REGISTRATION');
				$params['userId'] =$session->get('userId');
				$params['ipAddress'] = $ipAddress;
				$params['creatorId'] = $session->get('userId');
				$this->setLogAction($params);

		}
		else if( isset($_POST['currentStatus']) && $_POST['currentStatus'] == 2 )
		{
			$status = 2;
			$statusString = '<span class="label label-sm label-danger status" style="float:left">Reject</span>';
			$ipAddress = $_SERVER['REMOTE_ADDR'];
				$params['event'] = $this->getLogEventTitleAction('DISAPPROVED_REGISTRATION');
				$params['description'] = $this->getLogEventDescriptionAction('DISAPPROVED_REGISTRATION');
				$params['userId'] =$session->get('userId');
				$params['ipAddress'] = $ipAddress;
				$params['creatorId'] = $session->get('userId');
				$this->setLogAction($params);
		}
		else
		{
			$status = 0;
			$statusString = '';
		}
			
		$id = $_POST['id'];

		
		if( isset($_POST['objectType']) && $_POST['objectType'] == 'Lease' )
		{

			$session = $this->getRequest()->getSession();
			$em = $this->getDoctrine()->getEntityManager();
			$confirmedSubscribe = $em->createQueryBuilder() 
			->select('rStatus')
			->update('DRPAdminBundle:RegistrationStatus',  'rStatus')
			->set('rStatus.status', ':status')
			->setParameter('status', $status)
			->where('rStatus.book_id = :id')
			->setParameter('id', $id)
			->getQuery()
			->getResult();
			
	
			$updateRegistrar = $em->createQueryBuilder() 
			->select('registrar')
			->update('DRPAdminBundle:RegistrationStatus',  'registrar')
			->set('registrar.registrar_general_id', ':registrarGeneral')
			->setParameter('registrarGeneral', $session->get('userId'))
			->where('registrar.book_id = :id')
			->setParameter('id', $id)
			->getQuery()
			->getResult();

		}
		if( $status == 1 || $status == 2 )
		{
			$statusHtml.= $statusString;
		}
		else
		{
			$statusHtml.='<input type="button" onclick="javascript:changeRegistrationStatus(\'status-'.$id.'\',1);">
				<input type="button" onclick="javascript:changeRegistrationStatus(\'status-'.$id.'\',2);">'; 
		}
		
		
		return new response($statusHtml);				
	}


	public function logoutAction(Request $request)
     	{
		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}

		$session->clear();
	    	return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
     	}	

	/*==========Registrar General Settins starts here=========*/

	/*===Start function for show profile of admin======*/
	public function adminProfileAction(Request $request,$id)
	{
		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}
		$em = $this->getDoctrine()->getEntityManager();
		$viewProfile = $em->getRepository('DRPAdminBundle:User')->find($id);
	
		return $this->render('DRPRegistrarGeneralBundle:Pages:registrarProfile.html.twig',array('viewProfile'=>$viewProfile));
	}
	/*===End function for show profile of admin======*/

	/*===Start function for admin settings======*/
	public function adminSettingsAction(Request $request,$id)
	{

		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}
		$em = $this->getDoctrine()->getEntityManager();
		$userInfo = $em->getRepository('DRPAdminBundle:User')->find($id);
	
		return $this->render('DRPRegistrarGeneralBundle:Pages:registrarSettings.html.twig',array('userInfo'=>$userInfo));
	}
	/*===End function for admin settings======*/

	/*===Start function for update admin Info======*/
	public function updateAdminInfoAction(Request $request)
	{

	
		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
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
	
	public function updateAdminImageAction(Request $request)
	{
		

		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
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
			$session->remove('pictureRegistrar');
			$session->set('pictureRegistrar', $sourcePath); 

			return new response('SUCCESS');		
		
		
	}	
	
	public function changePasswordAction()
		{
			$session = $this->getRequest()->getSession(); 			
		    	$userId = $session->get('userId');		
			//echo $userId."<PRE>";print_r($_POST);die;
			$em = $this->getDoctrine()->getEntityManager();
			$salonCurrentPassword = $em->createQueryBuilder() 
			->select('user')
			->from('DRPAdminBundle:User',  'user')
			->where('user.id = :id')
			->setParameter('id', $userId)
			->andwhere('user.type = :type')
			->setParameter('type', 2)
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

		public function forgotPasswordAction(Request $request)
    		 {

			$email = $_POST['email'];

			$em = $this->getDoctrine() ->getEntityManager();
		    	$repository = $em->getRepository('DRPAdminBundle:User');
    	
			   $user = $repository->findOneBy(array('email' => $email,'type'=>2));
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
				$headers .= 'From: <support@rdrp.com>' . "\r\n";
				$to = $email;
				$subject = "Registrar General Password Reset";

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
						Registrar General Password Reset
					</span></font>
				</div>
				<!-- padding -->
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Hello '. $user->getFirstName().' '. $user->getLastName().' you have successfuly reset your password <br> Your new password is: <b>'.$newPassword.'</b> .
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
		 return $this->render('DRPRegistrarGeneralBundle:Pages:passwordSuccess.html.twig');	

	}
	/*===End function for reset password message======*/
	public function addDocumentsAction(Request $request)
	{
		$message =  'Your Document uploaded Successfully';
		$session = $this->getRequest()->getSession();
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}
		$em = $this->getDoctrine()->getEntityManager();
		
		$id = $_REQUEST['code'];
		$adminId = $session->get('userId');	
		if ($request->getMethod() == 'POST')
        	{
			$sourcePath = $file = $_FILES['file']['name'];
			 $file1  = $_FILES['file']['tmp_name'];  
    			move_uploaded_file($_FILES["file"]["tmp_name"],
      			"uploads/documents/" . $_FILES["file"]["name"]);

			$document = new Document();
			$document->setName($sourcePath);
			$document->setBookId($id);
			$document->setRegistrarGeneralId($adminId);
			$em->persist($document);
			$em->flush();
		 return $this->render('DRPRegistrarGeneralBundle:Pages:addDocuments.html.twig',array('message'=>$message));	

		}		

		 return $this->render('DRPRegistrarGeneralBundle:Pages:addDocuments.html.twig');	

	}
	public function viewDRBAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	 		 return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
			}
			$id = $_REQUEST['id'];
			$em = $this->getDoctrine()->getEntityManager();
			// find the id of user
			$viewDRB = $em->getRepository('DRPAdminBundle:Book')->find($id);
			$viewLessor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GR'));
			$viewLeasse = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'GE'));
			$viewPr = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'PR'));
			$viewRP = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'RP'));

			$getType = $em->createQueryBuilder()
			->select('rtype.type,gI.type as InstrumentType')
			->from('DRPAdminBundle:Book',  'properties')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rtype', "WITH", "rtype.code=properties.registration_type")
			->leftJoin('DRPAdminBundle:GlobalInstrument', 'gI', "WITH", "gI.id=properties.instrument_type")
			->where('properties.id=:id')
			->setParameter('id', $id)
			->setMaxResults(1)
			->getQuery()
			->getArrayResult();
		


			$generalInfo = $em->createQueryBuilder()
			->select('user.first_name,user.last_name')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=rtype.registrar_general_id")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();

		//echo"<pre>";print_r($generalInfo);die;

			
				$properties = $em->createQueryBuilder()
			->select('user.first_name,user.last_name,rtype.status,general.id')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=general.registrar_general_initial")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();

			

			return $this->render('DRPRegistrarGeneralBundle:Pages:viewDRB.html.twig',array('viewDRB'=>$viewDRB,'viewLessor'=>$viewLessor,'viewLeasse'=>$viewLeasse,'viewPr'=>$viewPr,'viewRP'=>$viewRP,'getType'=>$getType[0]['type'],'generalInfo'=>$generalInfo,'instrumentType'=>$getType[0]['InstrumentType'],'properties'=>$properties));



		}

		public function viewLeaseAction(Request $request)
		{

			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	  		return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
			}

			$id = $_REQUEST['id'];
			$em = $this->getDoctrine()->getEntityManager();
			// find the id of user
			$viewLease = $em->getRepository('DRPAdminBundle:Book')->find($id);

			$viewLessor =$em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LR'));
			//echo"<pre>";print_r($viewLease);die;
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
			->select('user.first_name,user.last_name')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=rtype.registrar_general_id")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();

		//echo"<pre>";print_r($generalInfo);die;
			
			$properties = $em->createQueryBuilder()
			->select('user.first_name,user.last_name,rtype.status,general.id')
			->from('DRPAdminBundle:Book',  'general')
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rtype', "WITH", "general.id=rtype.book_id")
			->leftJoin('DRPAdminBundle:User', 'user', "WITH", "user.id=general.registrar_general_initial")
			->where('general.id=:id')
			->setParameter('id', $id)
			->getQuery()
			->getArrayResult();


			$viewLeasse = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'LE'));
			$viewPr = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'PR'));
			$viewRP = $em->getRepository('DRPAdminBundle:Company')->findOneBy(array('book_id'=>$id,'type'=>'RP'));	
			//echo"<pre>";print_r($viewRP);die;
			
			return $this->render('DRPRegistrarGeneralBundle:Pages:viewLease.html.twig',array('viewLease'=>$viewLease,'viewLessor'=>$viewLessor,'viewLeasse'=>$viewLeasse,'viewPr'=>$viewPr,'viewRP'=>$viewRP,'getType'=>$getType[0]['type'],'generalInfo'=>$generalInfo,'properties'=>$properties));


		}

		public function viewDocumentsAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	 		 return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
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
			
			
			return $this->render('DRPRegistrarGeneralBundle:Pages:viewDocuments.html.twig',array('documents'=>$documents));

		}

		public function viewDrbDocumentsAction(Request $request)
		{
			
			$session = $this->getRequest()->getSession();
			if( $session->get('type')!= '2')
			{
	         			
	 	 		 return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
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
			
			
			return $this->render('DRPRegistrarGeneralBundle:Pages:viewDrbDocuments.html.twig',array('documents'=>$documents));

		}


		public function addDrbDocumentsAction(Request $request)
		{

		$session = $this->getRequest()->getSession();
		$message =  'Your Document uploaded Successfully';	
		if( $session->get('type')!= '2')
		{
	         			
	 	  return $this->redirect($this->generateUrl('registrarGeneral_registrarGenerallogin'));
		}
		$em = $this->getDoctrine()->getEntityManager();
		
		$id = $_REQUEST['code'];
		$adminId = $session->get('userId');	
		if ($request->getMethod() == 'POST')
        	{
			$sourcePath = $file = $_FILES['file']['name'];
			 $file1  = $_FILES['file']['tmp_name'];  
    			move_uploaded_file($_FILES["file"]["tmp_name"],
      			"uploads/documents/" . $_FILES["file"]["name"]);

			$document = new Document();
			$document->setName($sourcePath);
			$document->setBookId($id);
			$document->setRegistrarGeneralId($adminId);
			$em->persist($document);
			$em->flush();
			 return $this->render('DRPRegistrarGeneralBundle:Pages:addDrbDocuments.html.twig',array('message'=>$message));	
		}		

		 return $this->render('DRPRegistrarGeneralBundle:Pages:addDrbDocuments.html.twig');	

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

		public function getLogEventTitleAction($param)
		{
			if( $param == 'ADD_USER' )			
				return 'ADD_USER';
			else if( $param == 'REGISTRATION_FAILURE' )			
				return 'REGISTRATION_FAILURE';
			

			else if( $param == 'EDIT_USER' )			
				return 'EDIT_USER';
			else if( $param == 'DELETE_USER' )			
				return 'DELETE_USER';
			else if( $param == 'EDIT_PLAN' )			
				return 'EDIT_PLAN';
			else if( $param == 'ADD_PLAN' )			
				return 'ADD_PLAN';

			else if( $param == 'DELETE_PLAN' )			
				return 'DELETE_PLAN';


			else if( $param == 'EDIT_DRB' )			
				return 'EDIT_DRB';
			else if( $param == 'ADD_DRB' )			
				return 'ADD_DRB';

			else if( $param == 'DELETE_DRB' )			
				return 'DELETE_DRB';


			else if( $param == 'EDIT_LEASE' )			
				return 'EDIT_LEASE';
			else if( $param == 'ADD_LEASE' )			
				return 'ADD_LEASE';

			else if( $param == 'DELETE_LEASE' )			
				return 'DELETE_LEASE';
			else if( $param == 'APPROVED_REGISTRATION' )			
				return 'APPROVED_REGISTRATION';	
			else if( $param == 'DISAPPROVED_REGISTRATION' )			
				return 'DISAPPROVED_REGISTRATION';


			

						

		}

		public function getLogEventDescriptionAction($param)
		{
			if( $param == 'ADD_USER' )			
				return 'REGISTRATION_SUCCESS';
			else if( $param == 'REGISTRATION_FAILURE' )			
				return 'REGISTRATION_FAILURE';
			
			else if( $param == 'EDIT_USER' )			
				return 'EDIT_USER';

			else if( $param == 'DELETE_USER' )			
				return 'DELETE_USER';
			else if( $param == 'EDIT_PLAN' )			
				return 'EDIT_PLAN';
			else if( $param == 'ADD_PLAN' )			
				return 'ADD_PLAN';

			else if( $param == 'DELETE_PLAN' )			
				return 'DELETE_PLAN';

			else if( $param == 'EDIT_DRB' )			
				return 'EDIT_DRB';
			else if( $param == 'ADD_DRB' )			
				return 'ADD_DRB';

			else if( $param == 'DELETE_DRB' )			
				return 'DELETE_DRB';


			else if( $param == 'EDIT_LEASE' )			
				return 'EDIT_LEASE';
			else if( $param == 'ADD_LEASE' )			
				return 'ADD_LEASE';

			else if( $param == 'DELETE_LEASE' )			
				return 'DELETE_LEASE';	
			else if( $param == 'APPROVED_REGISTRATION' )			
				return 'APPROVED_REGISTRATION';	
			else if( $param == 'DISAPPROVED_REGISTRATION' )			
				return 'DISAPPROVED_REGISTRATION';
	

		}

		public function pendingDRBAction()
		{
			
			$em = $this->getDoctrine()->getEntityManager();
			$book = $em->createQueryBuilder()
			->select('rType.type,book.or_number,book.reference_number,book.serial_number,book.lomp,rStatus.status,book.land_situation,book.execution_date,book.receipt_date,book.id')
			->from('DRPAdminBundle:Book',  'book')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rType', "WITH", "rType.code=book.registration_type")	
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rStatus', "WITH", "rStatus.book_id=book.id")		
			->where('rType.property_type=:type')
			->andwhere('rStatus.status = 0')
			->setParameter('type', 'drb')
			->getQuery()
			->getArrayResult();

			 return $this->render('DRPRegistrarGeneralBundle:Pages:pendingDRB.html.twig',array('properties'=>$book));
		}

		public function pendingLeaseAction()
		{
			
			
			$em = $this->getDoctrine()->getEntityManager();
			$book = $em->createQueryBuilder()
			->select('rType.type,book.or_number,book.lomp,book.reference_number,book.serial_number,book.land_situation,rStatus.status,book.execution_date,book.receipt_date,book.id')
			->from('DRPAdminBundle:Book',  'book')
			->leftJoin('DRPAdminBundle:RegistrationType', 'rType', "WITH", "rType.code=book.registration_type")
			->leftJoin('DRPAdminBundle:RegistrationStatus', 'rStatus', "WITH", "rStatus.book_id=book.id")
			
			->where('rType.property_type=:type')
			->andwhere('rStatus.status = 0')
			->setParameter('type', 'lease')
			->getQuery()
			->getArrayResult();

			//echo"<pre>";print_r($book);die;


			 return $this->render('DRPRegistrarGeneralBundle:Pages:pendingLease.html.twig',array('properties'=>$book));
		}
		public function setCurrentUrlInSessionAction()
		{
			$session = $this->getRequest()->getSession();
			$currentUrl = $_POST['currentUrl'];
			$session->set('documentBackUrl',$currentUrl);
			return new response("SUCCESS");

			
		}



}		
