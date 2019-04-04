<?php include('models/m_Reservation.php'); ?>

<html lang="fr">

<?php include('views/v_head.php'); ?>

<body>

    <?php include('views/v_header.php'); ?>

    <div class="container">
        <?php var_dump($_POST); ?>
        <form action="index.php?c=test" method="post">
            <div class="form-group">
                <label style="color: grey;">Image 1</label>
                <!-- <input type="hidden" name="MAX_FILE_SIZE" value="500000"> -->
                <input type="file" name="img1" id="img1" class="form-control">
                <button class="btn btn-success" type="submit">Envoyer</button>
            </div>
        </form>
    </div>

    <?php include('views/v_footer.php'); ?>

</body>

</html> 