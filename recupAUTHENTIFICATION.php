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
$user = $_POST['login'];
$password = $_POST['pwd'];
if($user == '') {
$errmsg_arr[] = 'Vous devez mettre votre identifiant';
$errflag = true;
}
if($password == '') {
$errmsg_arr[] = 'Vous devez mettre votre mot de passe';
$errflag = true;
}
// query
$result = $conn->prepare("SELECT VIS_NOM, VIS_MDP FROM visiteur WHERE VIS_NOM= ? AND VIS_MDP= ?");
$result->bindParam(1, $user);
$result->bindParam(2, $password);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
header("location: menuCR.html");
}
else{
$errmsg_arr[] = 'identifiant et mot de passe non trouvés';
$errflag = true;
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: formAUTHENTIFICATION.html");
exit();
}
?>

