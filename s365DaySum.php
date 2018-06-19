<?php


require_once "functions.php";



$name = $_POST['searchname'];




$query=queryMysql("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(totalduty))) duty_sum, "
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(flightpic))) flight_sum,"
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(picus))) picus_sum,"
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(deltao))) deltao_sum "
                  . "FROM fdp WHERE (name='$name' "
                  . "AND date BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW())");



$result = mysqli_fetch_row($query);

//get the data rady to send back to the ajax call whom called it in pilot_profile

  echo json_encode($result);
 ?>
