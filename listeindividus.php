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
    
    <title>liste individus</title>
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
 
			 
					 
					  <th>Photo</th>
                      <th>Nom </th>
                      <th>Prenom</th>
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

$id = $_REQUEST['TITRE_SERIE'];
 
$reponse = $bdd->query('SELECT * FROM participations where TITRE_SERIE="'.$id.'" ');

while ($donnees = $reponse->fetch())
{

?>
                      <tr>
                        <td><img src="images/profil.jpg" Title="" width="120" height="120" /></td>
						<td><?php 
                        $nom= $donnees['num_personnel'];
                        $rep = $bdd->query('SELECT * FROM staf where num_personnel="'.$nom.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['nom_personnel'];  ?> 
						 <a href="ficheindividu.php?num_personnel=<?php echo $nom; ?>">★Afficher★</a>
                        <?php  }?>  </td>
						
						<td><?php 
                        $nom= $donnees['num_personnel'];
                        $rep = $bdd->query('SELECT * FROM staf where num_personnel="'.$nom.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['prenom_personnel'];  ?> 

                        <?php  }?> </td>
						
                        <td><?php 
                        $nom= $donnees['num_personnel'];
                        $rep = $bdd->query('SELECT * FROM staf where num_personnel="'.$nom.'" ');
                        while ($don = $rep->fetch())
                        {?>
                        
                         <?php  echo $don['Statut'];  ?> 

                        <?php  }?></td>
                        <?php  }?>
                      </tr>
                     
                     </tbody>
                   </table>
				








  </body>
</html>
