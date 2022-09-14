<?php 

function supprAccents($string){
	return strtr($string,'āáăâãàäåċéèêëíìîïñóòôöõùûüúÿýÀÁÂÄÅÃÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝ',
'aaaaaaaaceeeeiiiinooooouuuuyyAAAAAACEEEEIIIINOOOOOUUUUY');
}

function supprSpeciaux($string){
	$string = strtr($string,"' &@\"\\/#,()*","------------");
	$string = str_replace("--","-",$string);
	return $string;
}

?>