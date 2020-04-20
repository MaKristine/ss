<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "supplier";

$dbConn = mysql_connect($host,$user,$pass);
mysql_select_db($dbname, $dbConn);

define('CODE','sos');

session_start();

?>
