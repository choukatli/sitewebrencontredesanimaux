
<?php 
session_start();
?>
<!DOCTYPE html>
<head>

<link rel="icon" type="image.png" href="logo.png"/>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />	
<style type="text/css">
a
{
text-decoration: none;
}
#barre_intro
{
margin-top: -1.5%;
margin-left: -1%;
margin-right: -0.5%;
background: linear-gradient(to right,  #EDE574 0%,#E1F5C4 100%); 
}
#titre
{
	margin-top: -1%;
	margin-left: +2%;
	font-family: cursive ;
	
}
.container
{
	margin-top:+5%;
	margin-left: +26%;
	width: 500px;
	padding: 100px;
	background-color: #F5F5F5;;
}
input[type="text"] {
 
  width:60%;
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
}
input[type="text"]:focus,
input[type="text"].focus {
  border: solid 1px #707070;
  box-shadow: 0 0 5px 1px #969696;
}
input[type="submit"] {
 
  width:20%;
  padding: 10px;
  border: solid 5px #c9c9c9;
  transition: border 0.3s;
  color:grey;
}

</style>
</head>
<body>
<?php 
if(isset($_SESSION['mail_existe_pas'])&&$_SESSION['mail_existe_pas']=='1')
{$_SESSION['mail_existe_pas']='2';
 ?>
 <script>
 sweetAlert("Oops...", "Adresse mail non valide !", "error");   
</script>

<?php } ?>



<div id='barre_intro'>
<h2><br><div id='titre'><font color="white"><a href="Animeetic.php"><font size="6px" color="white">Animeetic</font></a></font><br></div></h2>
</div>


<form method="post" action="reset_mot_passe_mail_check.php">
<div class="container">
<center><label><strong><font size="6px" color="grey">Votre adresse mail:</font></strong></label></center>
<br>
<center><input type="text" name="mail" required></center>
<br><br><br>
<center><input type="submit" name="Valider"></center>
</div>
</form>
<?php 
if(isset($_SESSION['confirmer'])&&$_SESSION['confirmer']=='1')
{?>
<script>
	{
 swal({
 title: "Email de restauration envoyer avec succès",
  timer: 2000,
  type: "success",
  showConfirmButton: false,
  
})
}

</script>
<?php
 $_SESSION['confirmer']='2';
	}?>
</body>