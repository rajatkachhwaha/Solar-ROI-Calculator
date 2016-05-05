<?php 
	//session_start();
	require('database.php');
	extract($_POST);
	$state = strip_tags($_GET['statename']);	
	$sql = "SELECT hours,tax FROM sunhours WHERE state="'Massachusetts'";"; 
	$query_result=mysqli_query($cn,$sql);
	$match  = mysqli_num_rows($query_result);
	$result= mysqli_fetch_array($query_result);
		if($match>0)
		{
			$statenameresult=$result[0];
			$statetaxresult=$result[1];
			$info=$statenameresult . "," . $statetaxresult ;
			echo $info;
		}
		
		else 
		{
			$statenameresult="Massachusetts";
			$statetaxresult="15";
			$info=$statenameresult . "," . $statetaxresult ;
			echo $info;
		}
	
?>
