<?php session_start();
require('php/user.class.php');
//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
     <script type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
   <script type="text/javascript">
   function auto_load(){
      $.ajax({
        url: "data.php",
        cache: false,
        success: function(data){
           $("#auto_load_div").html(data);
        }
      });
}

$(document).ready(function(){
auto_load(); //Call auto_load() function when DOM is Ready
});
//Refresh auto_load() function after 10000 milliseconds
setInterval(auto_load,1000);
   </script>
    <link rel="stylesheet" href="css/style.css">

    <title>Boite de reception</title>
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

	<ul id="menu">
	<li><a href="index1.php">Acceuil</a>
		
	</li>
	<li><a href="profil.php">Profil</a>
		
	</li>
	<li><a href="trouverutilisateur.php">Trouver un utilisateur</a>

	</li>
	
	<li><a href="boite_recep.php"   <span class="Count">(<?php echo User::NbrMessages($_SESSION['id_utilisateurs']); ?>)</span>  Boite de reception</a>
   
	</li>
	<li><a href="envoi.php">Envoyer un message</a>
		
	</li>
	
</ul>
 
          <div id="center_bt">
                     <div id="auto_load_div"></div>
          </div><!--Feeds-->

        
     </div>
	






 </body>
</html>
