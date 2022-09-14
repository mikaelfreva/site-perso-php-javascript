<?php

session_start();
if (!isset($_SESSION['admin_logged']) or $_SESSION['admin_logged'] != true) {
    header('Location: auth.php');
}
include('../cnx.php');



if (isset($_GET['modifier'])) {
    $result = $bdd->prepare('SELECT * FROM t_carousel WHERE id_element = ? ');
    $result->execute(array(
        $_GET['modifier']
    ));
    $element = $result->fetch();
    $result_cat = $bdd->query('SELECT * FROM t_cat');




    if (isset($_POST['form_modifier'])) {


        if ($_POST['nom_element'] != NULL and $_POST['desc_element'] != NULL and $_POST['detail_element'] != NULL and $_POST['id_cat'] != NULL and $_POST['alt_element'] != NULL) {

            $result = $bdd->prepare('UPDATE t_carousel SET nom_element = ?, desc_element= ? , detail_element = ?, id_cat = ?, alt_element = ? WHERE id_element = ?');
            $result->execute(array(
                $_POST['nom_element'],
                $_POST['desc_element'],
                $_POST['detail_element'],
                $_POST['id_cat'],
                $_POST['alt_element'],
                $_POST['id_element'],
            ));
            header('Location:carousel.php');
        } else {
            $message = '<p>Veuillez remplir tous les champs</p>';
        }
    }
}

if (isset($_GET['supprimer'])) {
    $result = $bdd->prepare('SELECT * FROM t_carousel WHERE id_element = ? ');
    $result->execute(array(
        $_GET['supprimer']
    ));
    $element = $result->fetch();

    

    if (isset($_POST['form_supprimer'])) {
        $delete = $bdd->prepare('DELETE FROM t_carousel  WHERE id_element = ?');
        $delete->execute(array(
            $_POST['id_element']
        ));


        $src_element = 	'../asset/img/carousel/' . $_POST['id_element']  . '.jpg';
        if (file_exists($src_element)) {
            unlink($src_element);
        } 


        header('Location:carousel.php');




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
<?php
include('header.php');
?>



<body>
    <a href="carousel.php">Revenir à l'accueil</a>





    <?php
    if (isset($_GET['modifier'])) {
    ?>
        <h2>Modifier la photo</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_element" value="<?php echo $element['id_element'] ?>">
            <input type="text" name="nom_element" value="<?php echo $element['nom_element'] ?>"> <br>
            <input name="desc_element" value="<?php echo $element['desc_element'] ?>"></input> <br>
            <input name="detail_element" value="<?php echo $element['detail_element'] ?>"></input> <br>
            <select name="id_cat">
                <option value="">-- Classe</option>


                <?php
                while ($categorie = $result_cat->fetch()) {
                ?>
                    <option value="<?php echo $categorie['id_cat']; ?>" <?php if ($categorie['id_cat'] == $element['id_cat']) {
                                                                            echo 'selected';
                                                                        } ?>><?php echo $categorie['nom_cat']; ?></option>
                <?php
                }
                ?>



            </select> <br>
            <input type="file" name="image">

            <input type="text" name="alt_element" value="<?php echo $element['alt_element'] ?>"><br>
            <p class="alert"> Image au format JPG.</p> <br>
            <input type="submit" name="form_modifier" value="Modifier">
            <?php if (isset($message)) {
                echo $message;
            } ?>
        </form>

    <?php

    } elseif (isset($_GET['supprimer'])) {

        echo '<p>Supprimer : ' . $element['nom_element'] . ', ' . $element['desc_element'] . ', ' . $element['detail_element'] . '</p>'

    ?>
        <form action="" method="post">
            <input type="hidden" name="id_element" value="<?php echo $element['id_element'] ?>">
            <input type="submit" name="form_supprimer" value="Supprimer"> <br>
        </form>
        <a href="carousel.php">Non</a>
    <?php
    }
    ?>



</body>

</html>