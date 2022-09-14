<?php

session_start();
if (!isset($_SESSION['admin_logged']) or $_SESSION['admin_logged'] != true) {
    header('Location: auth.php');
}
include('../cnx.php');

$result = $bdd->query('SELECT * FROM t_carousel  ORDER BY id_element  ASC ');
$element = $result->fetch();


$categorie = $bdd->query('SELECT * FROM t_cat  ORDER BY id_cat  ASC ');


if (isset($_POST['ajout_cat'])) {
    if ($_POST['nom_cat'] != NULL) {
        $result = $bdd->prepare('INSERT INTO t_cat (nom_cat ) VALUES (?)');
        $result->execute(array(
            $_POST['nom_cat'],
        ));
        echo("<meta http-equiv='refresh' content='1'>");
    }
}

?>




<!DOCTYPE html>
<html lang="en">

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
        <input type="text" name="nom_cat" placeholder="Nom de la catégorie">
        <input type="submit" value="Envoyer" name="ajout_cat">
    </form>
    </div>

    <br>

    <table>
        <tr>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        <?php while ($cat = $categorie->fetch()) {
        ?>
            <tr>
                <th><?php echo $cat['nom_cat'] ?></th>
                <th><a href="categorie_modifier.php?modifier='<?php ?>'">Modifier</a> </th>
                <th><a href="categorie_modifier.php?supprimer='<?php ?>'">Supprimer</a> </th>
            </tr>
        <?php
        } ?>
    </table>

</body>

</html>