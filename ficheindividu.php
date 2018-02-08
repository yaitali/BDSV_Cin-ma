<?php
require ('php/dbconnect.php');
require('php/user.class.php'); 

if(isset($_REQUEST['num_personnel'])){
 $num = $_REQUEST['num_personnel'];
 

}

?>
<!DOCTYPE html>
<html >
  <head>
    
    <title>fiche individu</title>
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
						
                        <li><a href="index1.php">Acceuil</a></li>
                        
                        <li><a href="deconnexion.php">Deconnexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	
	
	<div class="Container">

        <div class="MainWebsite">

          <div class="Feeds">
                <div class="Profil">
                  <img src="images/profil.jpg" width="150" height="150" />
				  
 <?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$num = $_REQUEST['num_personnel'];
 
$reponse = $bdd->query('SELECT * FROM staf where num_personnel="'.$num.'"');

while ($donnees = $reponse->fetch())
{
?>   
                  <h4>Nom :<?php  echo $donnees['nom_personnel']; ?> </h4>
                  <h4>Prenom :<?php  echo $donnees['prenom_personnel']; ?></h4>
                  <h4>Statut :<?php  echo $donnees['Statut']; ?> <h4> <?php  }?>
                 <a href="participations.php?num_personnel=<?php echo $num; ?>">liste des participations</a>
                
                </div>
          </div>


        </div>
     </div>

<footer class="footer">

			

			<div class="footer-centre">

				<p class="footer-links">
					<a href="index.php">Home</a>
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
