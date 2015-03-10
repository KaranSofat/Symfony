//form
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payPalForm"  name="payform">
						<input type="hidden" name="cmd" value="_xclick">
						<input type="hidden" name="business" value="hbawab@magiclogix.com">
						<input type="hidden" name="currency_code" value="USD">
						<input type="hidden" name="return" value="{{URL::to('success')}}">
						<input type="hidden" name="cancel_return" value="{{URL::to('cancel')}}"/>
						<input type="hidden" name="notify_url" value="{{URL::to('success')}}"/>
						<input type="hidden" name="custom" value="" id="customvalue">
						<input type="hidden" name="item_name" value="Plan C" id="projectvalue">
						<input type="hidden" name="item_number" value="21">
						<input type="hidden" name="amount" value="99.99">
				        <input type="image" src="https://www.sandbox.paypal.com/en_GB/i/btn/btn_paynowCC_LG.gif" name="submit">
					</form>	
					
					
	//controller action

public function success(){
			$raw_post_data = file_get_contents('php://input');
			//print_r($raw_post_data);		
			$raw_post_array = explode('&', $raw_post_data);
			$myPost = array();
			foreach ($raw_post_array as $keyval) {
			  $keyval = explode ('=', $keyval);
			  if (count($keyval) == 2)
				 $myPost[$keyval[0]] = urldecode($keyval[1]);
			}
			// read the post from PayPal system and add 'cmd'
			$req = 'cmd=_notify-validate';
			if(function_exists('get_magic_quotes_gpc')) {
			   $get_magic_quotes_exists = true;
			} 
			foreach ($myPost as $key => $value) {        
			   if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) { 
					$value = urlencode(stripslashes($value)); 
			   } else {
					$value = urlencode($value);
			   }
			   $req .= "&$key=$value";
			}
			// STEP 2: Post IPN data back to paypal to validate
			$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
			if( !($res = curl_exec($ch)) ) {
				// error_log("Got " . curl_error($ch) . " when processing IPN data");
				curl_close($ch);
				exit;
			}
			curl_close($ch);
			// STEP 3: Inspect IPN validation result and act accordingly

			if (strcmp($res, "VERIFIED") == 0) {			
				$item_name = $_POST['item_name'];
				$item_number = $_POST['item_number'];
				$payment_status = $_POST['payment_status'];
				$payment_amount = $_POST['mc_gross'];
				$payment_currency = $_POST['mc_currency'];
				$txn_id = $_POST['txn_id'];
				$receiver_email = $_POST['receiver_email'];
				$payer_email = $_POST['payer_email'];
				$address= $_POST['address_street'];
				$zipcode = $_POST['address_zip'];
				$state = $_POST['address_state'];
				$city= $_POST['address_city'];
				$country = $_POST['address_country']; 
 				// <---- HERE you can do your INSERT to the database				
				$plan = Session::get('get_plan');
				$data=Session::get('data');
				if($data){
					$pass=Session::get('pass');			
				DB::table('users')->insert($data);	
				DB::table('users')->where('email',$data['email'])->update(array('plan'=>$plan ));
				$id = DB::table('users')->where('email',$data['email'])->get(array('id'));			
				DB::table('transaction_id')->insert(array('user_id'=>$id[0]->id, 'transaction_id'=>$txn_id,'payer_email'=>$payer_email,'txn_type'=>"paypal",'payment_status'=>$payment_status,'address'=>$address,'state'=>$state,'zipcode'=>$zipcode,'country'=>$country));
			    DB::table('transaction_list')->insert(array('transaction_id'=>$txn_id,'amount'=>$payment_amount,'email'=>$payer_email,'medium'=>"paypal",'firstname'=>$data['first_name'],'lastname'=>$data['last_name'] ));
				$mail =	Mail::send('emails.message', array('data'=>$data ,'plan'=>$plan ,'pass'=>$pass), function($message)
				{
					$data=Session::get('data');	
					$message->to($data['email'])->subject('Minitmeet');
				});
				Session::flush(); 
				$responsetext= "Transaction Done.Your transaction Id is: $txn_id.Enter Username and password to Login";
				return View::make('login')->with('success',$responsetext);
			    }
			   else{
				    return View::make('login')->with('success',"Provide Your Detail first");
			    }
			  }
			  else if (strcmp ($res, "INVALID") == 0){
				$responsetext= "Transaction Invalid";
				return View::make('login')->with('success',$responsetext);
			}
}
	
      public function cancel(){		        
				return View::make('index');		
	  }	
