<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/18/2015
 * Time: 10:56 AM
 *
 * Functions:
 * $createTable: Checks whether a table already exists and, if not creates it.
 * $queryMysql: Issues a query to MySQL, outputting an error message if it fails.
 * $sanitizeString: Removes potentially malicious code or tags from user input.
 */

$dbhost  = 'localhost';
$dbname  = 'publications';
$dbuser  = 'gsd';
$dbpass  = '352298gsd';

$connection = mysql_connect($dbhost,$dbuser,$dbpass);

if (!$connection) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($dbname)
or die("Unable to select database: " . mysql_error());

function createTable($name, $query)
{
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
}

function queryMysql($query)
{
    $result = mysql_query($query);

    if (!$result) die ("Database access failed: " . mysql_error());

    return $result;
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}

function expireOrNot($date,$id)
{
    $date1 = strtotime($date);
    $tempdate = date("Y-m-d");
    $date2 = strtotime($tempdate);
    $secs = $date1 - $date2;
    $days = $secs / 86400;

    if ($days > 60) {
        $query = "DELETE FROM books WHERE id=$id";

        queryMysql($query);
    }
}