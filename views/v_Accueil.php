<?php require_once('models/m_Annonces.php'); ?>

<html lang="fr">

<?php include('views/v_head.php'); ?>

<body>

    <?php include('views/v_header.php'); ?>

    <div class="slider">
        <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="public/img/2.jpg" class="img-responsive" style="width: 100%;" alt="">
                        <div class="carousel-caption">
                            <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
                                <h2><span>Bienvenue sur<br>BADAIA</span></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/#carousel-slider-->
        </div>
        <!--/#about-slider-->
    </div>
    <!--/#slider-->
    <div class="gallery">
        <div class="text-center">
            <h2>Nouveautés</h2>
            <p>Voici les annonces les plus récentes !</p>
        </div>
        <div class="container">
            <?php echoAnnonces(); ?>
        </div>
    </div>
    <hr />
    <div class="services">
        <div class="container">
            <div class="text-center">
                <h2>Les services que nous vous proposons</h2>
            </div>
            <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <i class="fa fa-user"></i>
                <h3>S'inscrire</h3>
                <p>Rejoignez la communauté BADAIA des Hôtes et des locataires en vous inscrivant tout simplement.</p>
            </div>
            <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <i class="fa fa-book"></i>
                <h3>Réserver</h3>
                <p>Un grand nombre d'annonces vous permettra de trouver votre bonheur.</p>
            </div>
            <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                <i class="fa fa-heart"></i>
                <h3>Commenter</h3>
                <p>Vous pouvez vous fier aux avis laissés par les anciens locataires ou vous pouvez vous même commenter votre séjour une fois terminé.</p>
            </div>
            <div class="col-md-3 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                <i class="fa fa-home"></i>
                <h3>Poster</h3>
                <p>Vous possédez un bien pouvant accueillir des locataires ? Rejoignez dès maintenant les Hôtes en postant à votre tour une annonce.</p>
            </div>
        </div>
    </div>

    <?php include('views/v_footer.php'); ?>

</body>

</html> 