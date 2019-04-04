<?php

require_once('models/m_Utilisateur.php');

// INSCRIPTION
if (isset($_POST['name']) && isset($_POST['pname']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['pays'])) 
{
	if ($_POST['mdp'] == $_POST['mdp2']) 
	{
		setAjoutUtilisateur($_POST['name'], $_POST['pname'], $_POST['mdp'], $_POST['mail'], $_POST['tel'], $_POST['pays']);
		header('Location: index.php?c=accueil');
	} else {
		header('Location: index.php?c=register');
	}
} else {
	header('Location: index.php?c=register');
}

?>