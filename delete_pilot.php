<?php

require_once 'header.php';

$id = $_GET['id'];

queryMysql("DELETE FROM pilot_info WHERE id='$id'");

exit(header("Location:all_pilots.php"));
