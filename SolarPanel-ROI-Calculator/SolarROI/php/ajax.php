

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Solar Panel ROI Calculator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2wqqKgC41AFKvvGCMgDpVH6IlsGJ9wM&callback=initMap">
    </script>
<script src="http://mbostock.github.com/d3/d3.v2.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.tabs.setup.js"></script>
<script type="text/javascript" src="../scripts/weather.js"></script>
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
        <li class="last"><a href="./usergeo.php">User Geo</a></li>
        <li><a href="#">Online Support</a></li>
        <li><a href="./logout.php">Log out</a></li>
      </ul>
      <p>Phone: +1 6174808802 | Mail: rkachhwa@cs.uml.com</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
  <ul>
     <li><a href="./loggedin.php">Home</a></li>
      <li><a href="./roi.php">ROI</a></li>
      <li class="active"><a href="#">Live Data</a></li>
	  <li><a href="./videos.php">Videos</a></li> 
    </ul>
  </div>
</div>

	
<div class="left">
<h4>WTI Crude Oil 204 x 210 px</h4>
<h4><script type="text/javascript"
	src="http://www.oil-price.net/TABLE2/gen.php?lang=en">
</script>
<noscript><a href="http://www.oil-price.net/dashboard.php?lang=en#TABLE2"></a>
</noscript></h4>
<br>
<h4>BRENT Crude Oil 204 x 210 px</h4>
<h4><script type="text/javascript"
	src="http://www.oil-price.net/TABLE2/gen.php?lang=en">
</script>
<noscript><a href="http://www.oil-price.net/dashboard.php?lang=en#TABLE2"></a>
</noscript></h4>
</div>
<div class="right" style="height:830px;">
<h4><script type="text/javascript" src="http://oilprice.com/widgets/energyproduction.js"></script></h4>
<br>
<h4><script type="text/javascript" src="http://oilprice.com/widgets/alternateenergy.js"></script></h4>
</div>
	
<script>
	var value=10;
	//var value= document.getElementById(sun).value;
		if (1) {
			//$('#sunny').html(info.temp);
			document.getElementById("sun").innerHTML ='sun : not sunny';
		}
		else{
			//value = "Hello"
			//$('#sunny').html(info.temp);
		}
		
</script>
	<div class="wrapper col6">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">weblab.cs.uml.edu</a></p>
    <p class="fl_right">Designed by <a href="http://www.cs.uml.edu/~rkachhwa" title="Uml CS">Rajat</a></p>
    <br class="clear" />
  </div>
</div>			
	
	</body>
</html>