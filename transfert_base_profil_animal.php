<?php
session_start();
?>
<!DOCTYPE html>
<head>
<script src="sweetalert-master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />
</head>
<body>
<script>
    {
 swal({
 title: "profil à été créé avec succès",
  timer: 2000,
  type: "success",
  showConfirmButton: false,
  
})
}

</script>

<?php
if(!is_uploaded_file($_FILES['image']['tmp_name']))
        echo 'Un problème est survenu durant l opération. Veuillez réessayer !';
     else {
        //liste des extensions possibles    
        $extensions = array('/png', '/gif', '/jpg', '/jpeg');
 
        //récupère la chaîne à partir du dernier / pour connaître l'extension
        $extension = strrchr($_FILES['image']['type'], '/');
 
        //vérifie si l'extension est dans notre tableau            
        if(!in_array($extension, $extensions))
            echo 'Vous devez uploader un fichier de type png, gif, jpg, jpeg.';
        else {         
 
            //on définit la taille maximale
            define('MAXSIZE', 300000);        
            if($_FILES['image']['size'] > MAXSIZE)
               echo 'Votre image est supérieure à la taille maximale de '.MAXSIZE.' octets';
            else {
                //connexion à la base de données
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=animeeticc', 'root', 'root');
                } catch (Exception $e) {
                    exit('Erreur : ' . $e->getMessage());
                }

        


//PROTECTION CONTRE LA FAILLE XSS

                //sexe est pas un champ required 
        if(isset($_POST['sexe']))
         $sexe=htmlspecialchars($_POST['sexe']);
        else 
        $sexe="";
        

        $image = file_get_contents($_FILES['image']['tmp_name']);
        $pseudo=htmlspecialchars($_POST['pseudo']);
        $description=htmlspecialchars($_POST['description']);
        $type=htmlspecialchars($_POST['type']);
        $pedigree=htmlspecialchars($_POST['pedigree']);
        $jouet=htmlspecialchars($_POST['jouet']);
        $betise=htmlspecialchars($_POST['betise']);
        $plat=htmlspecialchars($_POST['plat']);
        $place=htmlspecialchars($_POST['place']);
        $datee=htmlspecialchars($_POST['date']);
        //$privee=htmlspecialchars($_POST['privee']);
      $id_prop=$_SESSION['id'];


                 $req = $bdd->prepare("INSERT INTO animal(img, extension,pseudo,sexe,description,type_ani,pedigree,jouet,betise,plat,place,date,id_prop) VALUES(:image, :type, :pseudo, :sexe, :description, :type_ani, :pedigree, :jouet, :betise, :plat, :place, :date, :id_prop)");
                $req->execute(array(
                    
                    'image' => $image,
                    'type' => $_FILES['image']['type'],
                    'pseudo' => $pseudo,
                    'sexe' => $sexe,
                    'description' => $description,
                    'type_ani' => $type,
                    'pedigree' => $pedigree,
                    'jouet' => $jouet,
                    'betise' => $betise,
                    'plat' => $plat,
                    'place' => $place,
                    'date' => $datee,
                    'id_prop'=>$id_prop
                    ));
 
       
      //    echo 'L\'insertion s est bien déroulée !';
                 }
          }
      }

?>
</body>