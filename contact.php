<?php
session_start();
?>
<!DOCTYPE html>
<head>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />	
<style type="text/css">

textarea[type="text"]
{
	width:20%;
  padding: 30px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
}
textarea[type="text"]:focus,
textarea[type="text"].focus {
  border: solid 1px #707070;
  box-shadow: 0 0 5px 1px #969696;
}
#barre_intro
{
margin-top: -1.5%;
margin-left: -1%;
background: linear-gradient(to right,  #EDE574 0%,#E1F5C4 100%); 
position: relative;
}
#titre
{
	margin-top: -1%;
	margin-left: +2%;
	font-family: cursive ;
	
}
a
{
	text-decoration: none;
}

</style>
</head>
<body>
<?php
//CONFIRMATION SI L MESSAGE A été ENVOYER PAR SUCCéS 
if(isset($_SESSION['mess_envoyer'])&&$_SESSION['mess_envoyer']==true)
{
?>
<script>
    {
 swal({
 title: "message envoyé avec succès",
  timer: 2000,
  type: "success",
  showConfirmButton: false,
  
})
}

</script>
<?php 
$_SESSION['mess_envoyer']=false;
}
?>

<div id='barre_intro'>
<h2><br><div id='titre'><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a><br></div></h2>
</div>

<?php 
//VERIFICATION SI IL EXIST LE PARAMETRE ID DANS L URL 
if(!empty($_GET['id'])) {
	//RECUPERTATIO N DE L'ID
$id_exp= intval($_GET['id']);
$id_propri=$_SESSION['id'];
?>

<!-- FORMULAIRE DU MESSAGE -->
<form method="post">
 <center><textarea type="text" name="mess" value="tappez votre message" required></textarea></center>
 <br>
<center><input type="submit" name="valider" value="submit"></center>
</form>
<?php
//VERIFICATION SI L'UTLISATEUR A CLIQUER SUR LE BOUTTON SUBMIT 
if(isset($_POST['valider']))
{
//CONNEXION A LA BASE 
try {
		$bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
	} 
	catch (Exception $e) {
		exit('Erreur : ' . $e->getMessage());
	}
//RECUPERATION DU MESSAGE TAPPé PAR L'UTLISATEUR 
$mess=$_POST['mess'];

$annonceur=$_SESSION['prenom'];



$date=date('Y-m-d H:i:s'); 

//INSERTION DU MESS DANS LA BASE DE DONNEE AVEC COMME VALEUR : LE PSEUDO DE L'UTLISATEUR ,  LA DATE ET LES ID DU EXPEDITEUR ET PROPIETAIRE 
$bdd->exec("INSERT INTO messages(id_expediteur,mess,annonceur,id_proprietaire,date) VALUES ('".$id_exp."', '".$mess."', '".$annonceur."', '".$id_propri."', '".$date."')");

$_SESSION['mess_envoyer']=true;
header('location:contact.php?id='.$id_exp);
}

}
?>
</body>
