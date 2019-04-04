<header id="header">
    <nav class="navbar navbar-default navbar-static-top" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand">
                    <a href="index.php?c=accueil">
                        <h1>BADAIA</h1>
                    </a>
                </div>
            </div>
            <div class="navbar-collapse collapse">
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="index.php?c=searchPage"><i class="fas fa-search"></i> Rechercher</a></li>
                        <?php
						if (!isset($_SESSION['mail'])) {
							echo "<li role=\"presentation\"><a href=\"index.php?c=register\"><i class=\"fas fa-user-plus\"></i> S'inscrire</a></li>";
							echo "<li role=\"presentation\"><a href=\"index.php?c=connexion\"><i class=\"fas fa-sign-in-alt\"></i> Connexion</a></li>";
						} else {
							if (isset($_SESSION['est_hote']) && $_SESSION['est_hote'] == 0) {
								echo "<li role=\"presentation\"><a href=\"index.php?c=newAnnonce\"><i class=\"fas fa-home\"></i> Devenir hôte</a></li>";
							} else {
								echo "<li role=\"presentation\"><a href=\"index.php?c=newAnnonce\"><i class=\"fas fa-home\"></i> Nouvelle annonce</a></li>";
							}

							echo "<li role=\"presentation\"><a href=\"index.php?c=profile\"><i class=\"fas fa-user\"></i> Mon profil</a></li>";
							echo "<li role=\"presentation\"><a href=\"index.php?c=deconnexion\"><i class=\"fas fa-times-circle\"></i> Déconnexion</a></li>";
						}
						?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.container-->
    </nav>
    <!--/nav-->
</header>
<!--/header--> 