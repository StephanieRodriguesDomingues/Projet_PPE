<?php
session_start();
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost = "localhost";
$dbname = "db_gestioncr";
$dbuser = "root";
$dbpass = "root";
// database connection
$conn = new
PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
?>