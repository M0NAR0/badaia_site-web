<?php

require_once('models/m_BDDConnexion.php');

//Ajout d'un nouveau Commentaire dont les valeurs sont passés en paramètres
function setAjoutCommentaire($idUtilisateur, $idAnnonce, $titre, $contenu, $note)
{
	$today = date("Y-n-j"); //2018-11-27
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("INSERT INTO commentaire(ID_USER, ID_ANN, TITRE, CONTENU, NOTE, DATE_COMM) VALUES(?,?,?,?,?,?)");
	$req->execute(array($idUtilisateur, $idAnnonce, $titre, $contenu, $note, $today));
}

//Modification d'un commenataire dont les valeurs sont passées en paramètres
function updateCommentaire($titre, $contenu, $note, $idCommentaire)
{
	$today = date("Y-n-j"); //2018-11-27
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("UPDATE commentaire SET TITRE=?, CONTENU=?, NOTE=? DATE_COMM=? WHERE ID_COMM=?");
	$req->execute(array($titre, $contenu, $note, $today, $idCommentaire));
}

//Suppression d'un commentaire
function deleteCommentaire($idCommentaire)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("DELETE FROM commentaire WHERE ID_COMM=?");
	$req->execute(array($idCommentaire));
}

//Retourne l'ensemble des commentaires d'une annonce
function getLesCommentaires($idAnnonce)
{
	$connexion = BDDConnexionPDO();
	$lesAnnonces = $connexion->query("SELECT TITRE, CONTENU, NOTE, DATE_COMM FROM commentaire WHERE ID_ANN = ".$idAnnonce);
	$tabAnnonces = $lesAnnonces->fetchAll();
	$connexion = null;
	return $tabAnnonces;
}

//Retourne une annonce en fonction de son identifiant
function getUnCommentaire($idCommentaire)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT * FROM commentaire WHERE ID_COMM = ?");
	$req->execute(array($idCommentaire));
	$uneAnnonce=$req->fetch(PDO::FETCH_OBJ);
	$connexion = null;
	return $uneAnnonce;
}

//Affiche les avis d'une annonce
function echoLesAvis($idAnnonce)
{
	$avis = 0;
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT ID_COMM, TITRE, CONTENU, NOTE, DATE_COMM, NOM, PRENOM, MAIL FROM commentaire INNER JOIN utilisateur ON utilisateur.ID_USER = commentaire.ID_USER WHERE ID_ANN = ".$idAnnonce);
	while ($unCommentaire = $req->fetch()) {
		echo "<div class=\"row\">
						<div class=\"col-sm-3\">
							<img src=\"http://dummyimage.com/60x60/666/ffffff&text=No+Image\" class=\"img-rounded\">";
		
		echo "				<div class=\"review-block-name\"><a href=\"#\">".$unCommentaire['NOM']." ".$unCommentaire['PRENOM']."</a></div>
							<div class=\"review-block-date\">".$unCommentaire['DATE_COMM']."</div>
						</div>
						<div class=\"col-sm-9\">
							<div class=\"review-block-rate\">";
		while ($avis < $unCommentaire['NOTE']) {
			echo "<i class=\"fas fa-star colorStar\"></i>";
			$avis++;
		}
		if (isset($_SESSION['mail']) && $_SESSION['mail'] == $unCommentaire['MAIL']) {
			echo "<form method=\"POST\" action=\"index.php?c=annonce&id=".$idAnnonce."\">
			<button type=\"submit\" name=\"deleteComm\" value=\"".$unCommentaire['ID_COMM']."\" class=\"btn btn-danger\" style=\" float: right;\"><i class=\"fas fa-trash-alt\"></i></button>
			</form>";
		}
		/*if (isset($_POST['deleteComm'])) {
			deleteCommentaire($unCommentaire['ID_COMM']);
		}*/
		$avis = 0;	//Remise à zéro de l'avis pour les avis à suivre							
		echo "					</div>
							<div class=\"review-block-title\">".$unCommentaire['TITRE']."</div>
							<div class=\"review-block-description\">".$unCommentaire['CONTENU']."</div>
						</div>
					</div>
					<hr/>";
	}
}

?>