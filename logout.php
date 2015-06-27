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
    $msg = "You have been logged out. Bye!";
    unset($_SESSION["user"]);
    echo "<script>printSuccess('$msg'); setTimeout(function(){ window.location = 'index.php'; }, 1500); </script>";

}

else {
    $msg = "You cannot log out because you are not logged in";
    echo "<script>printFail('$msg'); setTimeout(function(){ window.location = 'index.php'; }, 1000); </script>";
}

