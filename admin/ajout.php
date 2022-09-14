<?php

session_start();
if (!isset($_SESSION['admin_logged']) or $_SESSION['admin_logged'] != true) {
    header('Location: auth.php');
}
include('../cnx.php');
$result_cat = $bdd->query('SELECT * FROM t_cat');
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div class="stars"></div>
    <div class="twinkling"></div>


    <div class="row form_accueil">
        <div class="container">
            <form action="conf_ajout.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="nom_element" placeholder="Titre dans le carousel"> <br>
                <textarea name="desc_element" placeholder="Description dans le carousel"></textarea> <br>
                <textarea name="detail_element" placeholder="Détails après avoir cliqué dessus"></textarea> <br>
                <select name="id_cat">
                    <option value="">-- Classe</option>
                    <?php
                    while ($categorie = $result_cat->fetch()) {
                    ?>
                        <option value="<?php echo $categorie['id_cat']; ?>"><?php echo $categorie['nom_cat']; ?></option>
                    <?php
                    }
                    ?>
                </select> <br>








                <input type="file" name="image">
                <input type="text" name="alt_element" placeholder="Alt pour image"><br>
                <p class="alert"> Image au format JPG.</p> <br>
                <input type="submit" name="ajouter" value="Ajouter">

            </form>
        </div>
    </div>





</body>

</html>