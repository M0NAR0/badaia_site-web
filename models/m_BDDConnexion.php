<?php 

function BDDConnexionPDO()
{
	$PARAM_hote='localhost';
	$PARAM_port='3306';
	$PARAM_nom_bd='2017-badaia_first';
	$PARAM_utilisateur='root';
	$PARAM_mot_passe='';

	try
	{
		$connexion = new PDO('mysql:host='.$PARAM_hote.'; dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
		$connexion->exec("SET CHARACTER SET utf8");
		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(Exception $e)
	{
		echo "Erreur : ".$e->getMessage()."<br />";
		echo "N° :".$e->getCode();
		die;
	}
	return $connexion;
}

?>