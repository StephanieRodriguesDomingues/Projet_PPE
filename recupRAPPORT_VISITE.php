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
// new data
$rapNum = $_POST["RAP_NUM"];
$rapDateVisite = $_POST["RAP_DATEVISITE"];
$praNum = $_POST["PRA_NUM"];
$praCoeff = $_POST["PRA_COEFF"];
$praRemplacant = $_POST["PRA_REMPLACANT"];
$rapDate = $_POST["RAP_DATE"];
$rapMotif = $_POST["RAP_MOTIF"];
$rapBilan = $_POST["RAP_BILAN"];
$prod1 = $_POST["PROD1"];
$prod2 = $_POST["PROD2"];
$rapDoc = $_POST["RAP_DOC"];
$praEch1 = $_POST["PRA_ECH1"];
$praQte1 = $_POST["PRA_QTE1"];
?>