<?php
require('php/user.class.php');
require('php/dbconnect.php');
?>
<!DOCTYPE html>
<html >
  <head>
    
    <title>Serie</title>
	 <link rel="stylesheet" type="text/css" href="css/style2.css">
	 
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
						
                         <li><a href="inscription.php">devenir membre</a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	<div  >
			
 <div> 
    
	<div class="Container">

               <div class="Results">
                 <table class="table">
                   
                    <tbody>
                      <tr>
                        <td> <img src="images/serie.png" Title="" width="180" height="180" /> 
<?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


 
$reponse = $bdd->query('SELECT titre_serie, MAX(note) FROM note_serie ');
while ($nt=$reponse->fetch()){
$titre_serie=$nt['titre_serie'];
$notemax=$nt['MAX(note)'];

}

$reponse1 = $bdd->query('SELECT *  FROM  serie where TITRE_SERIE="'.$titre_serie.'" ');
 

while ($donnees = $reponse1->fetch())
{
?> 
<td>
                        <h4>Titre:<?php  echo $titre_serie ?> </h4>
						<p>Pays:<?php  echo $donnees['PAYS']; ?> </p>
					 
						<p>Annee:<?php  echo $donnees['ANNEE']; ?></p>
						<p>Date creation:<?php  echo $donnees['DATE_CREATION']; ?> <p>

                         
						<?php  }?> 
					

                        <a href="listeindividus.php?TITRE_SERIE=<?php echo $titre_serie; ?>">★Liste des participants</a><br>
                        						
                        <a href="listepisodes.php?TITRE_SERIE=<?php echo $titre_serie; ?>">★Episodes disponibles</a>
 <td>
   
 

                      
	

						
						
                      
						</tr>
						
						
					 
                     </tbody>
                   </table>
				    </div>
				
     </div><!--Container -->
	 


  </body>
</html>
