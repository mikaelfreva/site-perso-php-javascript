<?php 

include('cnx.php');
include('asset/fonctions/traitement_chaine.php');
$result = $bdd->query('SELECT * FROM t_carousel  ORDER BY RAND() ');

$skills = array(
	'Symfony / React ',
    'HTML / CSS ',
    'Javascript / jQuery ', 
	'PHP / MySQL / Ajax',
	'CMS',
	'Suite Adobe',
);

$pourcentage = array(
	'73%',
	'82%',
	'78%',
	'73%',
	'71%',
	'76%'
);
$couleur_skills_bar = array(
	'rgb(87, 7, 7)',
	'#00212b',
	'rgb(87, 7, 7)',
	'#00212b',
	'rgb(87, 7, 7)',
	'#00212b'
);
	
$delay_anim = array(
	'delay-1',
	'delay-2',
	'delay-3',
	'delay-4',
	'delay-5',
	'delay-6',
);


$carou1 = array( 'carousel_accueil_photo1', 'carousel_accueil_photo2', 'carousel_accueil_photo3');
$carou2 = array( 'Je suis', 'Créations de', ' ');
$carou3 = array( 'Mikael Freva', 'Site web', 'Cannes, Nice');
$carou4 = array( 'Développeur Web', 'Sur Mesure ou CMS', '');

$src = array( 'accueil1.jpg', 'accueil2.jpg', 'accueil3.jpg');
$alt = array( 'Image 1 du carousel de la page d\'accueil | Mikael Freva | Webdesigner & Developpeur Web Freelance a Cannes Le Cannet', 'Image 2 du carousel de la page d\'accueil | Mikael Freva | Webdesigner & Developpeur Web Freelance a Cannes Le Cannet', 'Image 3 du carousel de la page d\'accueil | Mikael Freva | Webdesigner & Developpeur Web Freelance a Cannes Le Cannet');




$scroll_lien = 'scroll_lien';
$href0 = '#scroll_div_accueil';
$href1 = '#scroll_div_apropos';
$href2 = '#scroll_div_services';
$href3 = '#scroll_div_portfolio';
$href4 = '#scroll_div_contact';

$result_cat = $bdd->query('SELECT * FROM t_cat ORDER BY nom_cat ASC');


$search  = array(' ', 'é');
						$replace = array('-', 'e');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mikael Freva | Developpeur Web & Webdesigner à Cannes</title>
    <meta name="description" content="Web designer & Developpeur Web Freelance à Cannes Le Cannet.  Sites web sur mesure ou CMS | Supports de communications en ligne ou imprimables"> 
	<?php include('meta.php'); ?>
</head>
<body class="body_accueil">

<?php include('header.php'); ?>
  



<a class="button"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-up" class="svg-inline--fa fa-arrow-up fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg></a>



<section id="scroll_div_accueil" class="carousel_accueil owl-carousel owl-theme ">

	
	<?php  for ($car = 0; $car < 3; $car++){ ?>
	 
		<div class="div_carousel_accueil ">
			<img src="asset/img/<?php echo $src[$car]; ?>" alt="<?php echo $alt[$car]; ?>">
			<div class="text_carousel_accueil">
				<h3><?php echo $carou2[$car]; ?></h3>
				<h2 class="gif_titre"><?php echo $carou3[$car]; ?></h2>
				<h3><?php echo $carou4[$car]; ?></h3>
			</div>
            <div class="mouse_body" >
                <div class="mouse_wheel"></div>
            </div>

		</div>

	<?php } ?>

</section>


<section class="row" id="scroll_div_apropos" >
	<div class="container">

        <p class="img_profil ftco-animate" data-animate-effect="fadeIn">
            <img src="asset/img/photoprofil.png" width="250" alt="Photo représentant Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet">
        </p>

		<!-- <div class="p50 ftco-animate" data-animate-effect="fadeIn">
		    <h1>Je suis <strong>développeur web</strong> et <strong>webdesigner.</strong> </h1>
			<div class="separateur">
				<p class="shadow"></p>
			</div>
		</div> -->

		<div class="row p_div_info ">
			<div class="ftco-animate" data-animate-effect="fadeInLeft">
				
				<div class="col-6 apropos">
				
                <div class="effet_type">
                    <p>Je m’appelle Mikaël Freva<span>,</span></p>
                    <p>je suis <span class="typewrite" data-period="2000" data-type='["web designer.", "développeur web." ]'>
                        <span class="type_border"></span></span></p>
                </div>

					<p>Je suis basé dans le sud à Cannes - Le cannet mais le web n'a pas de limites. Une connexion internet, un téléphone, une adresse mail est tout ce qu'il nous faut pour communiquer ! </p>

					<p>Dans ma vie antérieure j'étais dans le génie climatique, je suis passionné par le web et j'aime découvrir de nouveaux horizons que ce soit dans le design, le développement ou le motion design.</p>

					<p>Je suis un petit nouveau dans cet univers mais j'ai soif de connaissance, je ne peux m'arrêter de réfléchir tant que le problème n'est pas résolu.</p>

					<p>À vos côtés pour une prochaine aventure numérique ?</p>
				</div>
			</div>

			<div class=" ftco-animate" data-animate-effect="fadeInRight">
				<div class="col-6 skill">
				
					<div class=" div_skillbar" >

						<?php for ($nb = 0; $nb < 5; $nb++){ ?>
							
							<p><?php echo $skills[$nb] ?></p>
							<div class="skillbar" data-percent="<?php echo $pourcentage[$nb]; ?>">
								<div class="skillbar-bar" style="background:<?php echo $couleur_skills_bar[$nb]; ?>;"></div>
							</div> 

						<?php } ?>

					</div>
				</div>
			</div>
			<div class=" row margin_btn_contact">
				<p class="btn_contact color-8 scroll_btn_contact">
					<a href="">Me contacter</a>
				</p>
			</div>
		</div>
	</div>
</section>



<section id="scroll_div_services"> 
	
	<div class="parrallax_content parrallax_titre_services">
		<h2 class="">Services</h2>
	</div>
	
	<div class="triangle_bg">
		<div class="triangle"></div>
	</div>
	
	<div class="services_boxes row">
		<div class="container">
			
			<div class=" titre_services">
				<h3 class="saddlebrown"> Ce que je sais faire</h3>
				<h2> <strong>Sites Web</strong></h2> 
			</div>
		
			<div class="row box_services">
			
				<div class="col-4  ftco-animate delay-1"  data-animate-effect="fadeInRight">
					<div class=" box">
						<div>
							<img src="asset/img/code.png" alt="Icone Développement Web | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet" width="150">
							<h2><strong>développement web</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Création ou refonte de site, à partir d'un système de gestion de contenu (CMS) ou sur mesure.</p>
					</div>
				</div>
				<div class="col-4 ftco-animate delay-2"  data-animate-effect="fadeInRight">
					<div class="box">
						<div>
							<img src="asset/img/web.png" alt="Icone Web design | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet" width="150">
							<h2><strong>web design</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Intégration, Maquette Web, Prototypage UI / UX. Développement front-end responsive selon les standards W3C.</p>
					</div>
				</div>
				<div class="col-4  ftco-animate delay-3"  data-animate-effect="fadeInRight">
					<div class=" box">
						<div>
							<img src="asset/img/seo2.png" alt="Icone Optimisation| Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet" width="150">
							<h2><strong>Optimisation</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Développements favorisant l'optimisation du site. Que ce soit référencement naturel ou performance (GTmetrix). </p>
					</div>
				</div>
			</div>
		</div>
	</div>


		
	<div class="anim_service row">
		<div class=" place2    delay0"><img src="asset/img/service_pcfixe.png" alt='Image réprésentant le mockup du site en format pc fixe | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet'></div>
		<div class=" place1   delay1"><img src="asset/img/service_tablette.png" alt='Image réprésentant le mockup du site en format tablette | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet'></div>
		<div class="  place3   delay2"><img src="asset/img/service_tel.png" width="100" alt='Image réprésentant le mockup du site en format téléphone | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet'></div>
		<div class="  place4  delay3"><img src="asset/img/service_pc.png"  alt='Image réprésentant le mockup du site en format ordinateur portable | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet'></div>
	</div>
			
	

	<div class="services_boxes row">
		<div class="container">

			<div class="titre titre_services">
				<h3 class="saddlebrown">Base que j'ai</h3>
				<h2><strong>Communication</strong> </h2>
			</div>
		

			<div class="row box_services">
				<div class="col-4 ftco-animate" data-animate-effect="fadeInRight">
					<div class="box">
						<div>
						<img src="asset/img/print3.png" alt="Icone Communication Papier  | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet">
							<h2><strong>papier</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Création de documents de communications en ligne ou imprimables (carte de visite, flyer).</p>
					</div>
				</div>
				
				<div class="col-4 ftco-animate" data-animate-effect="fadeInRight">
					<div class="box">
						<div>
							<img src="asset/img/com.png" alt="Icone Web marketing | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet">
							<h2><strong>webmarketing</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Création d'emailings, bannières et visuels pour les réseaux sociaux.</p> 
					</div>
				</div>

				<div class="col-4 ftco-animate " data-animate-effect="fadeInRight">
					<div class="box_bg box">
						<div>
							<img src="asset/img/video.png" alt="Icone Vidéo | Mikael Freva, Web designer & Developpeur Web Freelance à Cannes, Le Cannet">
							<h2><strong>vidéo</strong> </h2>
						</div>
						<div class="spacer"></div>
						<p>Quelques connaissances en motion design pour des vidéos de présentation et montage vidéo.</p> 
					</div>
				</div>
			</div>

		</div>

	</div>

	

	
</section>


<section class="row page-section section_portfolio" id="scroll_div_portfolio">
	<div class="parrallax_content parrallax_titre_portfolio">
			<h2>Portfolio</h2>
		</div>
		
		<div class="triangle_bg">
		<div class="triangle_5"></div>
	</div>
	<div class="row section_carousel  " >
		<div class="jo-owl-filter">
			
			
				<ul class="jo-cats ftco-animate delay-2" data-animate-effect="fadeInUp">
					<li class="jo-cat selected" id="cat-0">Tout</li>

					<?php while($cat = $result_cat->fetch()){ 

						
					
						$nom_cat = strtolower(str_replace($search, $replace, $cat['nom_cat']));
						?>
				 		<li class="jo-cat" id="cat-<?php echo $nom_cat ?>"><?php echo $cat['nom_cat'] ?></li>
				 	<?php } ?>
				</ul>
			

			<div class="carou " >
				<div class="jo-carousel-box"  id="carousel_div" >
					<div class="owl-carousel carousel_portfolio owl-theme jo-owl-carousel" id="cat-0">

						<?php 
						
						while( $element = $result->fetch() ){ 
							

							$categorie = $bdd->prepare('SELECT * FROM t_cat INNER JOIN t_carousel ON t_cat.id_cat = t_carousel.id_cat WHERE t_carousel.id_cat = ?');
							$categorie->execute(array(
								$element['id_cat']
							));
				
							$cat = $categorie->fetch();
							$nom_cat = strtolower(str_replace($search, $replace, $cat['nom_cat']));
							?>

						<div class="div_item_carou  row"  data-cat="cat-<?php echo $nom_cat; ?>" >
							<div class="item_carou">
								<?php 

								if (file_exists('asset/img/carousel/'. $element['id_element'] . '.jpg')) {
									
									?>
									
									<img src="asset/img/carousel/<?php echo $element['id_element'] ?>.jpg" alt="<?php echo $element['alt_element']; ?>">
									<?php
								} 
								
								else if (file_exists('asset/img/carousel/' . $element['id_element'] . '.png')) {
									
								
									?>
									<img src="asset/img/carousel/<?php echo $element['id_element'] ?>.png" alt="<?php echo $element['alt_element']; ?>">
									<?php
								} 
								
								
								else {
								?>
									<img src="asset/img/photo-vide.jpg" alt="<?php echo $element['alt_element']; ?>">
								<?php
								}
								
								?>
								
								<div class="figcaption">
									<h2><strong><?php echo $cat['nom_cat'] ; ?></strong></h2>
									<!-- <h2><?php //echo $element['desc_element']; ?> </h2> -->
								</div>
								<form action="#" method="POST" class="form_carousel_modal">
									<input type="hidden" name="id_carousel_modal" class="id_carousel_modal" value="<?php echo $element['id_element']; ?>">
									<input type="submit" name="login" value="" class="login submit_modal_carou">
								</form>
								<div class="color_carou" data-cat="cat-<?php echo $element['id_cat']; ?>">
									<p class="yyy"><strong><?php echo $element['nom_element'] ?></strong></p>

								</div>
							</div>
						</div>
						
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div id="modal_carousel_portfolio">
	<div class="div_modal_carou_portfolio"></div>
	<p class="btn_fermer_modal"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg></p>
</div>	



<section class="row page-section" id="scroll_div_contact">

	<div class=" section_portfolio">
	<div class="parrallax_content parrallax_titre_contact">
		<h2>Contact</h2>
	</div>
		
	<div class="triangle_bg">
		<div class="triangle_5"></div>
	</div>
	</div>

	<div class="row div_contact">
		<div class="container">
			<div class="row contact_info col-5">
				<div class="info_fas">

					<p class="ftco-animate delay-1" data-animate-effect="fadeInLeft">Freva Mikael, Web designer Freelance</p>
                    <div>
						<!--<p class="ftco-animate delay-2" data-animate-effect="fadeInLeft"><a href="tel:+33659453619"><span><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" class="svg-inline--fa fa-phone-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"></path></svg></span>  06 59 45 36 19</a> </p>-->
						<p class="ftco-animate delay-3" data-animate-effect="fadeInLeft"> <a href="mailto:contact@mikaelfreva.com"><span><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg></span>contact@mikaelfreva.com</a> </p>
						<p class="ftco-animate delay-4" data-animate-effect="fadeInLeft"><span><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="home" class="svg-inline--fa fa-home fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"></path></svg></span> Le Cannet, France</p>
					</div>
				   
				</div>
			</div>
			<div class="col-7 p_form">
				<form id="contact_form" method="post" class="ftco-animate delay-5" data-animate-effect="fadeInLeft" >

					<div class="form_contact_div col_contact w50 div_nom">
						<input id="nom" name="nom" class="nom_contact_form input-text js-input" type="text" required>
						<label class="label" for="nom">Nom</label>
					</div>

					<div class="form_contact_div col_contact w50 div_email">
						<input id="email" name="email" class="email_contact_form input-text js-input" type="text" required>
						<label class="label" for="email">E-mail</label>
					</div>
					<div class="form_contact_div col_contact w100 div_objet">
						<input id="objet" name="objet" class="objet_contact_form input-text js-input" type="text" required>
						<label class="label" for="objet">Objet du message</label>
					</div>
					<div class="form_contact_div col_contact w100 div_message">
						<textarea class="message_contact_form input-text js-input" id="message" name="message" cols="30" rows="20" required></textarea>
						<label class="label" for="message">Message</label>
					</div>
					<div class="form_contact_div col_contact w100 align-center div_envoi">
						<input class="envoi_contact_form submit-btn btn_transition" id="envoi" name="envoi" type="submit" value="Soumettre">
					</div>
				</form>

			</div>
		</div>
	</div>

</section>


<a href="/asset/img/cv-mikaelfreva.pdf" target="_blank" id="cv">



<svg id="Calque_2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 306.67 408.88">
  <g id="Calque_1-2">
	<path d="M297.05,0c7.24,2.95,9.63,8.41,9.62,16.06-.14,102.46-.13,204.92-.02,307.39,0,7.85-2.49,14.02-8.09,19.53-19.54,19.23-38.9,38.63-58.16,58.14-5.3,5.37-11.27,7.78-18.84,7.76-68.66-.14-137.33-.08-205.99-.08-11.03,0-15.48-4.45-15.48-15.49C.09,267.56,.13,141.81,0,16.07,0,8.41,2.38,2.95,9.62,0H297.05Zm-72.84,396.65c0-1.67,0-2.85,0-4.03,0-17.57-.05-35.13,.03-52.7,.04-8.56,4.86-13.34,13.36-13.43,5.19-.06,10.38-.02,15.56-.01,5.06,0,10.12-.09,15.17,.06,3.59,.1,5.95,2.42,6.13,5.6,.17,3.03-2.16,5.69-5.58,6.19-1.44,.21-2.92,.12-4.38,.12-9.28,0-18.56,0-28.02,0v49.35c1.38-1.28,2.35-2.13,3.26-3.03,16.85-16.84,33.64-33.73,50.58-50.48,3.07-3.04,4.36-6.29,4.36-10.61-.08-102.33-.06-204.66-.06-307v-4.34H12.37V396.65H224.21Z" />
	<path d="M153.55,249.67c30.86,0,61.72,0,92.58,0,6.2,0,9.07,1.85,9.14,5.85,.07,4.09-3.02,6.13-9.37,6.13-61.72,0-123.44,0-185.16,0-6.34,0-9.43-2.05-9.34-6.16,.09-3.99,2.95-5.82,9.17-5.82,30.99,0,61.99,0,92.98,0Z" />
	<path d="M172.94,217.66c23.8,0,47.59,0,71.39,0,1.06,0,2.13-.02,3.19,0,5,.11,7.83,2.32,7.76,6.04-.07,3.7-2.91,5.92-7.95,5.92-49.85,.03-99.71,.02-149.56,0-1.31,0-3.1,.16-3.84-.58-1.64-1.63-3.85-3.84-3.76-5.72,.09-1.86,2.45-3.99,4.32-5.25,1.23-.83,3.35-.4,5.07-.4,24.46-.02,48.92-.01,73.38-.01Z" />
	<path d="M133.88,293.67c-24.2,0-48.39,0-72.59,0-1.2,0-2.4,.07-3.59-.05-3.91-.39-6.51-3.07-6.29-6.36,.22-3.29,2.67-5.35,6.59-5.54,.93-.05,1.86-.02,2.79-.02,48.92,0,97.85,0,146.77,0,6.48,0,9.4,1.92,9.28,6.07-.12,3.97-3.11,5.9-9.19,5.91-24.59,0-49.19,0-73.78,0Z" />
	<path d="M137.83,115.7c3.82-12.67,7.64-25.35,11.46-38.03,1.45-4.83,2.8-9.69,4.32-14.5,1.37-4.34,4.19-6.21,7.58-5.27,3.65,1.02,5.22,4.2,3.89,8.67-6.12,20.61-12.35,41.2-18.52,61.8-1.06,3.53-3.34,5.28-7.06,5.15-1.73-.06-3.46,0-5.19-.04-3.01-.06-5.05-1.53-5.92-4.41-6.33-20.97-12.69-41.93-18.91-62.93-1.23-4.16,.53-7.3,4.03-8.26,3.39-.92,6.22,.94,7.55,5.32,4.94,16.26,9.78,32.54,14.67,48.82,.37,1.24,.81,2.46,1.22,3.69h.88Z" />
	<path d="M51.27,95.13c-.02-7.7-.35-15.41,3.57-22.54,9.02-16.4,30.67-19.96,44.26-7.19,2.86,2.68,3.28,6.3,1.04,8.84-2.16,2.45-5.6,2.73-8.56,.27-3.84-3.19-8.01-5.28-13.09-4.84-8.58,.74-14.7,7.15-15.15,16.21-.31,6.37-.24,12.78-.03,19.15,.23,6.96,3.43,12.34,9.93,15.11,6.27,2.67,12.17,1.59,17.48-2.84,3.71-3.09,7.05-3.08,9.47-.25,2.37,2.76,1.75,6.29-1.81,9.31-8.95,7.59-19.09,9.33-29.77,4.76-11.56-4.95-16.89-14.44-17.34-26.82-.11-3.06-.02-6.12-.02-9.18Z" />
	<path d="M152.93,197.57c-17.82,0-35.65,0-53.47,0-1.33,0-2.66-.02-3.98-.13-3.44-.29-5.32-2.3-5.61-5.64-.27-3.13,2.08-5.56,5.61-6.05,1.18-.16,2.39-.15,3.58-.15,36.18,0,72.36,0,108.54,0,6.37,0,9.37,2.05,9.22,6.21-.14,3.99-2.95,5.76-9.23,5.76-18.22,0-36.45,0-54.67,0Z" />
	<path d="M223.4,114.31c-9.96,0-19.92,.03-29.88,0-5.07-.02-7.69-2.16-7.61-6.05,.08-3.68,2.72-5.88,7.5-5.89,20.32-.05,40.64-.07,60.96,.02,5.56,.02,8.68,4.14,6.7,8.47-1.29,2.82-3.73,3.49-6.59,3.48-10.36-.03-20.72-.01-31.08-.01Z" />
	<path d="M210.92,82.33c-5.99,0-11.98,.05-17.96-.02-4.48-.05-6.99-2.2-7.04-5.85-.04-3.65,2.45-6.04,6.89-6.07,12.11-.1,24.22-.1,36.33,0,4.35,.04,7,2.58,6.91,6.13-.08,3.56-2.7,5.75-7.16,5.79-5.99,.06-11.98,.02-17.96,.01Z" />
	<path d="M243.09,281.75c2.13,0,4.25-.08,6.37,.02,3.45,.17,5.49,2.19,5.71,5.49,.21,3.11-1.47,5.72-4.66,5.95-5.13,.37-10.33,.38-15.44-.09-3.17-.29-4.63-2.94-4.31-6.15,.3-3.04,2.15-4.85,5.15-5.12,2.37-.22,4.78-.04,7.17-.04v-.05Z" />
	<path d="M63.89,217.81c2.26,0,4.53-.16,6.77,.03,3.21,.28,5.1,2.19,5.27,5.43,.17,3.21-1.42,5.69-4.62,5.93-5,.38-10.07,.36-15.07,.03-3.26-.22-4.88-2.8-4.74-5.88,.14-3.07,1.93-5.26,5.24-5.5,2.38-.17,4.78-.03,7.16-.04Z" />
  </g>
</svg>



</a>


<?php include('footer.php'); ?>
</body>
</html>