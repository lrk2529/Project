<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<script type="text/javascript">

			
		// INTIALIZATION AND SETUP CODE	
		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));

		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '1713561585583869',
		      xfbml      : true,
		      version    : 'v2.8'
		    });
		    FB.AppEvents.logPageView();
		      FB.Canvas.setAutoGrow();
		  };

      // INITIALIZATION SETUP END HERE

		  function fblogin(){
		  	 
		  	FB.getLoginStatus(function(response) {
			  if (response.status === 'connected') {
			     getUserProfile();
			  }
			  else {

			    FB.login();
			    fblogin();
			    console.log(response);
			    $("#status").empty().text("please login the facebook ");
			  }
			 });
		  }
       

       	 // fetching the all information  from login id

			  function getUserProfile(){
			  	console.log("fetching user information ....");
			  	var body = 'Reading JS SDK documentation';
			  
			  	FB.api('/me','get', { fields: "id,name,email,picture.width(9999).height(9999),gender,cover,link" },function(response) {
					console.log(response);
				  var profilePic = "http://graph.facebook.com/"+response.id+"/picture?type=large";

				  var userinfo="<img src='"+response.picture.data.url+"'/><br>";
				  	userinfo +=response.name+" ("+response.gender+" )<br/>"+response.email+"<br/>"+"<img src='"+response.cover.source+"'/><br>";
				   document.getElementById("status").innerHTML = userinfo; 
				});  

				FB.api('/me',{fields: "about,education,birthday,hometown,favorite_teams,languages,videos,work"},function(response) {
					console.log(response);
				});
			  }
		 // post the message using bellow code
			 function fbpost(){
		  		FB.api('/me/feed','post', { message: "My First Api for access FB !" },function(response) {
					document.getElementById("status").innerHTML="You used facebook Api for post the message"; 
					  console.log(response);
					});
			  }
		  // share the link using bellow code
			 function fbshare(){
			  		FB.api('/me/feed','post', { link: "http://www.google.com" },function(response) {
						document.getElementById("status").innerHTML ="You used facebook Api for Share the link"; 
						 console.log(response);
				     });
			  }
          // upload the image using bellow code
        	 function fbupload(){
			  		FB.api('/me/feed','post', { source: "http://static.businessinsider.com/image/518d4cd169bedda32700000c/image.jpg" },function(response) {			
						  document.getElementById("status").innerHTML ="You used facebook Api for Post the image"; 
						  console.log(response);
						});
			  }

		  // bellow javascript code for share the link
			 function all_final(){
				  FB.ui({
				    method: 'share',
				    display: 'popup',
				    href: 'http://www.reconnectenergy.com',
				  }, function(response){});
				}
			// bellow javascript code for like the post or anything , bellow code is optional
			  function like(){
			  	 FB.XFBML.parse();
			  }

		</script>
		<!-- login the facebook -->
		<fb:login-button scope="public_profile,email,publish_actions,user_education_history,user_birthday,user_location,user_hometown,user_likes,user_photos,user_videos,user_work_history,user_about_me" onlogin="fblogin();" data-size="xlarge"> </fb:login-button>
	    <!-- bellow code for post the message    -->
	    <button scope="public_profile,email" onclick="fbpost();" data-size="xlarge">Post </button>
	    <!-- login the facebook using button   -->
	    <button  onclick="fblogin();" > fb login </button>
		<!-- bellow code for share the link    -->
		<button  onclick="fbshare();" >Share LINK </button>
		<!-- bellow code for share the pic   -->
		<button  onclick="fbupload();" >Upload PHOTO </button>
		<!-- it's not necessary   -->	
	    <div id="fb-root"></div>

	  	<!-- bellow code for  share the link   -->
		<div class="fb-share-button" data-href="https://www.facebook.com/MCA-NITA-Fun-598581820269179/" ></div>
		<!-- bellow code for  share the link USING JAVASCRIPT  -->

		<button onclick="all_final();" >Share</button>
		<!-- bellow code for  like any status  -->
		<fb:like data-href="https://www.facebook.com/MCA-NITA-Fun-598581820269179/" ></fb:like>

		<!-- bellow code for follow the profile    -->
		<div class="fb-follow" data-href="https://www.facebook.com/ohm.gupta.14" data-layout="standard" data-size="small" data-show-faces="true"></div>


    	<!-- bellow code for page like   -->
		<div class="fb-page" data-href="https://www.facebook.com/MCA-NITA-Fun-598581820269179/"  data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/MCA-NITA-Fun-598581820269179/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/MCA-NITA-Fun-598581820269179/">MCA NITA Fun</a></blockquote></div>

		<br><br>

			<!-- bellow code for send message using this id as private -->
		<div class="fb-send" data-href="https://www.facebook.com/people/Raman-Kumar/100014161548111"></div>
 

    	<hr><hr><hr>
    	<!-- output the result  -->

  		<div id="status"></div>

	</body>
</html>		
