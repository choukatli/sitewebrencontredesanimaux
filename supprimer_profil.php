<?php 
session_start();
try {
		$bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
	} 
	catch (Exception $e) {
		exit('Erreur : ' . $e->getMessage());
	}
	if(!empty($_GET['pseudo'])) {
$pseudo= $_GET['pseudo'];
$id=$_SESSION['id'];
//suppression du profil seléctionné par id t pseudo 
$req="DELETE FROM animal WHERE id_prop='".$id."' AND pseudo='".$pseudo."'";
$bdd->exec($req);
header('location: mes_animaux.php');
}


?>