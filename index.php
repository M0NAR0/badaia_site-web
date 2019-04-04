<?php session_start(); ?>
<?php //require_once('models/m_Commentaire.php'); ?>
<html>

	<?php include('views/v_head.php'); ?>

	<body>
		<?php 
		if (isset($_REQUEST['c'])) {
			switch ($_REQUEST['c']) {
				case 'test':
					include 'views/v_test.php';break;
				case 'accueil':			//Page d'accueil
					include 'views/v_Accueil.php';break;
				case 'annonce': 		//Une Annonce
					if (isset($_REQUEST['id'])) {
						/*if(isset($_REQUEST['deleteComm'])){
							deleteCommentaire($_REQUEST['deleteComm']);
						}*/
						include ('views/v_Annonce.php');
					}
					break;
				case 'connexion': 		//Page de connexion
					include 'views/v_Connexion.php';break;
				case 'deconnexion': 	//Déconnexion
					session_destroy();
					header('Location: index.php?c=accueil');
					break;
				case 'newAnnonce':		//Nouvelle annonce
					include 'views/v_newAnnonce.php';break;
				case 'profile':			//Page de profil
					include 'views/v_Profile.php'; break;
				case 'register': 		//Page d'inscription
					include 'views/v_Register.php';break;
				case 'registration': 	//Validation d'inscription
					include 'controlers/c_Inscription.php';break;
				case 'reserver':
					if (isset($_REQUEST['id'])) {include ('views/v_Reservation.php');}break;
				case 'reservResponder':
					if (isset($_REQUEST['id'])) {
						if(isset($_REQUEST['response'])) {
							include ('controlers/c_ReservationResponse.php');
						} else {
							include ('views/v_ReservResponder.php');
						}
					}
					break;
				case 'searchPage':		//Page de recherche
					include 'views/v_Search.php'; break;
				case 'tryConnexion': 	//Validation de connexion
					include 'controlers/c_Connexion.php';break;
				case 'tryNewAnnonce':	//Validation Nouvelle Annonce
					include 'controlers/c_newAnnonce.php';break;
				case 'tryNewComment':
					include 'controlers/c_newCommentaire.php';break;
				case 'tryReservation':
					include 'controlers/c_Reservation.php';break;
				case 'reservationSend':
					include 'views/v_ValideReservSend.php';break;
				default:
					include 'views/v_Erreur.php';break;
			}
		} else {
			header("Location: index.php?c=accueil");
		}

		?>
	</body>
</html>