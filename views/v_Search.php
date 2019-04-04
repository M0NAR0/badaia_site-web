<?php 
include('models/m_TypeLogement.php');
include('models/m_Annonces.php');
include('views/v_head.php');
?>

<body>

    <?php include('views/v_header.php'); ?>

    <!-- contenu de la page-->
    <section>
        <div class="container">
            <div class="text-center">
                <h2>Recherche</h2>
            </div>
            <div class="row contact-wrap">
                <form method="POST" action="index.php?c=searchPage">
                    <div class="row">
                        <div class="col-md-7">
                            <label for="recherche">Recherche : </label>
                            <input type="text" name="recherche" id="recherche" class="form-control" placeholder="Recherche..."></span>
                        </div>
                        <div class="col-md-2">
                            <label for="nbrPers">Nombre de personnes : </label>
                            <input type="number" class="form-control" name="nbrPers" id="nbrPers" placeholder="Ex: 3">
                        </div>
                        <div class="col-md-2">
                            <label for="typeLogement">Type de logement</label>
                            <select name="typeLogement" class="form-control">
                                <option selected value="">...</option>
                                <?php getListTypeLogement(); ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="searchBtn" class="btn btn-primary btn-lg"><i class="fa fa-search"></i> Recherche</button>
                </form>
            </div>
            <div class="gallery">
                <?php search(); ?>
            </div>
        </div>
    </section>
    <!--fin contenu de la page-->
    <?php include('views/v_footer.php'); ?>

</body> 