<?php


session_start();
if (!isset($_SESSION['admin_logged']) or $_SESSION['admin_logged'] != true) {
    header('Location: auth.php');
}
include('../cnx.php');

$result = $bdd->query('SELECT * FROM t_carousel  ORDER BY id_element  ASC ');




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



    <div class="">
        <h1>Bienvenu Mika</h1>
    </div>


    <table>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Desc</th>
            <th>Catégorie</th>
            <th>Image</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>


        <?php while ($carou = $result->fetch()) {

            $id = $carou['id_element'];
           
            $categorie = $bdd->prepare('SELECT * FROM t_cat INNER JOIN t_carousel ON t_cat.id_cat = t_carousel.id_cat WHERE t_carousel.id_cat = ?');
            $categorie->execute(array(
                $carou['id_cat']
            ));

            $cat = $categorie->fetch();


        ?>
            <tr>

                <td><?php echo $carou['nom_element'] ?></td>
                <td><?php echo $carou['desc_element'] ?></td>
                <td><?php echo $carou['detail_element'] ?></td>

                <td><?php echo $cat['nom_cat'];?></td>


                

                <?php
               
                if (file_exists('../asset/img/carousel/' . $carou['id_element'] . '.jpg')) {
                    $src_image = $carou['id_element'];
                    $ext = '.jpg';
                } 
                else if(file_exists('../asset/img/carousel/' . $carou['id_element'] . '.png')){
                    $src_image = $carou['id_element'];
                    $ext = '.png';
                }
                else {
                    $src_image = "photo-vide";
                    $ext = '.jpg';
                }
                ?>


                <td><img src="../asset/img/carousel/<?php echo $src_image . $ext ?>" width="100" alt=""></td>
                <td><a href='carousel_conf.php?modifier=<?php echo $id ?>'>Modifier</a></td>
                <td><a href="carousel_conf.php?supprimer=<?php echo $id ?>">Supprimer</a></td>

            </tr>
        <?php
        } ?>



    </table>

    <?php



    ?>



</body>

</html>