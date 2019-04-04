<?php

require_once('models/m_BDDConnexion.php');

if (!empty($_POST['mail']) && !empty($_POST['mdp'])) {
	$connexion = BDDConnexionPDO();
    $req = $connexion->prepare('SELECT ID_USER, NOM, PRENOM, TEL, PAYS, EST_HOTE FROM utilisateur WHERE MAIL = :mail AND MDP = :mdp');
    $req->execute(array('mail' => $_POST['mail'],'mdp' => sha1($_POST['mdp'])));
    $resultat = $req->fetch();
    if (!$resultat) {
        echo '<h1>Vos identifiants sont incorrects !</h1>
                <form method="POST" action="index.php?c=connexion">
                    <button type="submit" class="btn btn-primary">Retour</button>
                </form>';
    }
    else {
        $_SESSION['id'] = $resultat['ID_USER'];
        $_SESSION['nom'] = $resultat['NOM'];
        $_SESSION['prenom'] = $resultat['PRENOM'];
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['tel'] = $resultat['TEL'];
        $_SESSION['pays'] = $resultat['PAYS'];
        $_SESSION['est_hote'] = $resultat['EST_HOTE'];
        header('Location: index.php?c=accueil');
    }
} else {
    echo '<div>Veuillez remplir tous les champs !</div>';
}

?>