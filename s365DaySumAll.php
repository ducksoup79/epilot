<?php
require_once 'header.php';

/*
 * This will show you the 28 day report (monthly) for flightime and duty
 */



        $name_query=queryMysql("SELECT pilot_name FROM pilot_info"); //extract all names in dailyinput

        echo "<font face='Arial'><h1>365 DAY FLIGHT & DUTY HOUR REPORT</h1>";
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Duty Time</th><th>Hours PIC</th><th>Hours PICUS</th><th>Delta Orientation</th>";

        while($pilotname = mysqli_fetch_array($name_query))
        {
          $searchname = $pilotname['pilot_name'];
          $query2="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(totalduty))) duty_sum, "
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(flightpic))) flight_sum,"
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(picus))) picus_sum,"
                  . "SEC_TO_TIME(SUM(TIME_TO_SEC(deltao))) deltao_sum "
                  . "FROM fdp WHERE (name='$searchname' "
                  . "AND date BETWEEN DATE_SUB(NOW(), INTERVAL 365 DAY) AND NOW())";


          $result2 = queryMysql($query2);

          $dutyhoursum = mysqli_fetch_array($result2);


          echo "<tr><td>".$pilotname['pilot_name']."</td> ";
          echo "<td>".$dutyhoursum['duty_sum']."</td>";
          echo "<td>".$dutyhoursum['flight_sum']."</td>";
          echo "<td>".$dutyhoursum['picus_sum']."</td>";
          echo "<td>".$dutyhoursum['deltao_sum']."</td></tr>";
        }
