<html>
    <font face='Arial'>
    <head>
        <title> Flight and Duty Record</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

<?php
require_once 'header.php';
 $id=$_GET['id'];


$query1=queryMysql("SELECT * FROM fdp WHERE id='$id'");
$query2 = mysqli_fetch_array($query1);

if(isset($_POST['submit'])) //if the form is submitted, do the following
{
    //call the update query to save changes in form
    $id=$_GET['id'];
    $date= date_to_mysql($_POST['date']);
    $dutystart=$_POST['dutystart'];
    $dutyend=$_POST['dutyend'];
    $flightpic=$_POST['flightpic'];
    $picus=$_POST['picus'];
    $deltao=$_POST['deltao'];
   // $nightstop=$_POST['nightstop'];
    $status=$_POST['status'];
    $name=$_POST['name'];

    if(!isset($status))
    {
        $status = "open";
    }


    $sql = "UPDATE fdp SET date='$date',"
            . "dutystart='$dutystart',"
            . "dutyend='$dutyend',"
            . "totalduty= TIMEDIFF('$dutyend','$dutystart'),"
            . "flightpic='$flightpic',"
            . "picus='$picus',"
            . "deltao='$deltao',"
          //  . "nightstop='$nightstop',"
            . "status='$status',"
            . "name='$name' WHERE id='$id'";

    queryMysql($sql);

    header('location:all_records.php');
    exit;

}

?>

<form method="post" action="<?php echo '?id='.$id. $_SERVER["PHP_SELF"];?>">
                Name: <input type="text" name="name" value="<?php echo $query2['name'];?>" readonly><br>
                Date: <input type="text" name="date" value="<?php echo convert_date($query2['date']);?>"><br>
                Duty Start: <input type="text" name="dutystart" value="<?php echo convert_time($query2['dutystart']);?> "><br>
                Duty End: <input type="text" name="dutyend" value="<?php echo convert_time($query2['dutyend']);?> "><br>
                Flight time PIC: <input type="text" name="flightpic" value="<?php echo convert_time($query2['flightpic']);?> "><br>
                PICUS: <input type="text" name="picus" value="<?php echo convert_time($query2['picus']);?> "><br>
                Delta Orientation: <input type="text" name="deltao" value="<?php echo convert_time($query2['deltao']);?> "><br>
                Status: <input type="checkbox" name="status" value="closed "> select to close<br>


                <input id ="submit" type ="submit" name="submit" value="Save" />
        </form>
     </body>
  </font>
</html>
