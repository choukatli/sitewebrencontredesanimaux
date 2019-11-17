<link rel="icon" type="image.png" href="logo.png"/>
<LINK REL="stylesheet" TYPE="text/css" HREF="parametre.css">
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
</style>
<body>
<?php
 if(isset($_POST['validation'])) {
 //Indique si le fichier a été téléchargé donc le formulaire aussi a été bien saisie 

 include("transfert_base_profil_animal.php");
 //transmission des données à la base 
 }


?>
<!-- affichage de la barre d'intro -->
<div id='barre_intro'>
<h2><br><div id='titre'><font size="6px"><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a></font><br></div></h2>
</div>


<div id="all">
<center>


<!--affichage du formualire -->
<br><br>
<h1>Mon animal</h1>
	

<!-- la form enctype permet de preciser qu'il s'agit d'un transfert des fichiers plus précisément les images -->

<form enctype="multipart/form-data" action="accueil-profil.php" method="post">

  <p>
    <span class="label">Sexe</span>
    <input type="radio" name="sexe" ng-model="ctrl.pet.sexe" id="female" value="Female">
    <label for="female">Femelle</label>
    <input type="radio" name="sexe" id="male" value="Male">
    <label for="male">Mâle</label>
  </p>
	<!-- pseudo -->
		<!--<label>Pseudo *</label>-->
		<input type="text" name="pseudo" placeholder="Pseudo"  required>
	
  <!-- description -->
  <p><!-- la balise paragraphe permete de sauter une ligne-->
   <!-- <label >Description</label>-->
    <textarea type="text" name="description" placeholder="Description" required ></textarea>
  </p>

		<label class="label">Choisir un type</label>
			<select name="type" required><option value="">Choisir un type</option>
			<option label="Autre" value="Autre">Autre</option>
			<option label="Chat" value="Chat">Chat</option>
			<option label="Cheval" value="Cheval">Cheval</option>
			<option label="Chien" value="Chien" selected="selected">Chien</option>
			<option label="Insecte" value="Insecte">Insecte</option>
			<option label="Oiseau" value="Oiseau">Oiseau</option>
			<option label="Poisson" value="Poisson">Poisson</option>
			<option label="Reptile" value="Reptile">Reptile</option>
			<option label="Rongeur" value="Rongeur">Rongeur</option>
			</select>
		<!--<span>Veuillez sélectionner un type d'animal</span>-->
	
	
		
	<!-- PEDIGREE -->
	<p>
		<!--<label class="label">Quel est son pedigree ?</label>-->
		<input type="text" name="pedigree" placeholder="Quel est son pedigree ?" required>
	</p>

	<!-- jeu preféré -->
	<p>
		<!--<label >Quel est son jouet préféré ?</label>-->
		<input type="text" name="jouet" placeholder="Quel est son jouet préféré" required>
	</p>

	<!-- faute -->
	<p>
		<!--<label>Quelle est sa plus grosse bêtise ?</label>-->
		<input type="text" name="betise" placeholder="Quelle est sa plus grosse bêtise ?" required>
	</p>

	<!-- répas -->
	<p>
	<!--	<label class="label">Quel est son plat favori ?</label>-->
		<input type="text" name="plat" placeholder="Quel est son plat favori ?" required>
	</p>

  <!-- place-->
  <p>
    <!--<label class="label">Quelle est sa place préférée ?</label>-->
    <input type="text" name="place" placeholder="Quelle est sa place préférée ?" required>
  </p>

	<!-- date -->
   <p>
 <label class="label" for="born_date">Quelle est sa date de naissance ?*</label><br>
      <input masked-input="DD/MM/YYYY" type="text" name="date" placeholder="DD/MM/YYYY" required>
    </p>

	<!--avatar -->
	

	<!-- protection profile -->
<!--	<p>
		<input type="checkbox" name="privee" required>
			<span>Profil privé</span>
	</p>
	-->
<!-- photo de profil -->

<!-- submit -->
	
<label for="validation"></label><input type="submit" name="validation" id="validation" value="Envoyer" />

	<div id="positionner_photo_submit">
	<p >
<label for="image"></label><input type="file" name="image" id="image" /><br />	
</p>
	</div>
	
</form>
		<div class="loading-image">
			<div><img src="race.jpg" width="300"></div>
			<span>Choisir une photo</span>
		</div>

	</center>
	</div>
	</body>