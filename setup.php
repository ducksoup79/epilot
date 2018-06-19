<!DOCTYPE html>
<html>
    <head>
        <title>Setting up database</title>
    </head>

    <body>
        <h3>Setting up....</h3>

        <?php
          require_once 'functions.php';


          echo "Creating Table Pilot_info";   //stores pilot license information
          createTable('pilot_info',
                      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       pilot_name VARCHAR(20),
                       pilot_surname VARCHAR(30),
                       start_date DATE,
                       contract_end_date DATE,
                       online_date DATE,
                       online_turbine DATE,
                       turbine_bond_end DATE,
                       first_salary_increase DATE,
                       second_salary_increase DATE,
                       third_salary_increase DATE,
                       bots_medical DATE,
                       foreign_medical DATE,
                       check_pilot BOOLEAN,
                       check_pilot_flight BOOLEAN,
                       check_pilot_gb BOOLEAN,
                       check_pilot_exp DATE,
                       sa_inst_rating DATE,
                       bots_inst_rating DATE,
                       dpe_exp DATE,
                       ga8_lpc DATE,
                       ga8_lpc_exp DATE,
                       c208_lpc DATE,
                       c208_lpc_exp DATE,
                       kodi_lpc DATE,
                       kodi_lpc_exp DATE,
                       last_opc DATE,
                       opc_expiry DATE,
                       route_check DATE,
                       route_check_exp DATE,
                       foreign_licno VARCHAR(20),
                       foreign_cpl_exp DATE,
                       foreign_lic_exp DATE,
                       val_no VARCHAR(20),
                       val_exp DATE,
                       bots_licno VARCHAR(20),
                       work_permit DATE,
                       res_permit DATE,
                       citizen BOOLEAN,
                       crm_exp DATE,
                       dg_exp DATE,
                       sept_exp DATE,
                       ops_manual_intro DATE,
                       g500 DATE,
                       sms_intro DATE,
                       mel_intro DATE,
                       avsec DATE,
                       dob DATE,
                       email VARCHAR(30),
                       password VARCHAR(40),
                       role VARCHAR(10)');

  echo "Creating initial admin account....";
  queryMysql("INSERT INTO pilot_info (pilot_name,email,password,role) VALUES('admin','admin','21232f297a57a5a743894a0e4a801fc3','admin')");

    echo "Creating Table fdp....";
          createTable('fdp',                //creates fdp table to store flight and duty hours
                      'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                       date DATE,
                       dutystart TIME,
                       dutyend TIME,
                       totalduty TIME,
		       flightpic TIME,
		       picus TIME,
		       deltao TIME,
		       nightstop VARCHAR(5),
		       name VARCHAR(50),
		       status VARCHAR(10)');

        ?>
    </body>
</html>
