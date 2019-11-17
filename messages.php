<?php 
session_start();
?>
<link rel="icon" type="image.png" href="logo.png"/>
<style type="text/css">
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

<div id='barre_intro'>
<h2><br><div id='titre'><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a><br></div></h2>
</div>
<?php

//AFFICHAGE DES MESSAGES A PARTIR DE LA BASE DE DONNEES 

try {
		$bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
	} 
	catch (Exception $e) {
		exit('Erreur : ' . $e->getMessage());
	}
$id=$_SESSION['id'];
$requete="SELECT * FROM messages WHERE id_expediteur='".$id."'";
$reponse=$bdd->query($requete);
if($reponse->rowCount()!=0)
{
while($donnee=$reponse->fetch())
{
	echo $donnee['date']."  :   ".$donnee['annonceur']." : ".$donnee['mess']."<br><br>";

echo '<br><br><br><center><a href="contact.php?id='.$donnee['id_proprietaire'].'">Répondre ?</a></center><br><hr><br>';

}

}
// DANS LE CAS OU ROWCOUNT DE REPONSE EST EGALE A ZERO L MESSAGE SUIVANT VA ETRE AFFICHé
else 
echo "<br><br><br><br><br><br><br><br><br><br><br><br><center><font size='40px' color='black' face='cursive'>Ma messagerie est vide ! </font></center>";


?>