<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function()
    {
        (function(d, s, id)
            {
                 var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId={{ fbAppId }}";
                  fjs.parentNode.insertBefore(js, fjs);
            }
            (document, 'script', 'facebook-jssdk')
            );

            FB.init({appId: "{{ fbAppId }}", status: true, cookie: false, oauth  : true, xfbml  : true});

       
 
      });
 
        function postToFeedbh()  
        {
            //alert(document.getElementById('hidSelectedLink').value);
            FB.api('/me', {fields: "id,first_name,last_name,email,picture"}, function(response)  
            {

                console.log(response);
                var facebookid = response.id;

                if(response.first_name)
                {
                 
                    document.getElementById('fbFirstName').value=response.first_name;
                    document.getElementById('fbLastName').value=response.last_name;
 		    document.getElementById('fbpimage').value=response.picture.data.url;
                    document.getElementById('fbUserFullName').value=response.first_name+' '+response.last_name;
                    document.getElementById('fbEmail').value=response.email;

			document.getElementById('user_form_email').value=response.id;
         
										document.newform.submit();
                    
                }
    
                
           var userpass = response.first_name+response.last_name;
              var facebookid = response.id;
var imgurl = "https://graph.facebook.com/"+facebookid+"/picture?width=230&height=230";// "https://graph.facebook.com/"+facebookid+"/picture?type=large"; //response.picture.data.url;
                $('#user_form_plainPassword_password').val(userpass);
                $('#user_form_plainPassword_conf_password').val(userpass);
                $('#user_form_avatar').val(imgurl);
 
                $('#facebook_name').html(response.first_name+' '+response.last_name);
 
                $('#facebook_img').html('<img style="margin:0px" id="avatar_img" src="'+imgurl+'">');
                $('#facebook_img_section').show(); 
                checkfacebookuser(facebookid);
            });
        }
 
        function checkfacebookuser(facebookid)
        {
            var rootpath = '{{ path('verifyfbaccount') }}';
            $.post(rootpath,{'facebookid':facebookid},
                function(data)
                {
                       if(data)
                    {
                        alert(data);
                      }
                    else
                    {
                    }
                }
            );
 
        }
        function fblogin()  
        {
       
            FB.login(function(response)  
                {
                    postToFeedbh();
                },  
                {scope:'email,read_stream,publish_stream,offline_access'});
      
}

    </script>


 <script src='https://connect.facebook.net/en_US/all.js'></script>


 <div itemscope itemtype="http://schema.org/Product" itemref="_url2 _brand3" class="main"> <!-- search by state -->
    
   
    <!-- write review -->
   <div class="titles oranges border">
      <h2>Reviewer Login</h2>
    </div>
<!-- 12-23-2014 updates by grace starts-->
<style>
.fb_btn{width:100%;max-width:234px;float:right;}
@media only screen and (max-width: 768px) {.fb_btn{ float:none;margin:0 auto;  } .fb{width: 68%;margin: 0 auto;float: none;}}
</style>
<!-- 12-23-2014 updates by grace ends-->

		  <form method="POST" class="signin" action="{{path('raa_web_fbLogin')}}" name="newform">
		  <div class="fb">
		  <a class="sn-button fb-login" href="#" onclick="fblogin();return false;">
		       <input class="fb_btn" type="image" src= "{{ asset('themes/frontend/images/index.png') }}" style="/*width:20%; margin:0 0 0 80%;*/">  <!-- 12-23-2014 updates by grace -->
		  </a>
		  </div>
		  </div>
    <br/>
 
    
    <input type="hidden" name="fbUserFullName" id="fbUserFullName" style="border:none;background:white; color:#64829c;" readonly>
    <input type="hidden" name="fbEmail" id="fbEmail" style="display:none;border:none;background:white; color:#64829c;" readonly>
    <input type="hidden" name="fbFirstName" id="fbFirstName">
    <input type="hidden" name="fbLastName" id="fbLastName"> 
<input type="hidden" name="fbpimage" id="fbpimage">
<input type="hidden" name="user_form_email" id="user_form_email">
		</div>
   
 </div>


</form>
