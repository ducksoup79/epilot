<?php

/*
 * Creates a new user in the database, only the admin should have access
 * to this script
 */

require_once 'header.php';



if (isset($_POST['submit']))
{
    $user_name = sanatizeString($_POST['user_name']);
    $email = sanatizeString($_POST['email']);
    $pass = sanatizeString($_POST['pass']);
    $role = sanatizeString($_POST['role']);
    

   $stored_password =md5(trim($pass));

    queryMysql("INSERT INTO members(user_name,email,pass,role) VALUES("
        . "'$user_name',"
        . "'$email',"
        . "'$stored_password',"
        . "'$role')");
        
       // header('Location:list_users.php');
        exit;

}

?>

<html>
    <body>
    <form method='post' action='newuser.php'>
    Name: <input type='text' maxlength='20' name='user_name' id='user_name' ><br>
    Email: <input type='text' maxlength='30' name='email' id='email' ><br>
    Password: <input type='text' maxlength='40' name='pass' id='pass'><br>
    Role: <input type='text' maxlength='10' name='role' id='role'><br>
    
   <input type="submit" id ="submit" type ="submit" name="submit" value="Create">
    </form>
    </body>
</html>


