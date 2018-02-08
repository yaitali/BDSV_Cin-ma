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

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}	
if (isset ($_GET['id_genre'])){
	$id_genre=$_GET['id_genre'];
}
$reponse = $bdd->query("SELECT titre_serie  FROM  est_du_genre  WHERE type='".$id_genre."'");	           
// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>


                      <tr>
                     <td><img src="images/serie.png" width="150" height="120" /></td>
						<td> <?php echo $donnees['titre_serie']; ?></td>
                        <td>
                        <?php 
                        $genre_serie= $donnees['titre_serie'];
                        $rep = $bdd->query('SELECT * FROM serie where TITRE_SERIE="'.$genre_serie.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['ANNEE'];  ?> 
						 
                        <?php  }?> 
		  

                       </td>
                        <td> 
						<?php 
                        $genre_serie= $donnees['titre_serie'];
                        $rep = $bdd->query('SELECT * FROM serie where TITRE_SERIE="'.$genre_serie.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['DATE_CREATION'];  ?> 
						 
                        <?php  }?> 
		  
						<td> 
						<?php 
                        $genre_serie= $donnees['titre_serie'];
                        $rep = $bdd->query('SELECT * FROM serie where TITRE_SERIE="'.$genre_serie.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['PAYS'];  ?> 
						 
                        <?php  }?> 
		  
    
	                 </tr>	


<?php
}

?> 

 
                    
					</tbody>
                   </table>
               






  </body>
</html>
