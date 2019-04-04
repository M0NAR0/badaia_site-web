<?php

require_once('models/m_BDDConnexion.php');

//Ajout d'une nouvelle Réservation dont les valeurs sont passées en paramètres
function setAjoutReservation($idAnn, $idUser, $dateDebut, $dateFin, $nbPers)
{
	$statusRes = "en attente";
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("INSERT INTO reservation(ID_ANN, ID_USER, DATE_DEB_RES, DATE_FIN_RES, NBPERS_RES, STATUS_RES) VALUES(?,?,?,?,?,?)");
	$req->execute(array($idAnn, $idUser, $dateDebut, $dateFin, $nbPers, $statusRes));
}

//Set l'état de la réservation(identifiant) à validé ou refusé
function setReservationEtat($idReservation, bool $etatBool) {
	if ($etatBool) {
		$etatStr = 'validé';
	} else {
		$etatStr = 'refusé';
	}
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("UPDATE reservation SET STATUS_RES = ? WHERE ID_RES = ?");
	$req->execute(array($etatStr, $idReservation));
}

//Supprime une réservation en fonction de son identifiant passé en paramètre
function deleteReservation($idReservation)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("DELETE reservation WHERE ID_RES = ?");
	$req->execute(array($idReservation));
}

//Retourne les réservations d'un utilisateur(identifiant)
function getReservationsUser($idUser) {
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT * FROM reservation 
							INNER JOIN annonce ON reservation.ID_ANN = annonce.ID_ANN
							WHERE annonce.ID_USER = ?");
	$req->execute(array($idUser));
}

//Affiche les informations relatives à une réservation(identifiant) sous forme de liste
function getReservationAskInfo($idReservation) {
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT * FROM reservation
							INNER JOIN annonce ON reservation.ID_ANN = annonce.ID_ANN
							INNER JOIN utilisateur ON reservation.ID_USER = utilisateur.ID_USER
							INNER JOIN type_logement ON annonce.ID_TYPE = type_logement.ID_TYPE
							WHERE ID_RES = ?");
	$req->execute(array($idReservation));
	while ($uneReservation = $req->fetch()) {
		echo "<ul>
				<li><u>Locataire :</u> ".$uneReservation['NOM']." ".$uneReservation['PRENOM']."</li>
				<li><u>Titre de l'annonce :</u> ".$uneReservation['TITRE']."</li>
				<li><u>Prix :</u> ".$uneReservation['PRIX']." €/pers soit ".$uneReservation['PRIX'] * $uneReservation['NBPERS_RES']." €</li>
				<li><u>Nombre de personnes :</u> ".$uneReservation['NBPERS_RES']."</li>
				<li><u>Type de logement :</u> ".$uneReservation['LBL_TYPE']."</li>
				<li><u>Adresse :</u> ".$uneReservation['ADRESSE']."</li>
				<li><u>Ville :</u> ".$uneReservation['VILLE']."</li>
				<li><u>Description :</u> ".$uneReservation['DESCRIPTION']."</li>
			</ul>";
	}
}

?>