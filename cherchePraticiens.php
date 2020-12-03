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
$numPraticien = $_POST["pratNum"];
$result = $conn->prepare("SELECT * FROM praticien JOIN type_praticien ON praticien.typ_code = type_praticien.typ_code JOIN affectation ON praticien.pra_code = affectation.pra_code JOIN cabinet ON affectation.cab_code = cabinet.cab_code WHERE praticien.PRA_CODE = ?");
$result->bindParam(1, $numPraticien);
$result->execute();
$rows = $result->fetch(PDO::FETCH_NUM);
if($rows > 0) {
	echo '
		<label class="titre">NUMERO :</label><label size="5" name="PRA_NUM" class="zone" >'.$rows[0].'</label>
		<label class="titre">NOM :</label><label size="25" name="PRA_NOM" class="zone" >'.$rows[1].'</label>
		<label class="titre">PRENOM :</label><label size="30" name="PRA_PRENOM" class="zone" >'.$rows[2].'</label>
		<label class="titre">ADRESSE :</label><label size="50" name="PRA_ADRESSE" class="zone" >'.$rows[11].'</label>
		<label class="titre">CP :</label><label size="5" name="PRA_CP" class="zone" >'.$rows[12].' '.$rows[13].'</label>
		<label class="titre">COEFF. NOTORIETE :</label><label size="7" name="PRA_COEFNOTORIETE" class="zone" >'.$rows[3].'</label>
		<label class="titre">TYPE :</label><label size="3" name="TYP_CODE" class="zone" >'.$rows[6].'</label>
		<label class="titre">&nbsp;</label><div class="zone"><input type="button" value="<" onClick="precedent();"></input><input type="button" value=">" onClick="suivant();"></input>
		';
}
if($errflag) {
$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
session_write_close();
header("location: formPRATICIEN.htm");
exit();
}
?>