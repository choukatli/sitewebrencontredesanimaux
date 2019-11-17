
<?php //lorsque un utilisateur tappe un mot passe incorrect il va etre redirigé vers cette page ?>
<!DOCTYPE html>
<head>
<title>Se connecter a inconnue</title>
<meta charset="utf-8">
<link rel="icon" type="image.png" href="logo.png"/>
<link rel="icon" type="image.png" href="logo.png"/>
<style type="text/css">
a:link 
{ 
 text-decoration:none; 
} 

#centre
{

text-align: center;
}
h1.titre 
{
font-family:fantasy;

}
#barre_intro
{
margin-top: -1.5%;
margin-left: -1%;
background: linear-gradient(to right,  #EDE574 0%,#E1F5C4 100%); 
}
#titre
{
	margin-top: -1%;
	margin-left: +2%;
	font-family: cursive ;
	
}

</style>
</head>
<body>
<div id='barre_intro'>
<h2><br><div id='titre'><font color="white"><a href="Animeetic.php"><font size="6px" color="white">Animeetic</font></a></font><br></div></h2>
</div>
<div id="centre">
<p>Se connecter en tant que proprietaire de <font color="blue"><?php echo $_COOKIE['mail'];?></font></p>
<br>
<p><font color="blue"><?php echo $_COOKIE['mail'];?> </font><a href="Animeetic.php"> Ce n’est pas vous ?</a></p>
<br>
<form method="post" action="sauvegard.php">
<input type="password" placeholder="Mot de passe" name="psw" required>
<br><br>
<input type="submit" value="Connexion">
<input type="hidden" name="mail" value="<?php echo $_COOKIE['mail'];?>">
<br><br>
</form>
<form action="reset_mot_pass.php">
<input type="submit" value="Récupérer votre compte">
</form>
</div>


</body>
