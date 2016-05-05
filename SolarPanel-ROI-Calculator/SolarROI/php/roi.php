
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>Solar Panel ROI Calculator</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="../styles/layout.css" type="text/css" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!--<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAF2wqqKgC41AFKvvGCMgDpVH6IlsGJ9wM&callback=initMap">
    </script>-->
	
<script src="http://mbostock.github.com/d3/d3.v2.js"></script>
<script type="text/javascript" src="../scripts/jquery-1.11.3.min.js"></script>
<!--<script type="text/javascript" src="../scripts/jquery-1.4.1.min.js"></script>-->
<!--<script type="text/javascript" src="../scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.7.2.custom.min.js"></script>
<script type="text/javascript" src="../scripts/jquery.tabs.setup.js"></script>-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript" src="../scripts/roi.js"></script>
<script type="text/javascript" src="../scripts/chart.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
      <p>Phone: +1 617-480-8802 | Mail: rkachhwa@cs.uml.edu</p>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topnav">
   <ul>
     <li><a href="./loggedin.php">Home</a></li>
      <li class="active"><a href="./roi.php">ROI</a></li>
      <li><a href="./ajax.php">Live Data</a></li>
	  <li><a href="./videos.php">Videos</a></li> 
    </ul>
  </div>
</div>
			

	<!--<h4 style="position:absolute;top:200px;left:110px; float:left;">Solar Return On Investment, 5% Annual Power Rate Increase</h4>-->
		<div class="left">
			<div class="form-style-2-heading">Provide your information</div>
			<form class ="calcroi">
			<ul class="form-style-1">
		    <li>
				<label>Average kWh used in a month <span class="required"></span></label>
				<input type="text" title="Average kWh used in a month" required name="avgkwh" class="formkwh field-divided" placeholder="kWh" />
			</li>
		    <li>
		        <label>Average Monthly Electricity Bill <span class="required"></span></label>
		        <input type="text" class="formbill field-long" title="Average Monthly Electricity Bill" required name="avgbill" placeholder="$" />
		    </li>
			<li>
		        <label>Tax Paid <span class="required"></span></label>
		        <input type="text" class="formtax field-long" title="Tax Paid" name="tax" placeholder="$" />
		    </li>
			<br>
			<li>
		        <label>Number of Solar Panels You Need </label>
		        <h5>(Not sure? Leave this blank, we will calculate it for you!)</h5>
				<input type="text" class="formpanels field-long" title="No of Panels You Need" name="elec" placeholder="No of Panels" />
				
		    </li>
			<li>
		        <label>City <span class="required"></span></label>
		        <input type="text" class="formcity field-long" title="Your City" required name="city" placeholder="city" />
		    </li>
			<li>
		        <label>Zip Code <span class="required"></span></label>
		        <input type="text" class="formzip field-long" title="Your Area ZipCode" required name="zipcode" placeholder="zipcode" />
		    </li>
			<br>
		    <li>
		        <input type="submit" class="btn" id="putg" value="Calculate" />
		    </li>
			</ul>
			</form>
	</div>
	<div class="right" id="rightroi" style="height:590px;">
	
		<div id="wxWrap">
		<span id="wxIntro">
	        Currently in <span class="city"></span>-- <span class="temp"></span> &#8451 <span class="sym"></span>
	    </span>
	    <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
	
		<br>
		<div id="wxWrap">
		<span id="sun">
			Condition: <span class="cond"></span> 
	    </span>
	    <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
		<br>
		<div id="wxWrap" class="displaytab">
		<span id="idpanel">
			<span class="panel"></span> 
	    </span>
	    <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
		<br>
		<div id="wxWrap" class="displaytab">
		<span id="idpower">
			 <span class="power"></span> 
	    </span>
	    <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
		
		<br>
		<div id="wxWrap" class="displaytab">
		<span id="idsave">
			<span class="save"></span> 
	    </span>
	    <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
	
		<br>
		<div id="wxWrap" class="displaytab">
		<span id="idroi">
			<span class="roi"></span> 
	    </span>
	 <span id="wxIcon2"></span>
	    <span id="wxTemp"></span>
	    </div>
		
		<h5 id="approx"></h5>
		<h5 id="approx2"></h5>
	</div>
	
	<div id="chart"></div>
		<hr>
	<div id="chart2"></div>
		<hr>
	<div id="chart3"></div>


<div class="wrapper col6">
  </div>
	</body>
</html>