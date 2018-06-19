<?php
require_once "functions.php";


$id = sanatizeString($_POST['id']);
$date = date_to_mysql(sanatizeString($_POST['date']));
$duty_start = sanatizeString($_POST['duty_start']);
$duty_end = sanatizeString($_POST['duty_end']);
$total_duty = sanatizeString($_POST['total_duty']);
$flightpic = sanatizeString($_POST['flightpic']);
$picus = sanatizeString($_POST['picus']);
$deltao = sanatizeString($_POST['deltao']);
$nightstop = sanatizeString($_POST['nightstop']);
$status = "closed";

$query = queryMysql("UPDATE fdp SET id='$id',"


."date='$date',"
."dutystart='$duty_start',"
."dutyend='$duty_end',"
."totalduty='$total_duty',"
."flightpic='$flightpic',"
."picus='$picus',"
."deltao='$deltao',"
."status='$status',"
."nightstop='$nightstop' WHERE id='$id'");

if($query){
  echo "Flight Closed Succesfully";
}

else{
  echo "Error: Flight was not closed";
}
