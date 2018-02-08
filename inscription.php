<?php
//faire appelle au fichier qui contien la connexion a notre BDD
require('php/dbconnect.php');

require('php/user.class.php'); // faire appelle a la clase User qui sert a faire les intérracions entre l'utilisateur et çes infos
 
if(!empty($_POST)){
extract($_POST);
  
  $error = false;
  //vérifier que le nom d'utilisateur introduit dans le formulaire n'existe pas dans la BDD
  $sql_test_username = "SELECT * FROM utilisateurs WHERE pseudo=?";
  $prepared_test = $db->prepare($sql_test_username);
  $prepared_test->execute(array($username));
  $num_result = $prepared_test->rowCount();
  if($num_result>=1){
    $error = true;
    $error_user = "le nom d'utilisateur que vous avez entrer existe déja !";
  }

  
  if(!$error){ // si y'a pas d'erreurs
    //uploader la photo dans le dossier des photos
   $target_Path = 'pictures'; // definir le dossier géneral des fichies
   @$target_Path = $target_Path.'/'.basename( $_FILES['photo']['name'] );
   @move_uploaded_file( $_FILES['photo']['tmp_name'], $target_Path ); // pour mettre le fichier dans ça catégorie
    //crée un objet de type User
	
    $user = new User($username,$dt_naissance, $sexe ,md5($mdp_utilisateur),$target_Path);

    //inserer l'utilisateur en utilisant la méthode qu'on a définie :
    $user->insert();
  
  }


}//end if (!empty post)
?>

<!DOCTYPE html>
<html>
  <head>
    
    <title> S'inscrire </title>
	
	 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 
  </head>
  
  <body>
    
	
</div>
   
	
    <header>
               
				<div id="titre_principal">
                     <div id="logo">
                        <img src="images/logo1.jpg" alt="Logo cinema" />
                        <h1>BDSV</h1>   
                    
                 
                      </div>
                    <h2>Series televisées </h2>
                     <div id="droite">
		
				        <nav>
                        <ul>
                       
                        <li><a href="index.php"> Acceuil  </a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  


	
	<div class="form-inscription">



    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Pseudonyme</label>
        <input type="text" class="form-control" name="username" placeholder="pseudonyme" >
      </div>
      
	  
	   <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" name="mdp_utilisateur" placeholder="Mot de passe" >
  </div>
	  
      <div class="form-group">
        <label for="exampleInputEmail1"> Date de naissence </label>
        <input type="date" class="form-control" name="dt_naissance" placeholder="Date de naissence" >
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Photo de profil</label>
        <input type="file" class="form-control" name="photo">
      </div>
     <div class="form-group">
        <label for="exampleInputEmail1">Sexe</label>
         <input type="radio" name="sexe" value="M" checked> Homme
        <input type="radio" name="sexe" value="F"> Femme
      </div>
  
   <button type="submit"  class="btn btn-info"   onclick="SoumettreFormulaire();">Enregistrer</button>
  <button type="submit" class="btn btn-info"   onclick="RedirectionJavascript();">Annuler </button>
  <script type="text/javascript">
  function SoumettreFormulaire(){  
    if (confirm ('Voulez vous vraiment valider le formulaire ? ')){
      document.forms["mon_formulaire"].submit();
    }
  }
  
  function RedirectionJavascript(){
        document.location.href="index.php";
      }
  
</script>
  
  
</form>
</div>

	
 
    

<footer class="footer">

			

			<div class="footer-centre">

				<p class="footer-links">
					<a href="#">Home</a>
					·
					<a href="#">About</a>
					·
					<a href="#">Faq</a>
					·
					<a href="#">Contact</a>
				</p>

				<p>Company Name © yasmina 2017 </p>  
			</div>

</footer>







</body>
</html>
