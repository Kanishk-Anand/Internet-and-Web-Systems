<?php
require 'conenct.php';
if(isset($_GET['location']){
	$response="";
	$location=$_GET['location'];
	$query="SELECT topics FROM trending WHERE place='".$location."';";
	$ret=mysql_query($query);
	while($res=mysql_fetch_array($ret)){
		$response.=$res[topics]."<br>";
	}
	echo $response;
	
?>