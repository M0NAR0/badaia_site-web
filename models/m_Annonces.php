<?php 

require_once('models/m_BDDConnexion.php');

//Ajout d'un nouvelle Annonce dont les valeurs sont passés en paramètres
function setAjoutAnnonce($idType, $idUser, $titre, $prix, $nbPlace, $description, $ville, $adresse, $image)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("INSERT INTO annonce(ID_TYPE, ID_USER, TITRE, PRIX, NBPLACE, DESCRIPTION, VILLE, ADRESSE, IMAGE) VALUES(?,?,?,?,?,?,?,?,?)");
	$req->execute(array($idType, $idUser, $titre, $prix, $nbPlace, $description, $ville, $adresse, $image));
}

//Modification d'une Annonce dont les valeurs sont passés en paramètres
function updateAnnonce($idType, $titre, $prix, $nbPlace, $description, $ville, $adresse, $image, $idAnnonce)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("UPDATE annonce SET ID_TYPE=?, TITRE=?, PRIX=?, NBPLACE=?, DESCRIPTION=?, VILLE=?, ADRESSE=?, IMAGE=? WHERE ID_ANN=?");
	$req->execute(array($idType, $titre, $prix, $nbPlace, $description, $ville, $adresse, $image, $idAnnonce));
}

//Suppression d'une Annonce
function deleteAnnonce($idAnnonce)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("DELETE FROM annonce WHERE ID_ANN = ");
	$req->execute(array($idAnnonce));
}

//Retourne l'ensemble des annonces
function getLesAnnonces()
{
	$connexion = BDDConnexionPDO();
	$lesAnnonces = $connexion->query("SELECT * FROM annonce");
	$tabAnnonces = $lesAnnonces->fetchAll();
	$connexion = null;
	return $tabAnnonces;
}

//Retourne une Annonce dont le numéro est en paramètre
function getUneAnnonce($idAnnonce)
{
	$connexion = BDDConnexionPDO();
	$req=$connexion->prepare("SELECT * FROM annonce WHERE ID_ANN = ?");
	$req->execute(array($idAnnonce));
	$uneAnnonce=$req->fetch(PDO::FETCH_OBJ);
	$connexion = null;
	return $uneAnnonce;
}

//Vérifie si le fichier envoyé est valide
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
{
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}
//Exemple : $upload1 = upload('icone','uploads/monicone1',15360, array('png','gif','jpg','jpeg') );

//Affiche la liste de toutes les annonces de manière design (page d'accueil)
function echoAnnonces(){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT ID_ANN, TITRE, PRIX, VILLE FROM annonce ORDER BY ID_ANN DESC LIMIT 9");
	while ($uneAnnonce = $req->fetch()) {
		echo "<div class=\"col-md-4\">
				<a href=\"index.php?c=annonce&id=".$uneAnnonce['ID_ANN']."\">
				<figure class=\"effect-marley\">
					<img src=\"public/img/9.jpg\" alt=\"\" class=\"img-responsive\"/>
					<figcaption>
						<h4>".$uneAnnonce['TITRE']." - ".$uneAnnonce['VILLE']."</h4>
						<p>".$uneAnnonce['PRIX']." € / nuit</p>				
					</figcaption>			
				</figure>
				</a>
			</div>";
	}
}

//Affiche la liste des annonces d'un utilisateur(identifiant)
function echoAnnoncesUser($idUser){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT ID_ANN, TITRE, PRIX, VILLE FROM annonce WHERE ID_USER = ".$idUser);
	while ($uneAnnonce = $req->fetch()) {
		echo "<li><a href=\"index.php?c=annonce&id=".$uneAnnonce['ID_ANN']."\">".$uneAnnonce['TITRE']." | ".$uneAnnonce['VILLE']." | ".$uneAnnonce['PRIX']." € </a></li>";
	}
}

//Affiche la liste des annonces en attente de validation par l'utilisateur propriétaire
function echoAnnoncesReservEnAtt($idUser){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT annonce.ID_ANN, annonce.TITRE, annonce.PRIX, annonce.VILLE, reservation.ID_RES FROM annonce 
														INNER JOIN reservation ON annonce.ID_ANN = reservation.ID_ANN
														WHERE annonce.ID_USER = ".$idUser." AND reservation.STATUS_RES = \"en attente\"");
	while ($uneAnnonce = $req->fetch()) {
		echo "<li><a href=\"index.php?c=reservResponder&id=".$uneAnnonce['ID_RES']."\">".$uneAnnonce['TITRE']." | ".$uneAnnonce['VILLE']." | ".$uneAnnonce['PRIX']." € </a></li>";
	}
}

//Affiche les informations relatives à l'annonce(identifiant)
function echoAnnonceInfos($idAnnonce){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT TITRE, PRIX, NBPLACE, DESCRIPTION, VILLE, ADRESSE, utilisateur.PRENOM, utilisateur.NOM, type_logement.LBL_TYPE FROM annonce INNER JOIN utilisateur ON utilisateur.ID_USER = annonce.ID_USER INNER JOIN type_logement ON type_logement.ID_TYPE = annonce.ID_TYPE WHERE ID_ANN = ".$idAnnonce);
	while ($uneAnnonce = $req->fetch()) {
		echo "<ul>
				<li><u>Auteur :</u> ".$uneAnnonce['NOM']." ".$uneAnnonce['PRENOM']."</li>
				<li><u>Titre :</u> ".$uneAnnonce['TITRE']."</li>
				<li><u>Prix :</u> ".$uneAnnonce['PRIX']." €/pers</li>
				<li><u>Nombre de place(s) :</u> ".$uneAnnonce['NBPLACE']."</li>
				<li><u>Type de logement :</u> ".$uneAnnonce['LBL_TYPE']."</li>
				<li><u>Adresse :</u> ".$uneAnnonce['ADRESSE']."</li>
				<li><u>Ville :</u> ".$uneAnnonce['VILLE']."</li>
				<li><u>Description :</u> ".$uneAnnonce['DESCRIPTION']."</li>
			</ul>";
	}
}

//Retourne si l'annonce placée en paramètre 2 appartient à l'utilisateur placé en paramètre 1
function isUserAnnonce($idUser, $idAnnonce){
	$connexion = BDDConnexionPDO();
	$req = $connexion->query("SELECT ID_USER FROM annonce WHERE ID_ANN = ".$idAnnonce." AND ID_USER = ".$idUser);
	$result = ($req->fetchAll()) ? true : false;
	return $result;
}

//Fonction de recherche
function search()
{
  if (isset($_POST["searchBtn"])) {
    //On se connecte à la BDD
    $connexion = BDDConnexionPDO();
		//On cherche dans la BDD l'utilisateur qui a l'username et le mdp correspondant (existants en BDD)
    $query = "SELECT * FROM annonce
              WHERE annonce.TITRE LIKE :element
              OR annonce.VILLE LIKE :element
              OR annonce.DESCRIPTION LIKE :element";
		if(!empty($_POST['nbrPers'])) {
			$query = $query." AND annonce.NBPLACE >= ".$_POST['nbrPers'];
		}
		if(!empty($_POST['typeLogement'])) {
			$query = $query." AND annonce.ID_TYPE = ".$_POST['typeLogement'];
		}
		$query = $query." ORDER BY annonce.PRIX ASC";
    //On prépare la requête
    $statement = $connexion->prepare($query);
    //On execute la requête
    $statement->execute(
      //On assigne les valeurs que l'on envoie aux critères de sélection dans la requête
      array(
        'element' => "%".$_POST["recherche"]."%"
      )
    );
    //On compte le nombre de lignes renvoyées
    $count = $statement->rowCount();
    //Si la requête revoie au moins une ligne
    if ($count > 0) {
			var_dump($_POST);
			var_dump($query);
      //Tant qu'il y  a des données
      while ($uneAnnonce = $statement->fetch()) {
        echo "<div class=\"col-md-4\">
				<a href=\"index.php?c=annonce&id=".$uneAnnonce['ID_ANN']."\">
				<figure class=\"effect-marley\">
					<img src=\"public/img/9.jpg\" alt=\"\" class=\"img-responsive\"/>
					<figcaption>
						<h4>".$uneAnnonce['TITRE']." - ".$uneAnnonce['VILLE']."</h4>
						<p>".$uneAnnonce['PRIX']." € / nuit | ".$uneAnnonce['NBPLACE']." pers</p>
					</figcaption>
				</figure>
				</a>
			</div>";
      }
    }
    //Sinon
    else {
      //On affiche un message car il n'y a pas de données correspondantes
      echo "<span>Aucun résultat ne correspond à votre recherche : \"<strong>".$_POST["recherche"]."</strong>\"</span>";
    }
  }
}
?>