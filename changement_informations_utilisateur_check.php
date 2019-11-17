<?php session_start();
//il s'agit de quel champ l'utilisateur va aproter une modification 
?>
<!DOCTYPE html>
<head>
<link rel="icon" type="image.png" href="logo.png"/>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />  
<LINK REL="stylesheet" TYPE="text/css" HREF="parametre.css">

</head>
<body>
<div id='barre_intro'>
<h2><br><div id='titre'><font size="6px"><a href="accueil.php"><font color="white"><font size="6px">Animeetic</font></font></a></font><br></div></h2>
</div>

<?php 
// si la modification à été bien effectué alors une message de reuissite s'affiche 
if(isset($_SESSION['modifier_success'])&&$_SESSION['modifier_success']==true)
    {?>
<script>
    {
 swal({
 title: "paramètre sauvegardé avec succés",
  timer: 2000,
  type: "success",
  showConfirmButton: false,
  
})
}

</script>
<?php 
$_SESSION['modifier_success']=false ; 
}
else 
  //si la modification à échoué l message d'erreur s'affiche 
if(isset($_SESSION['incorrect'])&&$_SESSION['incorrect']==true)
{?>

<script>
 sweetAlert("Oops...", "Ancien mot de passe incorrect !", "error");   
</script>

<?php 
$_SESSION['incorrect']=false;
}

//cette varibale va indiquer quel champ l'utilisateur veux modifier 
$modifier="";
echo "<strong>Nom</strong> : <font color=\"red\">".$_SESSION['nom']."</font>     <a href=\"?link=1\"><img src=\"modifier-icone-5132-32.png\"></a><br><br>";

echo "<strong>prénom</strong> : <font color=\"red\">".$_SESSION['prenom']."</font>     <a href=\"?link=2\"><img src=\"modifier-icone-5132-32.png\"></a><br><br>";

echo "<strong>adresse mail</strong> : <font color=\"red\">".$_SESSION['mail']."</font>     <a href=\"?link=3\"><img src=\"modifier-icone-5132-32.png\"></a><br><br>";

echo"<strong>Changer votre mot de passe</strong>   <a href=\"?link=4\"><img src=\"modifier-icone-5132-32.png\"></a><br><br>";

echo"<br><br><br><br>";
 
$link=$_GET['link'];
     if($link!="")
     {
        if ($link == '1'){
            $modifier="nom";
        }
        if ($link == '2'){
         $modifier="prenom";
         }
        if ($link == '3'){
            $modifier="mail";
        }
        if ($link == '4'){
            $modifier="psw";
        }

//le champ mot de passe à son propre formulaire ce qui n'est pas le cas pour nom , prenom et mail 
if($modifier!="psw")
{
echo "<center>Entrez le nouveau ".$modifier."</center>";
?>
<form method="post" action="changement_informations_utilisateur.php">
<center><input type="text" name="<?php echo $modifier ?>" required></center>
<br><br><br>
<center><input type="submit" name="Valider"></center>
</form>
<?php
}
else 
{
echo "<center>Entrez votre ancien mot de passe </center>";
?>
<form method="post" action="changement_informations_utilisateur.php">
<center><input type="text" name="psw" required></center>
<br><br><br>
<?php echo "<center>Entrez votre nouveau mot de passe </center>";?>
<center><input type="password" name="new_psw" required></center>
<br><br><br>
<center><input type="submit" name="Valider"></center>
</form>


<?php 
}
}
?>
</body>
