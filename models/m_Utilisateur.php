<?php 

require_once('models/m_BDDConnexion.php');

//Ajout d'un nouvel Utilisateur dont les valeurs sont passés en paramètres (= INSCRIPTION)
function setAjoutUtilisateur($nom, $prenom, $mdp, $mail, $tel, $pays)
{
	$estHote = 0;
	$estAdmin = 0;
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("INSERT INTO utilisateur(NOM, PRENOM, MDP, MAIL, TEL, PAYS, EST_HOTE, EST_ADMIN) VALUES(?,?,?,?,?,?,?,?)");
	$req->execute(array(strtoupper($nom), $prenom, sha1($mdp), $mail, $tel, strtoupper($pays), $estHote, $estAdmin));
}

//L'utilisateur placé en paramètre devient un hôte
function setUserHost($id_user)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("UPDATE utilisateur SET EST_HOTE = 1 WHERE ID_USER = ?");
	$req->execute(array($id_user));
	$connexion = null;
	return $req;
}

//Modification des informations d'un utilisateur /*TODO*/
function alterUtilisateur()
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare(/*requete*/);
	$req->execute(array(/*variables dans requete*/));
	$connexion = null;
	return $req;
}

//Supprime un utilisateur
function deleteUtilisateur($id_user)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("DELETE utilisateur WHERE ID_USER = ?");
	$req->execute(array($id_user));
	$connexion = null;
	return $req;
}

//Affiche les données de l'utilisateur placé en paramètre
function getUtilisateurInfo($id_user)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT NOM, PRENOM, MAIL, TEL, PAYS FROM utilisateur WHERE ID_USER = ?");
	$req->execute(array($id_user));
	//Affichage
	$result = $req->fetch();
	echo "<ul>";
	echo "<li>".$result['NOM']." ".$result['PRENOM']."</li>";
	echo "<li> E-mail : ".$result['MAIL']."</li>";
	echo "<li> Tel : ".$result['TEL']."</li>";
	echo "<li> Pays : ".$result['PAYS']."</li>";
	echo "</ul>";
}

?>