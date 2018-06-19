<?php

/*
 * This header script would be called on all pages to ensure they all look
 * the same
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
//echo "<!DOCTYPE HTML><HTML><HEAD>";
require_once 'functions.php';

$userstr ='(Guest)';
if (isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr = "($user)";
}
else
{
    $loggedin = FALSE;
}

?>

<!--

<html>
    <head>
        <title>Pilot Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



    </head>

    <body>
      <div data-role="navbar">
        <ul>
          <li><a href="a.html" class="ui-btn-active ui-state-persist">One</a></li>
          <li><a href="b.html">Two</a></li>
        </ul>
      </div>

    </body>
</html> -->
