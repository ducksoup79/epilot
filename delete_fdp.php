<?php
require_once 'header.php';
require_once 'functions.php';
sanatizeString($id=$_GET['id']);

$sql = "DELETE FROM fdp WHERE id='$id'";
queryMysql($sql);
header('location:all_records.php');
