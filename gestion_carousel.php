<?php



include('cnx.php');




if( isset($_POST['login_js'])){

	$result_modal_carousel = $bdd->prepare("SELECT * FROM t_carousel WHERE id_element = ? ");
	$result_modal_carousel->execute(array(
		$_POST["id_carousel_modal"]
	));
	


	while($element2 = $result_modal_carousel->fetch()){ 
       
        $categorie = $bdd->prepare('SELECT * FROM t_cat INNER JOIN t_carousel ON t_cat.id_cat = t_carousel.id_cat WHERE t_carousel.id_cat = ?');
        $categorie->execute(array(
            $element2['id_cat']
        ));

        $cat = $categorie->fetch();
    ?>
    
        <div class="modal_carousel <?php echo $cat['nom_cat'];?>">
            <div class="hola">
                <p> <?php echo $cat['nom_cat']?></p>
                <p> <?php echo $cat['nom_element']?></p>
             </div>
            <div class=" img_modal_carousel">
                <img src="asset/img/carousel/<?php echo $element2['id_element'] ?>.png" alt="<?php echo $element2['alt_element'] ?>" width="100%" height="100%" >
            </div>
             <p><?php echo $element2['detail_element'];?></p>
        </div>
       
	<?php
	   
	} 
}














