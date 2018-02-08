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
    
    <title>participations</title>
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

               <div class="Results">
                 <table class="table">
                   <thead>
                     <tr>  
                      <th>Nom </th>
                      <th>Prenom</th>
					  <th>Serie </th>
                      <th>Role</th>
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

$num = $_REQUEST['num_personnel'];
 
$reponse = $bdd->query('SELECT * FROM staf where num_personnel="'.$num.'"');

while ($donnees = $reponse->fetch())
{
?> 
                      <tr>
                        <td><?php  echo $donnees['nom_personnel']; ?></td>
						<td><?php  echo $donnees['prenom_personnel']; ?></td>
                        <td>
						<?php 
                        $ttr= $donnees['num_personnel'];
                        $rep = $bdd->query('SELECT * FROM participations where num_personnel="'.$ttr.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['TITRE_SERIE'];  ?> 

                        <?php  }?>
						
						</td>
						<td><?php  echo $donnees['Statut']; ?></td>
                        
                       
                      </tr><?php  }?>
                     
                     </tbody>
                   </table>
               </div>

        </div>

     </div><!--Container -->
    

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
