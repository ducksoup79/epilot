<?php
        require_once 'header.php';


        $result=queryMysql("SELECT * FROM fdp");


        echo "<h1>All Records:</h1><br>";
        echo "<a href='all_pilots.php'>Return to Admin Menu</a>";
        echo "<br><br>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Date</th><th>Duty Start</th><th>Duty End</th><th>Total Duty</th><th>Hours PIC</th><th>Hours PICUS</th><th>Delta Orientation</th><th>Night Stop</th><th>Status</th></tr>";

        while($row = mysqli_fetch_array($result)) {
          echo "<tr><td>".$row['id']."</td>";
          echo "<td>".convert_date($row['date'])."</td>";
          echo "<td>".$row['name']."</td>";
          echo "<td>".convert_time($row['dutystart'])."</td>";
          echo "<td>".convert_time($row['dutyend'])."</td>";
          echo "<td>".convert_time($row['totalduty'])."</td>";
          echo "<td>".convert_time($row['flightpic'])."</td>";
          echo "<td>".convert_time($row['picus'])."</td>";
          echo "<td>".convert_time($row['deltao'])."</td>";
          echo "<td>".$row['nightstop']."</td>";
          echo "<td>".$row['status']."</td>";
          echo "<td><a href='edit_fdp.php?id=".$row['id']."'>Edit</a></td>";
          echo "<td><a href='delete_fdp.php?id=".$row['id']."'onclick='return  confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td></tr>";
        }
        echo "</table>";


        ?>
