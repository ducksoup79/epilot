<?php

/*
 *Edit Pilot
 */

require_once'header.php';

$error = "";

$id=$_GET['id'];
$query1=  queryMysql("SELECT * FROM pilot_info WHERE id='$id'");
$query2 = mysqli_fetch_array($query1);


if(isset($_POST['submitme'])) //if the form is submitted, do the following
{

	$pilot_name = sanatizeString($_POST["pilot_name"]);
	$pilot_surname = sanatizeString($_POST["pilot_surname"]);
	$start_date = date_to_mysql($_POST["start_date"]);
	$contract_end_date = date_to_mysql(sanatizeString($_POST["contract_end_date"]));
	$online_date = date_to_mysql(sanatizeString($_POST["online_date"]));
	$online_turbine = date_to_mysql(sanatizeString($_POST["online_turbine"]));
	$turbine_bond_end = date_to_mysql(sanatizeString($_POST["turbine_bond_end"]));
	$first_salary_increase = date_to_mysql(sanatizeString($_POST["first_salary_increase"]));
	$second_salary_increase = date_to_mysql(sanatizeString($_POST["second_salary_increase"]));
	$third_salary_increase = date_to_mysql(sanatizeString($_POST["third_salary_increase"]));
	$bots_medical = date_to_mysql(sanatizeString($_POST["bots_medical"]));
	$foreign_medical = date_to_mysql(sanatizeString($_POST["foreign_medical"]));


	if(isset($_POST["check_pilot"]))
	{
		$check_pilot = "1";
	}
	else {
		$check_pilot = "0";
	}

	if(isset($_POST["check_pilot_flight"]))
	{
		$check_pilot_flight = "1";
	}
	else {
		$check_pilot_flight = "0";
	}


	if(isset($_POST["check_pilot_gb"]))
	{
		$check_pilot_gb = "1";
	}
	else {
		$check_pilot_gb = "0";
	}


	$check_pilot_exp = date_to_mysql(sanatizeString($_POST["check_pilot_exp"]));
	$sa_inst_rating = date_to_mysql(sanatizeString($_POST["sa_inst_rating"]));
	$bots_inst_rating = date_to_mysql(sanatizeString($_POST["bots_inst_rating"]));
	$dpe_exp = date_to_mysql(sanatizeString($_POST["dpe_exp"]));
	$ga8_lpc = date_to_mysql(sanatizeString($_POST["ga8_lpc"]));
	$ga8_lpc_exp = date_to_mysql(sanatizeString($_POST["ga8_lpc_exp"]));
	$c208_lpc = date_to_mysql(sanatizeString($_POST["c208_lpc"]));
	$c208_lpc_exp = date_to_mysql(sanatizeString($_POST["c208_lpc_exp"]));
	$kodi_lpc = date_to_mysql(sanatizeString($_POST["kodi_lpc"]));
	$kodi_lpc_exp = date_to_mysql(sanatizeString($_POST["kodi_lpc_exp"]));
	$last_opc = date_to_mysql(sanatizeString($_POST["last_opc"]));
	$opc_expiry = date_to_mysql(sanatizeString($_POST["opc_expiry"]));
	$route_check = date_to_mysql(sanatizeString($_POST["route_check"]));
	$route_check_exp = date_to_mysql(sanatizeString($_POST["route_check_exp"]));
	$foreign_licno = date_to_mysql(sanatizeString($_POST["foreign_licno"]));
	$foreign_cpl_exp = date_to_mysql(sanatizeString($_POST["foreign_cpl_exp"]));
	$foreign_lic_exp = date_to_mysql(sanatizeString($_POST["foreign_lic_exp"]));
	$val_no = date_to_mysql(sanatizeString($_POST["val_no"]));
	$val_exp = date_to_mysql(sanatizeString($_POST["val_exp"]));
	$bots_licno = sanatizeString($_POST["bots_licno"]);
	$work_permit = date_to_mysql(sanatizeString($_POST["work_permit"]));
	$res_permit = date_to_mysql(sanatizeString($_POST["res_permit"]));

	if(isset($_POST["citizen"]))
	{
		$citizen = 1;
	}
	else {
		$citizen = 0;
	}


	$crm_exp = date_to_mysql(sanatizeString($_POST["crm_exp"]));
	$dg_exp = date_to_mysql(sanatizeString($_POST["dg_exp"]));
	$sept_exp = date_to_mysql(sanatizeString($_POST["sept_exp"]));
	$ops_manual_intro = date_to_mysql(sanatizeString($_POST["ops_manual_intro"]));
	$g500 = date_to_mysql(sanatizeString($_POST["g500"]));
	$sms_intro = date_to_mysql(sanatizeString($_POST["sms_intro"]));
	$mel_intro = date_to_mysql(sanatizeString($_POST["mel_intro"]));
	$avsec = date_to_mysql(sanatizeString($_POST["avsec"]));
	$dob = date_to_mysql(sanatizeString($_POST["dob"]));
	$email = sanatizeString($_POST["email"]);
	$password = sanatizeString($_POST["password"]);
	$stored_password =md5(trim($password));
	$role = sanatizeString($_POST["role"]);


	queryMysql("UPDATE pilot_info SET id='$id',"


	."pilot_name='$pilot_name',"
	."pilot_surname='$pilot_surname',"
	."start_date='$start_date',"
	."contract_end_date='$contract_end_date',"
	."online_date='$online_date',"
	."online_turbine='$online_turbine',"
	."turbine_bond_end='$turbine_bond_end',"
	."first_salary_increase='$first_salary_increase',"
	."second_salary_increase='$second_salary_increase',"
	."third_salary_increase='$third_salary_increase',"
	."bots_medical='$bots_medical',"
	."foreign_medical='$foreign_medical',"
	."check_pilot='$check_pilot',"
	."check_pilot_flight='$check_pilot_flight',"
	."check_pilot_gb='$check_pilot_gb',"
	."check_pilot_exp='$check_pilot_exp',"
	."sa_inst_rating='$sa_inst_rating',"
	."bots_inst_rating='$bots_inst_rating',"
	."dpe_exp='$dpe_exp',"
	."ga8_lpc='$ga8_lpc',"
	."ga8_lpc_exp='$ga8_lpc_exp',"
	."c208_lpc='$c208_lpc',"
	."c208_lpc_exp='$c208_lpc_exp',"
	."kodi_lpc='$kodi_lpc',"
	."kodi_lpc_exp='$kodi_lpc_exp',"
	."last_opc='$last_opc',"
	."opc_expiry='$opc_expiry',"
	."route_check='$route_check',"
	."route_check_exp='$route_check_exp',"
	."foreign_licno='$foreign_licno',"
	."foreign_cpl_exp='$foreign_cpl_exp',"
	."foreign_lic_exp='$foreign_lic_exp',"
	."val_no='$val_no',"
	."val_exp='$val_exp',"
	."bots_licno='$bots_licno',"
	."work_permit='$work_permit',"
	."res_permit='$res_permit',"
	."citizen='$citizen',"
	."crm_exp='$crm_exp',"
	."dg_exp='$dg_exp',"
	."sept_exp='$sept_exp',"
	."ops_manual_intro='$ops_manual_intro',"
	."g500='$g500',"
	."sms_intro='$sms_intro',"
	."mel_intro='$mel_intro',"
	."avsec='$avsec',"
	."dob='$dob',"
	."email='$email',"
	."password='$stored_password',"
	."role='$role' WHERE id='$id'");

	header('Location:all_pilots.php');
	exit;

}
?>
<html>
    <head>
        <title>Edit Pilot</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="form_style.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Datepicker section -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>

            $(function() {
            $(".datepicker").datepicker({dateFormat:"dd/mm/yy"});
            });
        </script>


    </head>
    <body>
        <div>
            <section>
                <form id="add_pilot_form" action="" method="POST">
                <h1 align="center">Edit Pilot</h1>

                <p>
                    <label for="pilot_name" class="label_width">
                        <span>Pilot Name: </span>
                    </label>
                    <input type="text" id="pilot_name" name="pilot_name" class="label_width" value="<?php echo $query2['pilot_name'];?>">
                </p>

                <p>
                    <label for="pilot_surname" class="label_width" >
                        <span>Pilot Surname: </span>
                    </label>
                    <input type="text" id="pilot_surname" name="pilot_surname" class="label_width" value="<?php echo $query2['pilot_surname'];?>">
                </p>

                <p>
                    <label for="start_date" class="label_width">
                        <span>Start Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="start_date" name="start_date" value="<?php echo $query2['start_date'];?>">
                </p>

                <p>
                    <label for="contract_end_date" class="label_width">
                        <span>Contract End Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="contract_end_date" name="contract_end_date" value="<?php echo $query2['contract_end_date'];?>">
                </p>

                <p>
                    <label for="online_date" class="label_width">
                        <span>On-Line Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="online_date" name="online_date" value="<?php echo $query2['online_date'];?>">
                </p>

                <p>
                    <label for="online_turbine" class="label_width">
                        <span>On-Line Turbine:</span>
                    </label>
                    <input class="datepicker" type="text" id="online_turbine" name="online_turbine" value="<?php echo $query2['online_turbine'];?>">
                </p>

                <p>
                    <label for="turbine_bond_end" class="label_width">
                        <span>Turbine Bond End:</span>
                    </label>
                    <input class="datepicker" type="text" id="turbine_bond_end" name="turbine_bond_end" value="<?php echo $query2['turbine_bond_end'];?>">
                </p>

                <p>
                    <label for="first_salary_increase" class="label_width">
                        <span>First Salary Increase:</span>
                    </label>
                    <input class="datepicker" type="text" id="first_salary_increase" name="first_salary_increase" value="<?php echo $query2['first_salary_increase'];?>">
                </p>

                <p>
                    <label for="second_salary_increase" class="label_width">
                        <span>Second Salary Increase:</span>
                    </label>
                    <input class="datepicker" type="text" id="second_salary_increase" name="second_salary_increase" value="<?php echo $query2['second_salary_increase'];?>">
                </p>

                <p>
                    <label for="third_salary_increase" class="label_width">
                        <span>Third Salary Increase:</span>
                    </label>
                    <input class="datepicker" type="text" id="third_salary_increase" name="third_salary_increase" value="<?php echo $query2['third_salary_increase'];?>">
                </p>

                <p>
                    <label for="bots_medical" class="label_width">
                        <span>Date of Botswana Medical:</span>
                    </label>
                    <input class="datepicker" type="text" id="bots_medical" name="bots_medical" value="<?php echo $query2['bots_medical'];?>">
                </p>

                <p>
                    <label for="foreign_medical" class="label_width">
                        <span>Foreign Medical:</span>
                    </label>
                    <input class="datepicker" type="text" id="foreign_medical" name="foreign_medical" value="<?php echo $query2['foreign_medical'];?>">
                </p>

                <p>
                    <label for="check_pilot" class="label_width">
                        <span>Check Pilot:</span>
                    </label>
                    <input type="checkbox" id="check_pilot" name="check_pilot" class="label_width"  <?php if($query2['check_pilot'] == 1) echo 'checked="checked"';?>>
                </p>

                <p>
                    <label for="check_pilot_flight" class="label_width">
                        <span>Check Pilot Flight:</span>
                    </label>

                    <input type="checkbox" id="check_pilot_flight" name="check_pilot_flight" class="label_width"  <?php if($query2['check_pilot_flight'] == 1) echo 'checked="checked"';?>">
                </p>

                <p>
                    <label for="check_pilot_gb" class="label_width">
                        <span>Check Pilot Ground Briefing:</span>
                    </label>
                    <input type="checkbox" id="check_pilot_gb" name="check_pilot_gb" class="label_width" <?php if($query2['check_pilot_gb'] == 1) echo 'checked="checked"';?>>
                </p>

                <p>
                    <label for="check_pilot_exp" class="label_width">
                        <span>Check Pilot Expiry:</span>
                    </label>
                    <input type="text" id="check_pilot_exp" name="check_pilot_exp" class="datepicker" value="<?php echo $query2['check_pilot_exp'];?>">
                </p>

                <p>
                    <label for="sa_inst_rating" class="label_width">
                        <span>Foreign Instructors Rating Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="sa_inst_rating" name="sa_inst_rating" value="<?php echo $query2['sa_inst_rating'];?>">
                </p>

                <p>
                    <label for="bots_inst_rating" class="label_width">
                        <span>Botswana Instructors Rating Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="bots_inst_rating" name="bots_inst_rating" value="<?php echo $query2['bots_inst_rating'];?>">
                </p>

                <p>
                    <label for="dpe_exp" class="label_width">
                        <span>Designated Pilot Examiner Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="dpe_exp" name="dpe_exp" value="<?php echo $query2['dpe_exp'];?>">
                </p>

                <p>
                    <label for="ga8_lpc" class="label_width">
                        <span>GA-8 LPC Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="ga8_lpc" name="ga8_lpc" value="<?php echo $query2['ga8_lpc'];?>">
                </p>

                <p>
                    <label for="ga8_lpc_exp" class="label_width">
                        <span>GA-8 LPC Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="ga8_lpc_exp" name="ga8_lpc_exp" value="<?php echo $query2['ga8_lpc_exp'];?>">
                </p>

                <p>
                    <label for="c208_lpc" class="label_width">
                        <span>C208 LPC Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="c208_lpc" name="c208_lpc" value="<?php echo $query2['c208_lpc'];?>">
                </p>

                <p>
                    <label for="c208_lpc_exp" class="label_width">
                        <span>C208 LPC Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="c208_lpc_exp" name="c208_lpc_exp" value="<?php echo $query2['c208_lpc_exp'];?>">
                </p>

                <p>
                    <label for="kodi_lpc" class="label_width">
                        <span>KODI LPC Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="kodi_lpc" name="kodi_lpc" value="<?php echo $query2['kodi_lpc'];?>">
                </p>

                <p>
                    <label for="kodi_lpc_exp" class="label_width">
                        <span>KODI LPC Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="kodi_lpc_exp" name="kodi_lpc_exp" value="<?php echo $query2['kodi_lpc_exp'];?>">
                </p>

                <p>
                    <label for="last_opc" class="label_width">
                        <span>Last OPC:</span>
                    </label>
                    <input class="datepicker" type="text" id="last_opc" name="last_opc" value="<?php echo $query2['last_opc'];?>">
                </p>

                <p>
                    <label for="opc_expiry" class="label_width">
                        <span>OPC Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="opc_expiry" name="opc_expiry" value="<?php echo $query2['opc_expiry'];?>">
                </p>

                <p>
                    <label for="route_check" class="label_width">
                        <span>Last Route Check:</span>
                    </label>
                    <input class="datepicker" type="text" id="route_check" name="route_check" value="<?php echo $query2['route_check'];?>">
                </p>

                <p>
                    <label for="route_check_exp" class="label_width">
                        <span>Route Check Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="route_check_exp" name="route_check_exp" value="<?php echo $query2['route_check_exp'];?>">
                </p>


                <p>
                    <label for="foreign_licno" class="label_width">
                        <span>Foreign License Number:</span>
                    </label>
                    <input type="text" id="foreign_licno" name="foreign_licno" class="label_width" value="<?php echo $query2['foreign_licno'];?>">
                </p>

                <p>
                    <label for="foreign_cpl_exp" class="label_width">
                        <span>Foreign CPL Expiry:</span>
                    </label>
                    <input class="datepicker" type="text" id="foreign_cpl_exp" name="foreign_cpl_exp" style="width:200" value="<?php echo $query2['foreign_cpl_exp'];?>">
                </p>

                <p>
                    <label for="foreign_lic_exp" class="label_width">
                        <span>Last Route Check:</span>
                    </label>
                    <input class="datepicker" type="text" id="foreign_lic_exp" name="foreign_lic_exp" style="width:200" value="<?php echo $query2['foreign_lic_exp'];?>">
                </p>

                <p>
                    <label for="val_no" class="label_width">
                        <span>Validation Number:</span>
                    </label>
                    <input type="text" id="val_no" name="val_no" class="label_width" value="<?php echo $query2['val_no'];?>">
                </p>

                <p>
                    <label for="val_exp" class="label_width">
                        <span>Validation Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="val_exp" name="val_exp" style="width:200" value="<?php echo $query2['val_exp'];?>">
                </p>

                <p>
                    <label for="bots_licno" class="label_width">
                        <span>Botswana License Number:</span>
                    </label>
                    <input type="text" id="bots_licno" name="bots_licno" style="width:200" value="<?php echo $query2['bots_licno'];?>">
                </p>

                <p>
                    <label for="work_permit" class="label_width">
                        <span>Work Permit Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="work_permit" name="work_permit" style="width:200" value="<?php echo $query2['work_permit'];?>">
                </p>

                <p>
                    <label for="res_permit" class="label_width">
                        <span>Residence Permit Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="res_permit" name="res_permit" style="width:200" value="<?php echo $query2['res_permit'];?>">
                </p>

                <p>
                    <label for="citizen" class="label_width">
                        <span>Citizen:</span>
                    </label>
                    <input type="checkbox" id="citizen" name="citizen" style="width:200" <?php if($query2['citizen'] == 1) echo 'checked="checked"';?>>
                </p>

                <p>
                    <label for="crm_exp" class="label_width">
                        <span>CRM Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="crm_exp" name="crm_exp" style="width:200" value="<?php echo $query2['crm_exp'];?>">
                </p>

                <p>
                    <label for="dg_exp" class="label_width">
                        <span>DG Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="dg_exp" name="dg_exp" style="width:200" value="<?php echo $query2['dg_exp'];?>">
                </p>

                <p>
                    <label for="sept_exp" class="label_width">
                        <span>SEPT Expiry Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="sept_exp" name="sept_exp" style="width:200" value="<?php echo $query2['sept_exp'];?>">
                </p>

                <p>
                    <label for="ops_manual_intro" class="label_width">
                        <span>Operations Manual Intro Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="ops_manual_intro" name="ops_manual_intro" style="width:200" value="<?php echo $query2['ops_manual_intro'];?>">
                </p>

                <p>
                    <label for="g500" class="label_width">
                        <span>G500:</span>
                    </label>
                    <input class="datepicker" type="text" id="g500" name="g500" style="width:200" value="<?php echo $query2['g500'];?>">
                </p>

                <p>
                    <label for="sms_intro" class="label_width">
                        <span>SMS Intro Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="sms_intro" name="sms_intro" style="width:200" value="<?php echo $query2['sms_intro'];?>">
                </p>

                <p>
                    <label for="mel_intro" class="label_width">
                        <span>MEL Intro Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="mel_intro" name="mel_intro" style="width:200" value="<?php echo $query2['mel_intro'];?>">
                </p>

                <p>
                    <label for="avsec" class="label_width">
                        <span>Avsec Intro Date:</span>
                    </label>
                    <input class="datepicker" type="text" id="avsec" name="avsec" style="width:200" value="<?php echo $query2['avsec'];?>">
                </p>

                <p>
                    <label for="dob" class="label_width">
                        <span>Date of Birth:</span>
                    </label>
                    <input class="datepicker" type="text" id="dob" name="dob" style="width:200" value="<?php echo $query2['dob'];?>">
                </p>

								<p>
                    <label for="email" class="label_width">
                        <span>Email:</span>
                    </label>
                    <input type="text" id="email" name="email" style="width:200" value="<?php echo $query2['email'];?>">
                </p>

                <p>
                    <label for="password" class="label_width">
                        <span>Password:</span>
                    </label>
                    <input type="text" id="password" name="password" style="width:200" value="<?php echo $query2['password'];?>">
                </p>

                <p>
                    <label for="role" class="label_width">
                        <span>Role:</span>
                    </label>
                    <select type="text" id="role" name="role" style="width:200" value="<?php echo $query2['role'];?>">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
									</select>
                </p>






                <p> <input type="submit" name="submitme" value="Submit Changes"></p>

            </form>
        </section>
        </div>



    </body>
</html>
