<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/21/2015
 * Time: 9:56 PM
 */

include_once 'header.php';
include_once 'index.php';

$title = sanitizeString($_POST['title']);
$isbn = sanitizeString($_POST['isbn']);
$course = sanitizeString($_POST['course']);
if ($course == "") {
    $course = "N/A";
}
$price = sanitizeString($_POST['price']);
$bargain = sanitizeString($_POST['bargain']);
$condition = sanitizeString($_POST['condition']);
$contact = sanitizeString($_POST['contact']);
$tempdate = date("Y-m-d");
$expire = date('Y-m-d', strtotime($tempdate. ' + 60 days'));
$owner = $_SESSION['user'];

$query = "INSERT INTO books (title,isbn,condi,course,price,bargain,expire,contact,owner)"
. " VALUES ('$title','$isbn','$condition','$course','$price','$bargain','$expire','$contact','$owner')";

queryMysql($query);
$success = "Book successfully created! Refreshing page now.";
die("<script >printSuccess('$success'); setTimeout(function(){ window.location = 'index.php'; }, 1500); </script>");