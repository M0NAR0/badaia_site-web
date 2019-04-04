<?php
include('models/m_Annonces.php');
include('views/v_head.php'); 
?>
<body>

	<?php include('views/v_header.php'); ?>

	<!-- contenu de la page-->
	<section>
		<div class="container">
			<div class="text-center">
				<h2>Réservation</h2>
			</div>
			<div class="row contact-wrap">
				<form method="POST" action="index.php?c=tryReservation">
					<div class="col-sm-5 col-sm-offset-1">
						<div class="form-group">
							<div class="form-group"> <!-- Date input -->
								<label class="control-label" for="dateDeb">Date de fin : </label>
								<input class="form-control" id="dateDeb" name="dateDeb" placeholder="AAAA-MM-JJ" type="text" required="required"/>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group"> <!-- Date input -->
								<label class="control-label" for="dateFin">Date de fin : </label>
								<input class="form-control" id="dateFin" name="dateFin" placeholder="AAAA-MM-JJ" type="text" required="required"/>
							</div>
						</div>

						<div class="form-group">
							<label>Nombre de personnes : </label>
							<input type="number" name="nbrPers" placeholder="0" class="form-control" required="required">
						</div>
						<button type="submit" class="btn btn-success" name="idAnnonce" <?php echo "value=\"".$_GET['id']."\""; ?>>Valider</button>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<?php echoAnnonceInfos($_GET['id']); ?>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!--fin contenue de la page-->
	<?php include('views/v_footer.php'); ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<script>
    $(document).ready(function(){
        var date_input=$('input[name="dateDeb"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
	</script>
	<script>
    $(document).ready(function(){
        var date_input=$('input[name="dateFin"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
	</script>
</body>