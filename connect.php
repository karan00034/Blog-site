<?php
ob_start();
session_start();

$dbhost 	= "127.0.0.1";
$dbuser 	= "root";
$dbpass 	= "";
$dbname 	= "newblog";
$charset 	= "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon,$dbname);
mysqli_set_charset($dbcon,$charset);
