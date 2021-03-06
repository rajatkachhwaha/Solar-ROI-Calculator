
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Solar Panel ROI Calculator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2wqqKgC41AFKvvGCMgDpVH6IlsGJ9wM&callback=initMap">
    </script>

<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.tabs.setup.js"></script>
<script type="text/javascript" src="../scripts/weather.js"></script>
<script type="text/javascript" src="../scripts/weatherbyzip.js"></script>
<script type="text/javascript" src="../scripts/user_info.js"></script>
</head>
<body>

<div class="wrapper col0">
  <div id="topbar">
    <div id="slidepanel">
      
           <div class="topbox last">
       
      </div>
      <br class="clear" />
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
        <li class="last"><a href="#">User Geo</a></li>
        <li><a href="#">Online Support</a></li>
        <li><a href="./logout.php">Log out</a></li>
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
     <li class="active"><a href="./loggedin.php">Home</a></li>
      <li><a href="./roi.php">ROI</a></li>
      <li><a href="./ajax.php">Live Data</a></li>
	  <li><a href="./videos.php">Videos</a></li> 
    </ul>
  </div>
</div>

<!-- ####################################################################################################### -->

<div class="container clearfix container-fluid ">
	<div class="left ">
		<div id="useros"></div><br>
		<div id="userbrowser"></div><br>
		<div id="userlocation" style="width: 90%; height:300px"></div>
	</div>
	<div class="right">
		
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