<?php 
	//var_dump($_POST)
	session_start();
	if( !isset($_SESSION['admin_logged']) OR $_SESSION['admin_logged'] != true){
		header('Location: auth.php');
	}

	// var_dump( $_FILES );
	if ( isset( $_POST['ajouter'])) {  

		if( $_POST['nom_element'] != NULL AND $_POST['desc_element'] != NULL AND $_POST['detail_element'] != NULL AND $_POST['id_cat'] AND $_POST['alt_element'] ){

			include('../cnx.php');
			include('../asset/fonctions/functions.php');
			$result = $bdd->prepare('INSERT INTO t_carousel (nom_element, desc_element, detail_element, id_cat, alt_element ) VALUES (?,?,?,?,?)');
			$result->execute(array(
				$_POST['nom_element'],
				$_POST['desc_element'],
				$_POST['detail_element'],
                $_POST['id_cat'],
                $_POST['alt_element'],
			));


$temp = $_FILES['image']['tmp_name'];



			if( $_FILES['image']['type'] == 'image/jpeg' )
			{
				$id_element = $bdd->lastInsertId();
				$upload_jpg = '../asset/img/carousel/' . $id_element . '.jpg';

				move_uploaded_file($temp, $upload_jpg );
				//resizejpg($_FILES['image']['tmp_name'], '../asset/img/carousel/' . $id_element . '.jpg', 1200, 1200);
		
			}
			else if( $_FILES['image']['type'] == 'image/png' )
			{
				$id_element = $bdd->lastInsertId();
				$upload_png = '../asset/img/carousel/' . $id_element . '.png';

				move_uploaded_file($temp, $upload_png);
				//resizepng($_FILES['image']['tmp_name'], '../asset/img/carousel/' . $id_element . '.png', 1200, 1200);
		
			}

			header("Location: carousel.php");
die();
   
		}
		else {
				header('Location: ajout.php?erreur=1');
			}
	}
	

	else{
		header('Location: ajout.php');
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Insérer un article</title>
	<meta name="description" content="Insérer un article">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="admin">

	<?php 
		include('header.php');
	?>



	<div class="row page_accueil">
		<div class="container">
        <div class="ajout">
      
        <?php 

			if ($result->rowCount() == 1){
				echo '<h2>Votre article à bien été ajouté</h2>';
			}
			else {
				echo '<h2>Une erreur s\'est produite</h2>';
			} 
			?>
			<p><a href="carousel.php">Retour</a></p>
        </div>  
    </div>
	</div>

</body>
</html>