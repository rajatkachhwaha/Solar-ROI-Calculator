<!DOCTYPE html>
<html>
<head>
<title>Solar Panel ROI Calculator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<!--<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2wqqKgC41AFKvvGCMgDpVH6IlsGJ9wM&callback=initMap">
    </script>-->
<script src="http://mbostock.github.com/d3/d3.v2.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.tabs.setup.js"></script>
</head>
<body>
		<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      <div class="topbox">
        <h2>User Login</h2>
        <form action="login.php" method="post">
          <fieldset>
            <legend>User Login</legend>
            <label for="username">Username:
              <input type="text" required name="loginid" id="username" value="" />
            </label>
            <label for="password">Password:
              <input type="password" required name="pass" id="password" value="" />
            </label>
            <label for="remember">
              <input class="checkbox" type="checkbox" name="remember" id="remember" checked="checked" />
              Remember me</label>
            <p>
              <input type="submit" name="submit" id="submit" value="Login" />
              &nbsp;
              <input type="reset" name="reset" id="reset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
      <div class="topbox">
        <h2>New User? Sign Up Here:</h2>
        <form action="signup.php" method="post">
          <fieldset>
            <legend>New User</legend>
            <label for="email">Email:
              <input type="email" required name="email" id="email" value="" />
            </label>
            <label for="password">Password:
              <input type="password" required name="pass" id="password" value="" />
            </label>
            
            <p>
              <input type="submit" name="submit" id="submit" value="Sign Up"  />
              &nbsp;
              <input type="reset" name="reset" id="reset" value="Reset" />
            </p>
          </fieldset>
        </form>
      </div>
           <div class="topbox last">
       
      </div>
      <br class="clear" />
    </div>
    <div id="loginpanel">
      <ul>
        <li class="left">Click here to </li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">&raquo; Login</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1 class="title"><a href="#">Solar Panel ROI Calculator</a></h1>
      <p>Save Energy . Anytime . Anywhere.</p>
    </div>
    <div class="fl_right">
      <ul>
        <li class="last"><a href="../usergeo.html">User Geo</a></li>
        <li><a href="#">Online Support</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
      <p>Phone: +1 978-421-5451 | Mail: rkachhwa@cs.uml.com</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
    <ul>
     <li class="active"><a href="../index.html">Home</a></li>
	   <li><a href="../roi.html">ROI</a></li>
      <li><a href="../ajax.html">Live Data</a></li>
       <li><a href="../videos.html">Videos</a></li>
    </ul>
  </div>
</div>

<!-- ####################################################################################################### -->

<div class="container clearfix">
	<div class="left">
		<h3>
		<?php
		require('database.php');
		    // If the values are posted, insert them into the database.
	    	if (isset($_POST['email']) && isset($_POST['pass']))
		{
	        //$username = $_POST['username'];
	        $email = $_POST['email'];
	        $password = $_POST['pass'];
		$pass=mysql_escape_string(md5($password));
			$a1 = explode("@", $email);
			$username = $a1[0];
			$hash = md5( rand(0,1000) ); 
		
		$to = $email; 
    		$subject = 'Solar ROI Signup | Verification';
    		$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$username.'
Password: You know it better !
------------------------
 
Please click this link to activate your account:
http://weblab.cs.uml.edu/~rkachhwa/91513f2015/hw4/php/verify.php?email='.$email.'&hash='.$hash.'
 
';
    		$from = "noreply@weblab.cs.uml.edu.com";
    		$headers = "From:" . $from;
			
			$sql = 'SELECT count(*) from details where (email = "'.$email.'")';
			$query_result = mysqli_query($cn,$sql);	
			$result= mysqli_fetch_array($query_result);
			if($result[0]>0)
			{
				echo "Email ID already taken! Please login if you have signed up before";

			}
			
			else
			{
				$query = "INSERT INTO details (username,password,email,hash,active) VALUES ('".$username."','".$pass."','".$email."','".$hash."','0');";
				$result = mysqli_query($cn,$query);
				
					if($result)
					{
						$msg = 'You are all set! Check your Email, <br /> please verify by clicking the Activation Link that has been sent to your email.';
						echo $msg;
						mail($to,$subject,$message,$headers);
					}
					else
					{
						$msg = 'Oops! Something went wrong. We promise this will never happen again. Please go back to home and sign up again';
						echo $msg;
				
					}
			}
			}
?>


</div>
	<div class="right">
		<div id="useros"></div><br>
		<div id="userbrowser"></div><br>
		<div id="userlocation" style="width: 90%; height:300px"></div>
	</div>
</div>

<!-- ####################################################################################################### -->
<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">weblab.cs.uml.edu</a></p>
    <p class="fl_right">Designed by <a href="http://www.cs.uml.edu/~rkachhwa" title="Uml CS">Rajat</a></p>
    <br class="clear" />
  </div>
</div>
<script>
		function initMap() {
        getuserLocation();
        function getuserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }
        function showPosition(position) {
            console.log(position);
            var myLatLng = {lat: position.coords.latitude, lng: position.coords.longitude};

            // Create a map object and specify the DOM element for display.
            var map = new google.maps.Map(document.getElementById('userlocation'), {
                center: myLatLng,
                scrollwheel: false,
                zoom: 8
            });

            // Create a marker and set its position.
            var marker = new google.maps.Marker({
                map: map,
                position: myLatLng,
                title: 'your location!'
            });
        };
    }
    
		browserDetect();
		function browserDetect(){
        var nVer = navigator.appVersion;
        var nAgt = navigator.userAgent;
        var browserName  = navigator.appName;
        var nameOffset,verOffset,ix;

        // In Opera, the true version is after "Opera" or after "Version"
        if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
            browserName = "Opera";
        }
        // In MSIE, the true version is after "MSIE" in userAgent
        else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
            browserName = "Microsoft Internet Explorer";
        }
        // In Chrome, the true version is after "Chrome"
        else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
            browserName = "Chrome";
        }
        // In Safari, the true version is after "Safari" or after "Version"
        else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
            browserName = "Safari";
        }
        // In Firefox, the true version is after "Firefox"
        else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
            browserName = "Firefox";
        }
        // In most other browsers, "name/version" is at the end of userAgent
        else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) <
            (verOffset=nAgt.lastIndexOf('/')) )
        {
            browserName = nAgt.substring(nameOffset,verOffset);
            if (browserName.toLowerCase()==browserName.toUpperCase()) {
                browserName = navigator.appName;
            }
        }
        document.getElementById("userbrowser").innerHTML ='Your are using '+browserName+' browser';
    };
    osDetection();
    function osDetection(){
        var OSName="Unknown OS";
        if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
        if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
        if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
        if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";

        document.getElementById('useros').innerHTML= 'Your are using '+OSName+' operating system';
    }
</script>
</body>
</html>