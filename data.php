<?php

session_start();
require('php/user.class.php');
require('php/dbconnect.php');

//récupéré les messages

$boite_recep = User::Affiche_Msg($_SESSION['id_utilisateurs']);

       //a revoir
 foreach($boite_recep as $message){
   $infos = User::Info_Envoi($message->idAuteur,$_SESSION['id_utilisateurs']);
  
 }

if(isset($infos)){
foreach($infos as $sender){
  echo" <div class=\"Messages\" id=\"auto_load_div\">
     <h3>Message Envoyé par :{$sender->pseudo}</h3>
     <h4>Date d'envoie :{$sender->laDate}</h4>
     <p>{$sender->texte}</p></div>";
 }
}
?>

  