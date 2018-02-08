
<?php
require ('php/dbconnect.php');
require('php/user.class.php'); 

if(isset($_REQUEST['TITRE_SERIE'])){
 $id = $_REQUEST['TITRE_SERIE'];
 

}

?>
<!DOCTYPE html>
<html >
  <head>
    
    <title>Liste episodes</title>
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

	
	
	
                 <table class="table">
                   <thead>
                     <tr>
					  <th>Serie</th>
                      <th>Episode </th>
					  <th>Duree </th>
                      <th>Date diffusion</th>
					 
                      <th>Saison</th>
					  <th>Description</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                     	 <?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$id = $_REQUEST['TITRE_SERIE'];
 
$reponse = $bdd->query('SELECT * FROM episode where TITRE_SERIE="'.$id.'"');

while ($donnees = $reponse->fetch())
{
?>   

                      <tr>
					   
						<td> <?php echo $donnees['TITRE_SERIE']; ?></td>
                        <td> <?php echo $donnees['TITRE_EPISODE']; ?></td>
                        <td> <?php echo $donnees['DUREE'].'min'; ?></td>
						<td> <?php echo $donnees['DATE_DIFFUSION']; ?></td>
                        
						<td> <?php echo $donnees['NUMERO_SAISON']; ?></td>
						
<td><a href="episode.php?TITRE_EPISODE=<?php echo $donnees['TITRE_EPISODE']; ?> " > acceder à l'episode </a> </td>
                       
                      </tr>
<?php
}
?>
                    
                     </tbody>
                   </table>
               

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
