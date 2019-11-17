<?php
session_start();
function connexion_base_donnee()
{
 return new PDO('mysql:host=localhost;dbname=animeeticc','root','root');
}

function verification_validiter_email($bdd,$mail)
{
//vérifie si l'email éxiste deja dans la base de donnée lors d'une tentative d'inscription , permet d'éviter l'inscription avec un mail qui éxiste deja 
$requete="SELECT * FROM utilisateurs WHERE mail='".$mail."'";
$reponse=$bdd->query($requete);

if($reponse->fetch())
	return false ;
else 
	return true ;
}

function insertion_donnee_dans_la_base($bdd,$nom,$prenom,$mail,$psw,$interet,$sexe)
{// insertion des coordonnées de l'utilisateur dans la base 

//cryptage du mot de passe 
$psw=password_hash($psw, PASSWORD_BCRYPT, array("cost" => 12));
$bdd->exec("INSERT INTO utilisateurs(nom, prenom, mail, psw, interet, sexe) VALUES ('".$nom."', '".$prenom."', '".$mail."', '".$psw."', '".$interet."', '".$sexe."'
	)");


//cette partie la consiste à initialiser $_SESSION['id']  une fois l'inscription à été effectué  avec succés  (de type auto_incremente) 
$requete="SELECT * FROM utilisateurs WHERE mail='".$mail."'";
$reponse=$bdd->query($requete);
$donnee=$reponse->fetch();
$_SESSION['id']=$donnee['id'];
}


//****************************** fin des fonctions **************************

if(!(isset($_POST['mail'])&&isset($_POST['psw'])&&isset($_POST['nom'])&&isset($_POST['prenom'])))
{
	echo "une erreur ce produite , contactez le centre de maintenance <br>";
	echo"<a href=\"Animeetic.php\">retoure a l'accueil</a>";
	exit;
}


//initialisation de $_SESSION
foreach($_POST as $clef=>$var)
{
	$_SESSION[$clef]=$var;
}
$nom=htmlspecialchars($_POST['nom'])   ;
$prenom=htmlspecialchars($_POST['prenom'])  ;
$mail=htmlspecialchars($_POST['mail'])   ;
$psw=htmlspecialchars($_POST['psw'])   ;
if(isset($_POST['interet'])) $interet=htmlspecialchars($_POST['interet'])  ;else $interet="";
if(isset($_POST['sexe'])) $sexe=htmlspecialchars($_POST['sexe'])           ;else  $sexe="";



//Connexion à la base 
try
{
$bdd= connexion_base_donnee();
}
catch (PDOException $e) 
{
  echo "erreur de connexion a la base de donnee .<br>".$e->getMessage();
  exit;
}




//verification si l'email existe deja 
if(!(verification_validiter_email($bdd,$mail)))
{
	$_SESSION['mail_existe']='1';
	header('location: Animeetic.php');



	exit;
}


//insertion des données dans la base 
try
{
insertion_donnee_dans_la_base($bdd,$nom,$prenom,$mail,$psw,$interet,$sexe);
}
catch (PDOException $e) 
{
  echo "erreur d'insertion à la base de donnee .<br>".$e->getMessage();
  exit;
}


//une fois tout à été bien deroulé l'utilisateur va être redirigé vers la page d'accueil
header('location: accueil.php');

?>
