<?php

require_once('models/m_BDDConnexion.php');

function getLesTypeLogement()
{
	$conn = BDDConnexionPDO();
	$lesAnnonces = $conn->query("SELECT * FROM type_logement");
	$tabAnnonces = $lesAnnonces->fetchAll();
	$connexion = null;
	return $tabAnnonces;
}

function getUnTypeLogement($idType)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT * FROM type_logement WHERE ID_TYPE = ?");
	$req->execute(array($idType));
	$uneAnnonce=$req->fetch(PDO::FETCH_OBJ);
	$connexion = null;
	return $uneAnnonce;
}

function getListTypeLogement(){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT ID_TYPE, LBL_TYPE FROM type_logement");
	while ($lesTypes = $req->fetch()) {
		echo "<option id=\"".$lesTypes['ID_TYPE']."\" value=\"".$lesTypes['ID_TYPE']."\">".$lesTypes['LBL_TYPE']."</option>";
	}
}

?>