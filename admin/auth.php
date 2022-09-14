<?php 


	session_start();
	include('../cnx.php');

	if( isset( $_POST['connexion'] ) ){
	
		$result = $bdd->prepare('SELECT * FROM t_admin WHERE mail_admin = ? AND mdp_admin = ?');
		$result->execute(array(
			$_POST['mail_admin'],
			md5($_POST['mdp_admin'] . '+!%')
		));
	
		if( $result->rowCount() == 1 ){
			$_SESSION['admin_logged'] = true;
			header('Location: carousel.php');
		}
		else{
			$message = '<h2 class="alert">Votre adresse ou votre mot de passe ne correspondent pas</h2>';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentification</title>
	<meta name="description" content="Authentification">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="admin">

<div class="stars"></div>
<div class="twinkling"></div>




<div class="row page_accueil">
	<div class="container tac">
		<form action="auth.php" method="POST">
			<input type="email" name="mail_admin" placeholder="Votre adresse mail"><br>
			<input type="password" name="mdp_admin" placeholder="Votre mot de passe"><br>
			<input type="submit" name="connexion" value="Se connecter">
		</form>
		<?php 
			if( isset( $message ) ){
				echo $message;
			}
		?>
	</div>
</div>



</body>
</html>