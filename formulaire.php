<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />  
<LINK REL="stylesheet" TYPE="text/css" HREF="formulaire.css">

<?php 
//affichage d'une message d'erreur si l'email entrer par l'utilisateur existe deja  
if(isset($_SESSION['mail_existe'])&&$_SESSION['mail_existe']=='1')
{
$nom=$_SESSION['nom'];
$prenom=$_SESSION['nom'];
?>
 <script>
 sweetAlert("Oops...", "Adresse mail existe dèja !", "error");   
</script>
<?php 
$_SESSION['mail_existe']='2';
}
else 
{
$nom="";
$prenom="";
}

?>
<!--Formulaire -->
<center>
<h1 class="intro1"><font color="white">Communauté en ligne<br>pour les animaux et leurs propriétaires</font></h1>
</center>

<div id="formulaire">
<form method="post" action="inscription.php">
<div class="form-style-5">
<fieldset>
<legend><span class="number">1</span>S'inscrire</legend>
<input type="text" name="nom" placeholder="Votre nom *" value="<?php echo $nom ?>" required>
<input type="text" name="prenom" placeholder="Votre prénom *" value="<?php echo $prenom ?>" required>
<input type="email" name="mail" placeholder="Votre e-mail *" required>
<input type="password" name="psw" placeholder="Votre mot de passe *" required>
<label for="animal_interest">Intérêts:</label>
<select id="animal_interest" name="interet">
  <option value="Chats">Chats</option>
  <option value="chiens">Chiens</option>
  <option value="autre_animaux">Autre Animaux</option>
</select>      
</fieldset>
<fieldset>
<legend><span class="number">2</span>Information additionnelle</legend>
  <input type="radio" name="sexe" value="male" >Homme    
  <input type="radio" name="sexe" value="female">Femme
  <br><br>
<input type="submit" value="INSCRIPTION GRATUITE"/>
</fieldset>
</div>
</form>
</div>