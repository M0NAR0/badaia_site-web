<?php 
include('models/m_Annonces.php'); 
include('models/m_Commentaire.php');
?>

<html lang="fr">

<?php include('views/v_head.php'); ?>

<body>

	<?php include('views/v_header.php'); ?>

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<?php echoAnnonceInfos($_GET['id']); ?>
			</div>
			<div class="col-md-3">
				<?php 
				if (isset($_SESSION['id'])) 
				{
					if(!isUserAnnonce($_SESSION['id'], $_GET['id'])){
						echo "<form method=\"POST\" action=\"index.php?c=reserver&id=".$_GET['id']."\"><button class=\"btn btn-danger\" value=\"reserver\">Réserver</button></form>";
					}
				} else {
					echo "<form method=\"POST\" action=\"index.php?c=connexion\"><button class=\"btn btn-danger\" value=\"connexion\">Réserver</button></form>";
				}
				?>
				
			</div>
		</div>
		<hr/>
	</div>

	<div class="container">	
		<div class="row">
			<div class="col-sm-9">
				<div class="rating-block">
					<form method="POST" action="index.php?c=tryNewComment">
						<h4>Note :</h4>
						<fieldset class="rating">
							<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excellent">5 stars</label>
							<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Bien">4 stars</label>
							<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Moyen">3 stars</label>
							<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Mauvais">2 stars</label>
							<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Nul">1 star</label>
						</fieldset>
						<br/><br/>
						<h4>Titre :</h4>
						<input type="text" class="form-control" name="titleComment" required="required"></input>
						<br/>
						<h4>Commentaire(s) :</h4>
						<textarea class="form-control" name="contentComment"></textarea>
						<br/>
						<button type="submit" class="btn btn-success" name="idAnnonce" <?php echo "value=\"".$_GET['id']."\""; ?>>Envoyer</button>
					</form>
				</div>
			</div>
			<div class="col-sm-3">
				<h4>Score</h4>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <i class="fas fa-star colorStar"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
								<span class="sr-only">80% Complete (danger)</span>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">1</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <i class="fas fa-star colorStar"></i></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
							<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
								<span class="sr-only">80% Complete (danger)</span>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">1</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <i class="fas fa-star colorStar"></i></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
							<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
								<span class="sr-only">80% Complete (danger)</span>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <i class="fas fa-star colorStar"></i></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
								<span class="sr-only">80% Complete (danger)</span>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <i class="fas fa-star colorStar"></i></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
							<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
								<span class="sr-only">80% Complete (danger)</span>
							</div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
			</div>			
		</div>			
		
		<div class="row">
			<div class="col-sm-12">
				<hr/>
				<h3>Avis :</h3>
				<div class="review-block">
					<?php echoLesAvis($_GET['id']); ?>
				</div>
			</div>
		</div>
		
	</div> <!-- /container -->

	<?php include('views/v_footer.php'); ?>

</body>
</html>