<style type="text/css">
#general
{

     /*   background-color:#483970;*/

}
h1.titre 
{
font-family:cursive;
color: white ;
font-size: 40px;
}
#entete
{
	position: absolute;
	margin-top: -5%;
	margin-left: +58%
}
#changer_mdp
{
	position: absolute;
	margin-left: +38.7%;
	margin-top: +1%;
}
</style>
 <?php 
 $nom="";
 if(isset($_COOKIE['mail']))$nom=htmlspecialchars($_COOKIE['mail']);
 ?>
<div id="general">
<h1 class="titre">Animeetic</h1>
<nav id="entete">
<form method="post" action="sauvegard.php">
<label for="email"><font color="white"> email: </font></label>
<input type="email" name="mail" value="<?php echo $nom ;?>"  >
<label for="mdp"><font color="white">mot de passe: </font></label>
<input type="password" name="psw"  required >
<input type="submit" value="connexion"/>
<br>
<div id="changer_mdp">
<a id="index_forgot"  href="reset_mot_pass.php" target="_top"><font color="white"> Forgot your password?</font></a>
</div>

     </form>
 
  </nav>

</div>
