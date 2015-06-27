<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/25/2015
 * Time: 4:04 PM
 */

include_once 'header.php';
include_once 'index.php';

if (isset($_SESSION['user'])) {

    $id = $_POST['idid'];
    $user = $_SESSION['user'];
    $owner = $_POST['own'];

    if ($user == $owner) {

        $query = "DELETE FROM books WHERE id=$id";

        queryMysql($query);

        $success = "Record successfully deleted!</br> Refreshing page now.";
        echo("<script type='text/javascript'>printSuccess('$success'); setTimeout(function(){ window.location = 'index.php'; }, 1500); </script>");
    } else {
        $error = "You cannot remove someone else\'s record!";
        echo "<script type='text/javascript'>printFail('$error');</script>";
    }

    } else {

    $error = "You cannot remove the records now.</br> Please log in!";
    echo "<script type='text/javascript'>printFail('$error');</script>";
}