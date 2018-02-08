<?php session_start();
require('php/user.class.php');
//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
if(isset($_REQUEST['id_utilisateurs'])){
  $id = $_REQUEST['id_utilisateurs'];
}
else{
  $id = $_SESSION['id_utilisateurs'];
}
$User = User::AfficherProfil($id);
?><!DOCTYPE html>




<!DOCTYPE html>
<html >
  <head>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                        
						<li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a><a href="deconnexion.php">/ Deconnecter</a></li>
                       
                      
                        </nav>
				      </div>	
                 </div>
    </header>  

	
	
	<div class="Container">


        <div class="MainWebsite">

          <?php {?>
                <div class="Feeds">
                 <div class="Profil">
                  <img src="<?php echo $User->photo; ?>" title="<?php $User->pseudo; ?>" width="150" height="150" />
                  <h4>Nom D'utilisateur : <?php echo $User->pseudo; ?></h4>
                  <h4>Date de naissance : <?php echo $User->dt_naissance; ?></h4>
                  <p>Sexe : <?php echo $User->sexe; ?></p>
                  <?php if(!isset($_REQUEST['id_utilisateurs'])){ ?>
                 <a href="editprofil.php?id_utilisateurs=<?php echo $id; ?>">Modifier mes infos</a>
                    <?php } ?>
                </div>
          </div>

 <?php } ?>

        </div>
 
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
