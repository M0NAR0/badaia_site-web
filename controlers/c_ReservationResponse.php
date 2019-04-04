<?php

require_once('models/m_Reservation.php');

//RESERVATION
//On vérifie que les champs sont bien remplis
if ( isset( $_GET['response'] ) ) {
    if ( $_GET['response'] == 'true' ) {
        setReservationEtat($_GET['id'], true);
    } else if ( $_GET['response'] == 'false' ) {
        setReservationEtat($_GET['id'], false);
    }
}

header('Location: index.php?c=profile');

?>