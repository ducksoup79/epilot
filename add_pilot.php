<?php


require_once 'functions.php';

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
	$citizen = "1";
}
else {
	$citizen = "0";
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



queryMysql("INSERT INTO pilot_info VALUES('',

'".$pilot_name."',
'".$pilot_surname."',
'".$start_date."',
'".$contract_end_date."',
'".$online_date."',
'".$online_turbine."',
'".$turbine_bond_end."',
'".$first_salary_increase."',
'".$second_salary_increase."',
'".$third_salary_increase."',
'".$bots_medical."',
'".$foreign_medical."',
'".$check_pilot."',
'".$check_pilot_flight."',
'".$check_pilot_gb."',
'".$check_pilot_exp."',
'".$sa_inst_rating."',
'".$bots_inst_rating."',
'".$dpe_exp."',
'".$ga8_lpc."',
'".$ga8_lpc_exp."',
'".$c208_lpc."',
'".$c208_lpc_exp."',
'".$kodi_lpc."',
'".$kodi_lpc_exp."',
'".$last_opc."',
'".$opc_expiry."',
'".$route_check."',
'".$route_check_exp."',
'".$foreign_licno."',
'".$foreign_cpl_exp."',
'".$foreign_lic_exp."',
'".$val_no."',
'".$val_exp."',
'".$bots_licno."',
'".$work_permit."',
'".$res_permit."',
'".$citizen."',
'".$crm_exp."',
'".$dg_exp."',
'".$sept_exp."',
'".$ops_manual_intro."',
'".$g500."',
'".$sms_intro."',
'".$mel_intro."',
'".$avsec."',
'".$dob."',
'".$email."',
'".$stored_password."',
'".$role."')");




header('Location:all_pilots.php');
exit;
