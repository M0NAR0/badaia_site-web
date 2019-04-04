<?php $path = "index.php?c=reservResponder&id=".$_GET['id']."&response="; ?>
<?php include('models/m_Reservation.php'); ?>

<html lang="fr">

<?php include('views/v_head.php'); ?>

<body>	

	<?php include('views/v_header.php'); ?>

	<div class="container">
		<h1>Une demande de réservation vous a été envoyée</h1>
        <h3>Informations :</h3>
		<?php getReservationAskInfo($_GET['id']); ?>
        <a href="<?php echo($path."true"); ?>" class="btn btn-success"><i class="far fa-check-circle"></i> Valider</a>
        <a href="<?php echo($path."false"); ?>" class="btn btn-danger"><i class="far fa-times-circle"></i> Refuser</a>
	</div>

	<?php include('views/v_footer.php'); ?>

</body>
</html>