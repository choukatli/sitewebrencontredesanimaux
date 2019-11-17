<?php 
session_start();
?>
<!DOCTYPE html>
<head>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />	
<link rel="icon" type="image.png" href="logo.png"/>
<LINK REL="stylesheet" TYPE="text/css" HREF="accueil.css">
<meta charset="utf-8">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script> 
<style type="text/css">
body
{
background-color: #f5f8fa;
}
</style>
</head>
<body>
<!-- AFFICHAGE DU MESSAGE DE BIENVENUE -->

<?php
 if(!isset($_SESSION['visiteur']))
{$_SESSION['visiteur']='1';?>
<script>
	{
 swal({
 title: "Happy to see you  <?php echo $_SESSION['prenom']?>",
  timer: 2000,
  type: "success",
  showConfirmButton: false,
  
})
}

</script>
<?php }
else 
$_SESSION['visiteur']++;
//UNE FOIS $_SESSION['visiteur'] EST INCREMENTé LA MESSAGE DE BIENVENUE N S'AFFICHERA PLUS 
?>


<!-- AFFICHAGE DE LA BARRE D'INTRODUCTION ANIMEETIC-->

<div id='barre_intro'>
<h2><br><div id='titre'><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a><br></div></h2>
</div>



<!-- AFFICHAGE DU BOUTTON DE DECONNEXION -->


<div id="Deconnexion">
<a href="Deconnexion.php"><div id="bouton">Deconnexion</div></a>
</div>


<!-- AFFICHAGE DE LA BARRE D'ACCUEIL CELLE QUI DéFILE TOUT EN HAUT DE LA PAGE -->

<div class="barre_accueil">
<ul>
    <li><a href="accueil.php"><font color="black">Accueil</font></a></li>
    <li><a href="mes_animaux.php"><font color="black">Mes animaux</font></a></li>
    <li><a href="messages.php"><font color="black">Messages</font></a></li>
   
    </ul>
</ul>
</div>



<!-- AFFICHAGE DE LA BARRE LATERAL TOUT EN GAUCHE DE LA PAGE CELLE QUI CONTIENT PARAMETRES ...  -->

<div id="barre_laterale">
<?php include("barre_laterale.php");?>
</div>
</div>


<!-- AFFICHAGE DU SECTION CORRESPONDANT à LA CREATION DU PROFIL -->


<div id="creer_profil">
<div id="texte1">Profitez pleinement de<br> Animeetic en ajoutant<br> votre animal</div>
</div> 
<div id="submit_profil">
<form action="accueil-profil.php">
<input type="submit" value="creer son profil">
</form>
</div>


<!-- POUR AFFICHER L'IMAGE DE CHIEN A COTER DU SECTION ADOPTATION-->

<div id="adoptation">
</div> 

<!--pour completer l'image du section adopter (ajouter du blanc à la fin )-->

<div id="blanck"><font color="white"></font>
</div>



<!-- COMPLEMENT POUR LA SECTION D'ADOPTION-->

<div id="texte2">Vous voulez parrainer un animal ?</div>
<div id="submit_adopter">
<form action="adopter.php">
<input type="submit" value="Adoptez !">
</form>
</div>


 <!-- CETTE DIV EST NECESSAIRE POUR L'AFFICHAGE DES IMAGES , ELLE PERMET DE LE BIEN POSITIONNER TOUT AU MILIEU DE LA PAGE -->

<div id="news">
</div>




<!--CONNEXION A LA BASE DE DONNEES ET AFFICHAGE DES IMAGES ENREGISTRER , CETTE DIV SERT AUSSI A POSITIONNER LES IMAGES CORRECTEMENTS-->

<div id="nouvaux_animaux">
<?php
// TENTATIVE DE CONNEXION A LA BASE 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
               } catch (Exception $e) {
    exit('Erreur : ' . $e->getMessage());
      }

 

 //SELECTION DES IMAGE A PARTIR DE LA BASE DE DONNEES 
      $reponse = $bdd->query('SELECT id_img, pseudo, id_prop FROM animal');
      if($reponse->rowCount()!=0)
{
?>
<!-- SI IL Y A DES IMAGES ENREGISTRéS DANS LA BASE ALORS J'AFFICHE ILS VIENNENT DE NOUS REJOINDRE -->

<p><font color="green">ILS VIENNENT DE NOUS REJOINDRE</font></p>
<?php 
      while($result = $reponse->fetch()) {
 
    ?><div id="pos_image">
    <?php
    //AFFICHAGE DE PSEUDO
    echo "<div id='nom_animal'><font color=\"black\" face=\"cursive\">".$result['pseudo']."</font></div><br>";

    //SI L'image affiché vient d'un autre utilisateur , alors une suggestion est prposé pour contacter le proprietaire de l'animal

    if($result['id_prop']!=$_SESSION['id'])
      echo'<div id="contactez"><a href="contact.php?id='.$result['id_prop'].'"><font color="red">contactez le propriétaire?</font></div>'."<br>";
    //afichage des images 
    echo '<a href="apercu.php?id_img='.$result['id_img'].'"><img src="apercu.php?id_img='.$result['id_img'].'" width="300px" height="300px" /></a>';
    echo"<br><br>";
?>
</div>
<?php    
      }
    }
      $reponse->closeCursor();
  ?>





<!--POUR AFFICHER LA PETITE CHATON QUI PERMET DE MONTER VERS LE HAUT DE LA PAGE -->



<a href="#" title="Haut de page" id="scrollup">
<script>
$(window).scroll(function() {
  if($(window).scrollTop() == 0){
    $('#scrollToTop').fadeOut("fast");
  } else {
    if($('#scrollToTop').length == 0){
      $('body').append('<div id="scrollToTop">'+
        '<a href="#"><img src="flesh.png"></a>'+
        '</div>');
    }
    $('#scrollToTop').fadeIn("fast");
  }
});
$('#scrollToTop a').live('click', function(event){
  event.preventDefault();
  $('html,body').animate({scrollTop: 0}, 'slow');
});
</script>

</body>