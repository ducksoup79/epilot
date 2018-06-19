<?php
session_start();
require_once 'functions.php';

if(isset($_POST['do_login']))
{

 $email=$_POST['email'];
 $pass=$_POST['password'];
 $passhash =md5($pass);
 $select_data=queryMysql("select * from pilot_info where email='$email' and password='$passhash'");
 if($row=mysqli_fetch_array($select_data))
 {
  $_SESSION['email']=$row['email'];
  $_SESSION['user']=$row['pilot_name'];
  $_SESSION['role']=$row['role'];
  echo "success";
 }
 else
 {
  echo "fail";
 }
 exit();
}
?>
