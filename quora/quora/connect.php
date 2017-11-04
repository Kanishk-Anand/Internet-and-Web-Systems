<?php 
	$username="root";
	$password="kanishk";
	$servername="localhost";
	$connection= mysql_connect($servername,$username,$password);
	$select_db=mysql_select_db('quora');
	$db_error="";
	if(!$connection||!$select_db){
		$db_error="Cannot connect to DB";
		die($db_error);
	}
	
?>