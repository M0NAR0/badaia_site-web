<?php

require_once('models/m_Commentaire.php');

// NOUVEAU COMMENTAIRE
//On test si les champs sont remplis
if (isset($_POST['rating']) && isset($_POST['titleComment']) && isset($_POST['contentComment'])) {
	setAjoutCommentaire($_SESSION['id'], $_POST['idAnnonce'], $_POST['titleComment'], $_POST['contentComment'], $_POST['rating']);
}
header('Location: index.php?c=annonce&id='.$_POST['idAnnonce']);

?>