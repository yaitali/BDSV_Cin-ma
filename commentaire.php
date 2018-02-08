<?php
 session_start();

//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}

?>
<?php
require ('php/dbconnect.php');
require('php/user.class.php'); 

if(isset($_REQUEST['commentaire']) AND isset($_REQUEST['pseudo']) AND isset($_REQUEST['TITRE_SERIE'])){
 $serie=$_REQUEST['TITRE_SERIE'];
 $pss = $_REQUEST['pseudo'];
 $cm = $_REQUEST['commentaire'];
 

}

?>

<!DOCTYPE html">
<html >
  <head>
    
    <title>site web cinema</title>
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
                        <li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a><a href="deconnexion.php">/ Deconnecter</a></li>
                        </ul>
                        </nav>
				      </div>	
                 </div>
  </header> 
  
  <div id="cmm">
  <h2> Espace commentaire </h2>
 <h3> <?php echo $serie; ?></h3>
 
 </div>
  <table class="table">
                   <thead>
                     <tr>
					  
                      <th>Pseudo </th>
					  <th>Commentaire </th>
					   <th>Date du commentaire </th>
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

$serie = $_REQUEST['TITRE_SERIE'];
 
$reponse = $bdd->query('SELECT * FROM commentaires where id_serie="'.$serie.'"');

while ($donnees = $reponse->fetch())
{
?>   
<tr>
 
					   
						
                        <td> <?php echo $donnees['PSEUDO']; ?></td>
						<td> <?php echo $donnees['COMMENTAIRE']; ?></td>
						<td> <?php echo $donnees['date_commentaire']; ?></td>
						
</tr>
 
<?php
}
?>
</tbody>
 </table>
                      








    

<span> <?php echo $pss; ?></span>


  <b><?= $pss; ?>:</b> <?= $cm; ?><br />
 

<div class="commentaire">
	
<div class="titre_serie">	
 
 
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

				<p>Company Name © YASMINA 2017 </p>  
			</div>

</footer>

	 
	 
	 
	 
	 
	 
	 
	 
   
  
        
	
	  </body>
 
</html>

  


