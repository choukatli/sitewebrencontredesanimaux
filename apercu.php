<?php
    //si nous avons une image
    if(!empty($_GET['id_img'])) {
 
	//connexion à la base de données
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
	} catch (Exception $e) {
		exit('Erreur : ' . $e->getMessage());
	}
 
	//on sécurise notre donnée
	$idImg = intval($_GET['id_img']);
 
	//la requète qui récupère l'image à partir de l'identifiant
	$req = $bdd->prepare('SELECT extension, img FROM animal WHERE id_img = ?');
	$req->execute(array($idImg));		
 
	if($req->rowCount() == 0)
		echo 'L\'image n\'existe pas !';
	else {
		//on stocke les données dans un tableau
		$donnees = $req->fetch();		
		//on indique qu'on affiche une image
		header ("Content-type: ".$donnees['extension']);
		//on affiche l'image en elle même
		echo $donnees['img'];
	}
 
	$req->closeCursor();
 
    } else
           echo 'Vous n avez pas sélectionné d image !';
?>