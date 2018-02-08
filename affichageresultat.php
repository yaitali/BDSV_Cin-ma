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
    
    <title>Liste Series</title>
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
						
                        <li><a href="index.php">Acceuil</a></li>
                        
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
					  <th>Affiche</th>
                      <th>Titre serie </th>
					  <th>Annee </th>
                      <th>Date de creation</th>
					  <th>Payes d'origine</th>
					  <th>Appreciation</th>
					  <th>Regarder</th>
                      </tr>
                    </thead>
                    <tbody>
		
                      <tr>
                     <td><img src="images/serie.png" width="150" height="120" /></td>
							
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
 
$reponse = $bdd->query('SELECT * FROM serie where TITRE_SERIE="'.$id.'"');

while ($donnees = $reponse->fetch())
{
?>   
						<td><?php  echo $id  ?>  </td>		
                        <td><?php  echo $donnees['ANNEE']; ?> </td>
                        <td> <?php echo $donnees['DATE_CREATION']; ?></td>
						<td><?php  echo $donnees['PAYS']; ?></td>
						<td>
<?php

$nt = $bdd->query('SELECT avg (note ) as moyenne,titre_serie FROM `note_serie` where titre_serie="'.$id.'" group by titre_serie ');

while ($moy = $nt->fetch()){
	
                 
				echo $moy['moyenne'];echo '/10';
 
}

?>	


						</td>	
						<td>  <a href="serie.php?TITRE_SERIE=<?php echo $id; ?> " >★Afficher★</a></td>	
						 <?php  }?>
                      </tr>	
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
