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
$matricule = $_POST['mat'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$codePostal = $_POST['cpostal'];
$ville = $_POST['ville'];
$dateEmbauche = $_POST['dateEmb'];
switch ($_POST['codesec']) {
	case 'E':
		$secteurCode = 'E';
		break;

	case 'N':
		$secteurCode = 'N';
		break;

	case 'O':
		$secteurCode = 'O';
		break;	
	
	case 'P':
		$secteurCode = 'P';
		break;

	case 'S':
		$secteurCode = 'S';
		break;	
				
	default:
		$secteurCode = NULL;
		break;
}
switch ($_POST['labcode']) {
	case 'BC':
		$laboCode = 'BC';
		break;
	
	case 'GY':
		$laboCode = 'GY';
		break;

	case 'SW':
		$laboCode = 'SW';
		break;

	default:
		$laboCode = NULL;
		break;
}
$deptCode = $_POST['depcode'];
$mdp = $_POST['mdp'];
$cf_mdp = $_POST['cf_mdp'];
$grainsel = rand(1, 9999999999);


if (empty($nom)) {
	$errmsg_arr[] = 'Vous devez mettre votre nom.';
	$errflag = true;
}
if(empty($mdp)) {
	$errmsg_arr[] = 'Vous devez mettre votre mot de passe.';
	$errflag = true;
}
if ($mdp != $cf_mdp) {
	$errmsg_arr[] = 'Veuillez confirmer correctement votre mot de passe.';
	$errflag = true;
}

// préparation de la requête SQL
$result = $conn->prepare("INSERT INTO visiteur VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$result->bindParam(1, $matricule);
$result->bindParam(2, $nom);
$result->bindParam(3, $prenom);
$result->bindParam(4, $adresse);
$result->bindParam(5, $codePostal);
$result->bindParam(6, $ville);
$result->bindParam(7, $dateEmbauche);
$result->bindParam(8, $secteurCode);
$result->bindParam(9, $laboCode);
$result->bindParam(10, $deptCode);
$result->bindParam(11, $mdp);
$result->bindParam(12, $grainsel);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
header("location: formAUTHENTIFICATION.html");
}
else{
$errmsg_arr[] = 'veuillez vérifier les informations entrées.';
$errflag = true;
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: formINSCRIPTION.html");
exit();
}
?>