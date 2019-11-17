<?php session_start();?>
<!DOCTYPE html>
<head>
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
</head>
<body>
	<div id='barre_intro'>
<h2><br><div id='titre'><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a><br></div></h2>
</div>
<?php
//connexion à la base 
try {
		$bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
	} 
	catch (Exception $e) {
		exit('Erreur : ' . $e->getMessage());
	}

// selection des animaux dans l'id correspond a l'uilisateur courant. 
$id=$_SESSION['id'];
$req="SELECT * FROM animal WHERE id_prop='".$id."'";
$reponse=$bdd->query($req);
if($reponse->rowCount()!=0)
{
	while($donnee=$reponse->fetch())
{

//afichage des informations qui correspond au profil courant de $reponse 
echo "pseudo :  " . $donnee['pseudo']."<br><br>sexe :  ".$donnee['sexe']."<br><br>description :  ".$donnee['description']."<br><br>pedigree :  ".$donnee['pedigree']."<br><br>sa plus grand bétise :  ".$donnee['betise']."<br><br>sa place preféré :  ".$donnee['place']."<br><br>";

echo'<center><a href="supprimer_profil.php?pseudo='.$donnee['pseudo'].'">supprimer le profil </a></center><br><hr><br>';
}


}
else 
	//si aucun animal n'est enregistré l message suivante va etre affiché 
echo "<br><br><br><br><br><br><br><br><br><br><br><br><center><font size='40px' color='black' face='cursive'>Aucun animal enregistré ! </font></center>";


?>

</body>
