<?php
session_start();

function check_email_psw()
{
	//test si l'utilisateur à bien tapper son identifiant 
	if(isset($_POST['mail'])&&isset($_POST['psw']))
		return true ;
	else 
		return false ;
}

function connexion_base_donnee()
{
 return new PDO('mysql:host=localhost;dbname=animeeticc','root','root');
}
function conforme_mail_psw($bdd,$mail,$psw)
{
//tester si le mot de passe entrer par l'utilsateur correspond au vrai mot de passe 
$requete="SELECT * FROM utilisateurs WHERE mail='".$mail."'";
$reponse=$bdd->query($requete);
$donnee=$reponse->fetch();

//l'utilisation de password_verify est necessaire car le mot de passe de l'utilisateur et encrypté dans la base 
if(password_verify($psw,$donnee['psw'])&& $donnee )
	{

//initialisation de $_SESSION pour l'utiliser une fois l'utilisateur est connecté  avec succés 
foreach($donnee as $clef=>$var)
{
	$_SESSION[$clef]=$var;
}
$_SESSION['id']=$donnee['id'];
return true ; 
}
else 
	return false ;

}
if(check_email_psw())
{
//ce cookie va etre injecté dans la zone de saisie de l'email pour éviter a l'utilsateur de tapper son main une autre fois 
setcookie('mail',$_POST['mail'],time()+7200);
try
{
	
$mail=$_POST['mail'];
$mdp_tentative=$_POST['psw'];
$bdd=connexion_base_donnee();

if(conforme_mail_psw($bdd,$mail,$mdp_tentative)==false)
{
    session_destroy();
	header('Location: Connexion.php');

}
else

header('location: accueil.php');

}// fermante de try
catch (PDOException $e) 
{
  echo "Connexion à echoué, contactez le centre de maintenance .<br>".$e->getMessage();
}




}//fermuture de if(check_email_psw)


?>
