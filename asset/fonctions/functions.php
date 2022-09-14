<?php 
	if ( !isset( $bdd ) ) {
		include('cnx.php');
	}
	function resizejpg( $source, $destination, $new_width, $new_height){
		$old_image = imagecreatefromjpeg($source);
		 
		list( $old_width , $old_height ) = getimagesize($source);
		if( ( $old_width / $old_height ) < ( $new_width / $new_height ) ){
			$height = $new_height / $new_width * $old_width;
			$width = $old_width;
			$y = ( $old_height - $height)  / 2;
			$x = 0;
		}
		else{
			$width = $new_width / $new_height * $old_height;
			$height = $old_height;
			$x = ( $old_width - $width)  / 2;
			$y = 0;
		}
		$new_image = imagecreatetruecolor($new_width, $new_height);
		imagecopyresampled($new_image, $old_image, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
		imagejpeg($new_image, $destination, 100 );
	}
	function resizepng( $source, $destination, $new_width, $new_height){
		$old_image = imagecreatefrompng($source); 
		list( $old_width , $old_height ) = getimagesize($source);
		if( ( $old_width / $old_height ) < ( $new_width / $new_height ) ){
			$height = $new_height / $new_width * $old_width;
			$width = $old_width;
			$y = ( $old_height - $height)  / 2;
			$x = 0;
		}
		else{
			$width = $new_width / $new_height * $old_height;
			$height = $old_height;
			$x = ( $old_width - $width)  / 2;
			$y = 0;
		}
		$new_image = imagecreatetruecolor($new_width, $new_height);
		$color = imagecolorallocatealpha($new_image, 0, 0, 0, 127); //fill transparent back
		imagefill($new_image, 0, 0, $color);
		imagesavealpha($new_image, true);
		imagecopyresampled($new_image, $old_image, 0, 0, $x, $y, $new_width, $new_height, $width, $height);
		imagepng($new_image, $destination, 9 );
	}

	function get_product ( $id_element ) {
		global $bdd;
		$result = $bdd->prepare('SELECT * FROM t_carousel WHERE id_element = ?');
		$result->execute(array(
			$id_element
		));
		return $result->fetch();
	}