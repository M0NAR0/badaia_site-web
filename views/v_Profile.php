<?php 
	include('models/m_Utilisateur.php');
	include('models/m_Annonces.php');
	include('views/v_head.php'); 
?>

<body>
	<?php include("views/v_header.php"); ?>
	<!-- contenu de la page -->
	<div class="container profile">
		<h1><?php echo $_SESSION['nom']." ".$_SESSION['prenom']; ?></h1>
		<p><u>N° Utilisateur :</u> "<?php echo $_SESSION['id']; ?>"</p>
		<div class="col-md-4">
			<hr/>
			<h3>Infos personnelles</h3>
			<hr/>
			<h4><u>Mail :</u> <?php echo $_SESSION['mail']; ?></h4>
			<h4><u>Tel :</u> <?php echo $_SESSION['tel']; ?></h4>
			<h4><u>Pays :</u> <?php echo $_SESSION['pays']; ?></h4>
			<h4><u>Statut :</u> <?php if ($_SESSION['est_hote'] == 0) {echo "Utilisateur";} else {echo "Hôte";} ?></h4>
		</div>
		<div class="col-md-4">
			<hr/>
			<h3>Mes annonces</h3>
			<hr/>
			<ul>
				<?php echoAnnoncesUser($_SESSION['id']); ?>
			</ul>
		</div>
		<div class="col-md-4">
			<hr/>
			<h3>Notifications</h3>
			<hr/>
			<ul>
				<?php echoAnnoncesReservEnAtt($_SESSION['id']); ?>
			</ul>
		</div>
	</div>

	<form method="POST"></form>

	<!--fin contenu de la page-->
	<?php include('views/v_footer.php'); ?> 
	
</body>