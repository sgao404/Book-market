<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/19/2015
 * Time: 2:59 PM
 */

include_once 'header.php';
include_once 'index.php';

if (isset($_SESSION['user'])) {
    destroySession();
    $msg = 'You have been logged out. Please ' . "<a href='index.php'>click here>/a> to refresh the page.";
    echo "<script> printSuccess('$msg'); </script>";
}
else {
    $msg = "You cannot log out because you are not logged in";
    echo "<script> printFail('$msg'); </script>";
}

