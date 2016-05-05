<?php
//$cn=new mysqli("localhost","rkachhwa","pl4465") or die("Could not Connect My Sql");

$cn = mysqli_connect("localhost","rkachhwa","pl4465","rkachhwa");


if (!$cn) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


//$select_db = mysqli_select_db($cn,"plingara");
	//if (!$select_db){
	  //  die("Database Selection Failed" . mysql_error());
	//}	
//mysql_select_db("my_iws")  or die("Could not connect to Database");
?>