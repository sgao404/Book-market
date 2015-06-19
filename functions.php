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
 * $destroySession: Destroys a PHP session and clears its data to log users out.
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

function destroySession()
{
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
}

function sanitizeString($var)
{
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return mysql_real_escape_string($var);
}