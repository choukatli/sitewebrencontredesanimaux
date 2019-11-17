<?php
session_start();
//******************************************  LES FONCTIONS  ************************************************/
function connexion_base_donnee()
{
 return new PDO('mysql:host=localhost;dbname=animeeticc','root','root');
}


function verification_validiter_email($bdd,$mail)
{

$requete="SELECT * FROM utilisateurs WHERE mail='".$mail."'";
$reponse=$bdd->query($requete);
if($reponse->fetch())
	return true ;
else 
	return false ;

}

//**************************************************   MAIN   ************************************************/

$mail=htmlspecialchars($_POST['mail'])   ;

try
{
$bdd=connexion_base_donnee();
}
catch (PDOException $e) 
{
  echo "erreur de connexion a la base de donnee .<br>".$e->getMessage();
  exit;
}


if(!(verification_validiter_email($bdd,$mail)))
{
	$_SESSION['mail_existe_pas']='1';
	
header('location: reset_mot_pass.php');
	exit;
}
//envoie d'un mail de recuperation à l'adresse mail 


$mail = 'mohaxoy98@hotmail.fr'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Demande récuperation mot de passe  [Animeetic TEAM].";
$message_html = "<html><head></head><body>.</body></html>";
//==========
 
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "Pour changer votre mot de passe merci de suivre le lien suivant";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"WeaponsB\"<mohaxoy98@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"WeaponsB\" <mohaxoy98@hotmail.fr>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
	$_SESSION['confirmer']='1';
header('location: reset_mot_pass.php');

//==========
?>



?>