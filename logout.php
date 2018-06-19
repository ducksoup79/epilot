<?php

/*
 * This Script logs the user out of the session and redirects to index.php
 *
 */

require_once 'header.php';

if (isset($_SESSION['user']))
{
    destroySession();
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login.html">';
    exit();
}
