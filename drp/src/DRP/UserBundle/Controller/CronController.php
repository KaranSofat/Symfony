<?php

namespace DRP\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use DRP\AdminBundle\Entity\Document;
use DRP\AdminBundle\Entity\Log;

class CronController extends Controller
{

public function emailAlertAction()
{

	$em = $this->getDoctrine()->getEntityManager();
		$users = $em->createQueryBuilder()
		->select('User')
		->from('DRPAdminBundle:User',  'User')
		->getQuery()
		->getArrayResult();

	foreach($users as $allUsers)
	{
		if($allUsers['search_count_balance']<=5)
		{
			$date=date("Y/m/d.");
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <support@rdrp.com>' . "\r\n";
			$to = $allUsers['email'];
			$subject = "Renew Plan";
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
						Renew Plan
					</span></font>
				</div>
				<!-- padding -->
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
					<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
						Hello '. $allUsers['first_name'].' '. $allUsers['last_name'].' your searches are quite low.<br> Your remaining searches are <b>'.$allUsers['search_count_balance'].'</b>.<br>Please renew your plan by click on the below button
					</span></font>
				</div>
				<!-- padding --><div style="height: 40px; line-height: 40px; font-size: 10px;">&nbsp;</div>
			</td></tr>
			<tr><td align="center">
				<div style="line-height: 24px;">
					<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
						<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
							 <a href="http://bwcmultimedia.com/PS/drp/" style="background-color: #26a69a;
    color: #ffffff; font-size: 17px;
    outline: medium none !important;
    padding: 13px 42px;
    text-decoration: none;" >Click For Renew Plan </a></font></a>
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



			//$txt='Hello '.$allUsers['first_name'].' '. $allUsers['last_name'].',<br><br>Your searches are quite low.Please add more searches to using this service';
			mail($to,$subject,$txt,$headers);
			
		//echo $to;die;

		}
		
		
	}
			
}



}
