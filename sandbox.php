<?php

require_once "functions.php";

$result = queryMysql("select * from fdp");
$array = mysqli_fetch_row($result);

echo json_encode($array);
