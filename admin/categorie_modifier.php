<?php

session_start();
if (!isset($_SESSION['admin_logged']) or $_SESSION['admin_logged'] != true) {
    header('Location: auth.php');
}
include('../cnx.php');

$result = $bdd->query('SELECT * FROM t_carousel  ORDER BY id_element  ASC ');
$element = $result->fetch();


$categorie = $bdd->query('SELECT * FROM t_categorie  ORDER BY id_categorie  ASC ');


if (isset($_POST['ajout_cat'])) {
    if ($_POST['nom_categorie'] != NULL) {
        $result = $bdd->prepare('INSERT INTO t_categorie (nom_categorie ) VALUES (?)');
        $result->execute(array(
            $_POST['nom_categorie'],
        ));
        echo("<meta http-equiv='refresh' content='1'>");
    }
}

?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include('header.php');
    ?>

    <div>
        <form action="categorie.php" method="post">
        <input type="text" name="nom_categorie" placeholder="nom_categorie">
        <input type="submit" value="Envoyer" name="ajout_cat">
    </form>
    </div>


</body>

</html>