

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
                        
                        <li><a href="#">Deconnexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	
	 
          
            <table class="table">
                   <thead  >
                     <tr>
					  <th>Affiche</th>
                      <th>Titre serie </th>
					   <th>Annee </th>
                      <th>Date de creation</th>
					  <th>Payes d'origine</th>
					  
                      
                      </tr>
                    </thead>
                    <tbody>
                     
 <?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM serie');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>

                      <tr>
                     <td><img src="images/serie.png" width="150" height="120" /></td>
						<td> <?php echo $donnees['TITRE_SERIE']; ?></td>
                        <td> <?php echo $donnees['ANNEE']; ?></td>
                        <td> <?php echo $donnees['DATE_CREATION']; ?></td>
						<td> <?php echo $donnees['PAYS']; ?></td>
						
                       
    
	</tr>	
	<?php
}



?>

                     
                     </tbody>
                   </table>
               






  </body>
</html>
