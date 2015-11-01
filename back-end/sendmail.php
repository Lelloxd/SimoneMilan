<?php

echo "<div class='logo-centered'><img src='img/check_icon.png' alt='inviata'><br><h3>GRAZIE !</h3> <div class='inviata'><h4>la mail &egrave; stata Inviata!</h4></div></div>";

$email=$_GET["email"];
$obj=$_GET["oggetto"];
$nome=$_GET["nome"];
$cognome="";
if(isset($_GET["cognome"]))
$cognome=$_GET["cognome"];
$commenti=$_GET["comments"];

//echo " email=".$_GET["email"]." nome=".$_GET["nome"]." dati=".$_GET["comments"];

$to      = 'lelloxd@gmail.com';

$subject = "contatto tramite sito da $nome $cognome : ".$email." - PER $obj";

$message = $commenti;

$headers = 'From: '.$email . "\r\n" .

    'Reply-To: '.$email ."\r\n" .

    'X-Mailer: PHP/' . phpversion();



mail($to, $subject, $message, $headers);

?>
