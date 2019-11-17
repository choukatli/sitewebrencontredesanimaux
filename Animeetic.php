<?php 
session_start();
//dans le cas ou l'utilisateur est deja connecté dans une autre onglet du navigateur il vas etre rederigé vers son  compte 
if(isset($_SESSION['id']))header('location: accueil.php');
?>
<!DOCTYPE html >
<head>
<title>Animeetic</title>
<link rel="icon" type="image.png" href="logo.png"/>

<meta charset="utf-8">
</head>
<body>
<?php

include ("entete.php");
include ("formulaire.php");
?>	
</div>
</body>