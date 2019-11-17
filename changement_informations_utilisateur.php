<?php session_start();
function connexion_base_donnee()
{
 return new PDO('mysql:host=localhost;dbname=animeeticc','root','root');
}

function mise_a_joure($bdd,$value,$lettre,$id)
{
	//la variable lettre permet d'indiquer quel est le champ qu'on va le mettre à joure 

$value=htmlspecialchars($value);
if($lettre=='n')
$requete="UPDATE utilisateurs SET nom='".$value."'"."WHERE id = " . $id;
else 
if($lettre=='p')
$requete="UPDATE utilisateurs SET prenom='".$value."'"."WHERE id = " . $id;
else 
if($lettre=='m')
$requete="UPDATE utilisateurs SET mail='".$value."'"."WHERE id = " . $id;


$bdd->exec($requete);


//mise a jour pour $_SESSION
//est nécessaire pour que les informations saisie par l'utilisateur s'affiche spontanement dans la section parametre 
if($lettre=='m')$_SESSION['mail']=$value;
$mail=$_SESSION['mail'];
$requete="SELECT * FROM utilisateurs WHERE mail='".$mail."'";
$reponse=$bdd->query($requete);
$donnee=$reponse->fetch();

foreach($donnee as $clef=>$var)
{
	$_SESSION[$clef]=$var;
}
return true; 
}

function mise_a_joure_psw($bdd,$mdp_tentative,$new_mdp,$id)
{
	//si l'ancien mot de passe correspond bien au mot de passe de l'utilisateur alors la mise à joure va étre effectué 

$requete="SELECT * FROM utilisateurs WHERE id='".$id."'";

$reponse=$bdd->query($requete);
$donnee=$reponse->fetch();

if(password_verify($mdp_tentative,$donnee['psw']))
{
	//le mot de passe va etre encrypté avant son insertion à la base de donnée
$new_mdp=password_hash($new_mdp, PASSWORD_BCRYPT, array("cost" => 12));
$requete="UPDATE utilisateurs SET psw='".$new_mdp."'"."WHERE id = " . $id;
$bdd->exec($requete);
return true;
}
else 
return false;

}
//*************************************************************************// 
?>
<body>
<?php
$id=$_SESSION['id'];

try
{
$bdd=connexion_base_donnee();
}
catch (PDOException $e) 
{
  echo "erreur de connexion a la base de donnee .<br>".$e->getMessage();
  exit;
}

if(isset($_POST['nom']))
	$resultat=mise_a_joure($bdd,$_POST['nom'],"n",$id);
else 

if(isset($_POST['prenom']))
$resultat=	mise_a_joure($bdd,$_POST['prenom'],"p",$id);
else 

if(isset($_POST['mail']))
$resultat=	mise_a_joure($bdd,$_POST['mail'],"m",$id);
else
if(isset($_POST['psw'])&&isset($_POST['new_psw']))
	$resultat=mise_a_joure_psw($bdd,$_POST['psw'],$_POST['new_psw'],$id);
if($resultat==true)
$_SESSION['modifier_success']=true;
else 
$_SESSION['incorrect']=true;
header('location:changement_informations_utilisateur_check.php?link');


?>
</body>








