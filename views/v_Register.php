<?php include('views/v_head.php'); ?>
<body>
<?php 
	include('views/v_header.php'); 
	require_once('models/m_Utilisateur.php');
?>
	<!-- contenue de la page-->

	<section>
		<div class="container">
			<div class="text-center">
				<h2>Inscription</h2>
			</div>
			<div class="row contact-wrap">
				<form method="POST" action="index.php?c=registration">
					<div class="col-sm-5 col-sm-offset-1">
						<div class="form-group">
							<label style="color: grey;">Nom</label>
							<input type="text" name="name" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Prenom</label>
							<input type="text" name="pname" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Mot de Passe</label>
							<input type="password" name="mdp" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Confirmer le Mot de passe</label>
							<input type="password" name="mdp2" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Mail</label>
							<input type="text" name="mail" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Telephone</label>
							<input type="text" name="tel" class="form-control" required="required">
						</div>
						<div class="form-group">
							<label style="color: grey;">Pays</label>
							<input type="text" name="pays" class="form-control" required="required">
						</div>
						<div class="form-group">
							<button type="submit" name="submit" class="btn btn-primary btn-lg">Envoyer</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!--fin contenue de la page-->
	<?php include('views/v_footer.php'); ?>
 </body>