<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
require ('php/dbconnect.php');
require('php/user.class.php'); 
if(isset($_REQUEST['id_utilisateurs'])){
  $id = $_REQUEST['id_utilisateurs'];
}
$id = $_SESSION['id_utilisateurs'];
$User_infos = User::AfficherProfil($id);

if(!empty($_POST)){
  extract($_POST);
  var_dump($_POST);
  $target_Path = 'pictures'; // definir le dossier géneral des fichies
  @$target_Path = $target_Path.'/'.basename( $_FILES['photo']['name'] );
  @move_uploaded_file( $_FILES['photo']['tmp_name'], $target_Path ); // pour mettre le fichier dans ça catégorie
  
 
  User::MiseAJours($id,$pseudonyme,$dt_naissance,$sexe,$target_Path);
  
 header("Location: profil.php");
  

}

?>

<!DOCTYPE html>
<html >
  <head>
    
    <title>profil utilisateur</title>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  </head>
  
  <body>
    
	
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
						
                        <li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a></li></br>
                        
                        <li><a href="deconnexion.php">Deconnexion</a></li>
                      
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  
	<div class="errosSignup">
  <?php if(isset($error_user)){echo  $error_user."<br/>";}
            

   ?>
</div>
	
 <div class="form-inscription">

 <?php if(!empty($User_infos)){ ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleInputEmail1">Pseudonyme</label>
        <input type="text" class="form-control" name="pseudonyme" placeholder="pseudonyme" value="<?php echo $User_infos->pseudo; ?>" required>
      </div>
      
	  
	  
      <div class="form-group">
        <label for="exampleInputEmail1">Date de naissance</label>
        <input type="date" class="form-control" name="dt_naissance" placeholder="Date de naissence" value="<?php echo $User_infos->dt_naissance; ?>" required>
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Photo de profil</label>
        <input type="file" class="form-control" name="photo">
      </div>
     <div class="form-group">
        <label for="exampleInputEmail1">Sexe</label>
         <input type="radio" name="sexe" value="male" checked> Homme
        <input type="radio" name="sexe" value="female"> Femme
      </div>
  <input type="text" hidden name="id" value="<?php echo $id; ?>">
  
   <button type="submit"  class="btn btn-info"   onclick="SoumettreFormulaire();">Mettre a jour</button>
  <button type="submit" class="btn btn-info"   onclick="RedirectionJavascript();">Annuler </button>
  <script type="text/javascript">
  function SoumettreFormulaire(){  
    if (confirm ('Voulez vous vraiment mettre a jour vos informations ? ')){
      document.forms["mon_formulaire"].submit();
    }
  }
  
  function RedirectionJavascript(){
        document.location.href="index1.php";
      }
  
</script>
  </form>
<?php  }?>
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

				<p>Company Name © 2017 </p>  
			</div>

</footer>

</body>
</html>
