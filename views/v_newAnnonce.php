<?php 
include('models/m_TypeLogement.php');
include('views/v_head.php');
?>

<body>

    <?php include('views/v_header.php'); ?>

    <!-- contenu de la page-->
    <section>
        <div class="container">
            <div class="text-center">
                <h2>Nouvelle Annonce</h2>
            </div>
            <div class="row contact-wrap">
                <form method="POST" action="index.php?c=tryNewAnnonce" enctype="multipart/form-data">
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label style="color: grey;">Titre</label>
                            <input type="text" name="title" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Type de logement</label>
                            <select name="typeLogement" required="required" class="form-control">
                                <option selected>...</option>
                                <?php getListTypeLogement(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Prix/personne (en €)</label>
                            <input type="number" name="price" placeholder="0.00" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Nombre de place(s)</label>
                            <input type="number" name="nbPlace" placeholder="0" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Description</label>
                            <input type="text" name="desc" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Ville</label>
                            <input type="text" name="ville" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label style="color: grey;">Adresse</label>
                            <input type="text" name="adresse" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label style="color: grey;">Image 1</label>
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="500000"> -->
                            <input type="file" name="img1" id="img1" class="form-control">
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