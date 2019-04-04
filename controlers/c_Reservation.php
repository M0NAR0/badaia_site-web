<?php

require_once('models/m_Reservation.php');

//RESERVATION
//On vérifie que les champs sont bien remplis
if (isset($_POST['dateDeb']) && isset($_POST['dateFin']) && isset($_POST['nbrPers']) && isset($_POST['idAnnonce'])) {
	setAjoutReservation($_POST['idAnnonce'], $_SESSION['id'], $_POST['dateDeb'], $_POST['dateFin'], $_POST['nbrPers']);
}
header('Location: index.php?c=reservationSend');

?>