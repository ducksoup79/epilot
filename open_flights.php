<?php
    require_once "functions.php";

    $user = $_POST['user'];
    $result = queryMysql("SELECT * FROM fdp WHERE name LIKE '%".$user."%'&& status='open'");

    $json = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($json);
