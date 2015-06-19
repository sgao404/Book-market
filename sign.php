<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/19/2015
 * Time: 12:07 AM
 */

include_once 'header.php';
include_once 'index.php';

// sign up case
if ($_POST['action'] == 'signup') {
    $error = $user = $pass = "";
    if (isset($_SESSION['user'])) destroySession();

    $user = sanitizeString($_POST['username']);
    $pass = sanitizeString($_POST['password']);


    $result = queryMysql("SELECT * FROM users WHERE username='$user'");
    if (mysql_num_rows($result)) {
        $error = 'Sorry, this username is taken!Try again!';
        echo "<script> printFail('$error'); </script>";
    }
    else {

        $salt1 = "dsa%h*";
        $salt2 = "pgid!$";
        $token = md5("$salt1$pass$salt2");

        queryMysql("INSERT INTO users (username, password)  VALUES('$user', '$token')");
        $success = "Account successfully created! Please sign in!";
        die("<script> printSuccess('$success'); </script>");
    }

    // sign in case; authentication
} else if ($_POST['action'] == 'signin') {

    $error="";
    $un_temp = mysql_entities_fix_string($_POST['username']);
    $pw_temp = mysql_entities_fix_string($_POST['password']);
    $query = "SELECT * FROM users WHERE username='$un_temp'";
    $result = queryMysql($query);
    if (!$result) {
        $error = "Database access failed: " . mysql_error();
        die("<script type='text/javascript'>printFail($error)</script>");
    } elseif (mysql_num_rows($result)) {
        $row = mysql_fetch_row($result);
        $salt1 = "dsa%h*";
        $salt2 = "pgid!$";
        $token = md5("$salt1$pw_temp$salt2");
        if ($token == $row[2]) {
            $_SESSION['user'] = $un_temp;
            $success = "You have logged in!You can now add or modify your posts!";
            echo "<script >printSuccess('$success'); setTimeout(function(){ window.location = 'index.php'; }, 1000); </script>";

        } else {
            $error = "Invalid username/password combination! Try again!";
            die("<script type='text/javascript'>printFail('$error');</script>");
        }

    }
    mysql_close($connection);

}


function mysql_entities_fix_string($string) {
    return htmlentities(mysql_fix_string($string));
}

function mysql_fix_string($string) {
    if (get_magic_quotes_gpc()) $string = stripslashes($string);
    return mysql_real_escape_string($string);
}