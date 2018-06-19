<?php
//This script loads the date and duty time into the database

require_once "header.php";


//only get data if user is logged in
if(isset($_SESSION['user'])){


	$date = date_to_mysql(sanatizeString($_POST['date']));
	$duty_start = sanatizeString($_POST['duty_start']);
	$nightstop = sanatizeString($_POST['nightstop']);



	//check if checkbox were set and give value
	if(isset($nightstop)){
		$nightstop = "1";
	}
	else{
		$nightstop = "0";
	}

	$status = "open";
	$name = $_SESSION['user'];

	$query = queryMysql("INSERT INTO fdp VALUES(DEFAULT,'$date','$duty_start','','','','','','$nightstop','$name','$status')");

	//check if query were executed succesfully
	if($query){
		echo "Flight Opened Succesfully";
	}
	else{
		echo "Error: Flight was not opened";
	}
}
else{
	header('Location:login.html');
	exit;
}
