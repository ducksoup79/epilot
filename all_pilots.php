<?php
/*
 *View all pilots
 *
 */

require_once 'header.php';

$error = "";

if (isset($_SESSION['user'])){

if ($_SESSION['role']=='admin')
{
    echo "<div class='pilot_info'>";
    print "\n<table>\n<tr>\n".
          "\n\t<th>Pilot Information on record</th>".
          "</tr>";

    $result = queryMysql("SELECT * FROM pilot_info");

    echo "<html><table border='1'>
<tr>
<th>License Number</th>
<th>Name</th>
<th>Surname</th>
<th>Medical Exp</th>
<th>GA8 LPC Exp</th>
<th>C208 LPC Exp</th>
<th>KODI LPC Exp</th>
<th>OPC Exp</th>
<th>Route Check Exp</th>
<th>Validation Exp</th>
<th>Check Pilot Exp</th>
<th>Botswana Instructors Exp</th>
<th>DPE Exp</th>
<th>CRM Exp</th>
<th>DG Exp</th>
<th>SEPT Exp</th>


</tr>";

while($row = mysqli_fetch_array($result))
{echo "<td class='date'>" . $row['bots_licno'] . "</td>";
echo "<td>" . $row['pilot_name'] . "</td>";
echo "<td>" . $row['pilot_surname'] . "</td>";
echo "<td class='date'>" . $row['bots_medical'] . "</td>";

echo "<td class='date'>" . $row['ga8_lpc_exp'] . "</td>";
echo "<td class='date'>" . $row['c208_lpc_exp'] . "</td>";
echo "<td class='date'>" . $row['kodi_lpc_exp'] . "</td>";
echo "<td class='date'>" . $row['opc_expiry'] . "</td>";
echo "<td class='date'>" . $row['route_check_exp'] . "</td>";
echo "<td class='date'>" . $row['val_exp'] . "</td>";
echo "<td class='date'>" . $row['check_pilot_exp'] . "</td>";
echo "<td class='date'>" . $row['bots_inst_rating'] . "</td>";
echo "<td class='date'>" . $row['dpe_exp'] . "</td>";
echo "<td class='date'>" . $row['crm_exp'] . "</td>";
echo "<td class='date'>" . $row['dg_exp'] . "</td>";
echo "<td class='date'>" . $row['sept_exp'] . "</td>";

echo "<td><a href='edit_pilot.php?id=".$row['id']."'>edit</a></td>";
echo "<td><a href='delete_pilot.php?id=".$row['id']."' onclick='return  confirm(\"Are you sure you want to delete this record?\")'>delete</a></td>";
echo "</tr>";
}
echo "</table></html>";

}
else{
  echo "You need to be an admin to enter this page";
}

}
else{
  header('Location:login.html');
  exit;
}
echo "</div>";
echo "<br><br><br>";

?>

<?php if (isset($_SESSION['user'])){

  if ($_SESSION['role']=='admin')
  { ?>


<html>
    <head>
        <title>Pilot Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="profile.css" type="text/css" rel="stylesheet"/>
	      <link href="form_style.css" type="text/css" rel="stylesheet"/>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Datepicker section -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>

            function toDate(dateStr) {
               const [year, month, day] = dateStr.split("-")
               return new Date(year, month - 1, day)
             }

            function dateDiff(date1,date2){
              var diffDays = parseInt((toDate(date2) - toDate(date1)) / (1000 * 60 * 60 * 24));

              return(diffDays);

              }


            function dateNow() {
               var d = new Date();

               var month = d.getMonth()+1;
               var day = d.getDate();

               var output = d.getFullYear() + '-' +
                   ((''+month).length<2 ? '0' : '') + month + '-' +
                   ((''+day).length<2 ? '0' : '') + day;

               return(output);
            };

            $(".date").each(function(index){

              var expDate = $(this).text();
              var now = dateNow();


              if(now > expDate) {
                $(this).css('color','red');
                $(this).css('font-weight','bold');
              }

              if ((dateDiff(now,expDate) < 30) && (dateDiff(now,expDate) > 0)) {
                $(this).css('color','orange');
                $(this).css('font-weight','bold');
              }

            });



        </script>

        <script>
          $( function() {
            $( "#menu" ).menu({
              items: "> :not(.ui-widget-header)"
            });
          } );
          </script>

          <style>
          .ui-menu { width: 200px; }
          .ui-widget-header { padding: 0.2em; }
          </style>


    </head>

    <body>

      <ul id="menu">
         <li class="ui-widget-header"><div>Admin</div></li>
         <li><div><a href="add_pilot.html">Add Pilot</a></div></li>
         <li><div><a href="all_records.php">View All Records</a></div></li>
         <li><div><a href="pilot_profile.php">Pilot Profile</a></div></li>
         <li class="ui-widget-header"><div>Summary Reports</div></li>
         <li><div><a href="s28DaySumAll.php">28 Day Summary</a></div></li>
         <li><div><a href="s365DaySumAll.php">365 Day Summary</a></div></li>


       </ul>


    </body>

</html>

<?php }}?>
