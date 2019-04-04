<?php

require_once('models/m_Annonces.php');
require_once('models/m_Utilisateur.php');

// NOUVELLE ANNONCE
//On test si les champs sont remplis
if (isset($_POST['title']) && isset($_POST['typeLogement']) && isset($_POST['price']) && isset($_POST['nbPlace']) &&  isset($_POST['desc']) && isset($_POST['ville']) && isset($_POST['adresse']) && isset($_POST['villeProche'])) {

	//TODO
	if (isset($_FILES['img1'])) {
		$dossier = 'public/img/AnnoncesPictures';
		$fichier = basename($_FILES['img1']['name']);
		if (move_uploaded_file($_FILES['img1']['tmp_name'], $dossier . $fichier)) {
			header('Location: index.php?c=accueil');
		} else {
			header('Location: index.php?c=newAnnonce');
		}
	}

	//setAjoutAnnonce($idType, $idUser, $titre, $prix, $nbPlace, $description, $ville, $adresse, $villePlusProche, $image1, $image2, $image3, $image4, $image5);
	setAjoutAnnonce($_POST['typeLogement'], $_SESSION['id'], $_POST['title'], $_POST['price'], $_POST['nbPlace'], $_POST['desc'], $_POST['ville'], $_POST['adresse'], $_POST['villeProche'], $_POST['img1']);
	if ($_SESSION['est_hote'] == 0) {
		setUserHost($_SESSION['id']);
		$_SESSION['est_hote'] = 1;
	}

	header('Location: index.php?c=profile');
} else {
	header('Location: index.php?c=newAnnonce');
}

?>

<?php

/*$_FILES['img1']['name']     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
	$_FILES['img1']['type']     //Le type du fichier. Par exemple, cela peut être « image/png ».
	$_FILES['img1']['size']     //La taille du fichier en octets.
	$_FILES['img1']['tmp_name'] //L'adresse vers le fichier uploadé dans le répertoire temporaire.
	$_FILES['img1']['error']    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.*/
/*
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

//Ex
// upload('icone','uploads/monicone1',15360, array('png','gif','jpg','jpeg') );
*/
?> 