<!DOCTYPE html>
<head>
	<link rel="icon" type="image.png" href="logo.png"/>
  <style type="text/css">

.menu-vertical {
 font-family: cursive;

  width: 140px; /* optionnel, c'est pour la démo */
  divst-style: none; /* supprime les puces de divste */
  padding: 2px; /* on fait un peu de place autour des divens */
  margin: 0; /* on annule les marges */

}
 
/* styles des divens et éléments de divste */
.mv-item,
.mv-item a {
  /* les divens et item deviennent des blocs */
  /* suffit théoriquement à virer les puces de divste */
  display: block;
}
 
/* styles des divens */
.mv-item a {
  margin: 1px 0; /* espace les divens d'1 px */
  padding: 8px 20px; /* marges internes pour aérer */ 
  color: #666;
  background:  #E6E6FA;
  text-decoration: none; /* on vire le soudivgnement */

  /* on définit la transition pour les navigateurs */
  -webkit-transition: all .3s; /* Chrome/Safari */
  -moz-transition: all .3s; /* Firefox (plus trop nécessaire) */
  transition: all .3s; /* syntaxe officielle */
}
 
/* styles changeants au survol et focus */
.mv-item a:hover,
.mv-item a:focus {
  background: #1ABC9C;
  color: #F5F5F5;
   /* décalage du contenu de 10px vers la droite (30-20 = 10) */
}
#decaler_haut
{

	margin-top: 5px;
	margin-left: -40px;
  position: relative;
}
	</style>

</head>
<body>
<div id="decaler_haut">
<div class="menu-vertical">
    <div class="mv-item"><a href="changement_informations_utilisateur_check.php?link">paramètres du compte</a></div>
    <div class="mv-item"><a href="evenements.php">événements</a></div>
    <div class="mv-item"><a href="favoris.php">favoris</a></div>
    <div class="mv-item"><a href="a_propos.php">à propos </a></div>
</div>
</div>
</body>