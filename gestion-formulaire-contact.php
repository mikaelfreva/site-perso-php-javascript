<?php


$nom = $_POST['nom'];
$email = $_POST['email'];
$objet = $_POST['objet'];
$message = $_POST['message'];


if (($nom != '') && ($email != '') && ($objet != '') && ($message != '')){


    if((strlen($nom) < 4 ) OR (strlen($objet) < 4 ) OR (strlen($message) < 4 ) OR (!filter_var($email, FILTER_VALIDATE_EMAIL)) ){
        echo 'erreur_champs'; 
    }
    else{
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From:'.$nom.' <'.$email.'>' . "\r\n" .
                'Reply-To:'.$email. "\r\n" .
                'Content-Type: text/plain; charset="utf-8"; DelSp="Yes"; format=flowed '."\r\n" .
                'Content-Disposition: inline'. "\r\n" .
                'Content-Transfer-Encoding: 7bit'." \r\n" .
                'X-Mailer:PHP/'.phpversion();
        $destinataire = 'contact@mikaelfreva.com	';
        if ( mail($destinataire, $objet, $message, $headers)) {
            echo 'recu';
        } 
        else {
            echo "pasrecu";
            }
    }

}
else{
    echo 'formulaire_vide';
}

    ?>