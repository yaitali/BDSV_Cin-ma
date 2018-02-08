<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
require ('php/dbconnect.php');
require('php/user.class.php'); 

if(isset($_REQUEST['TITRE_EPISODE'])){

 $idp =$_REQUEST['TITRE_EPISODE'];

}

?>
<!DOCTYPE html>
<html >
  <head>
    
    <title>Episode</title>
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
						
                        <li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a><a href="deconnexion.php">/ Deconnecter</a></li>
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	
	<div class="Container">

        

               <div class="Results">
                 <table class="table">
                   
                    <tbody>
					<tr>
				
    
                        <td> <img src="images/serie.png" Title="" width="150" height="120" /> 

 <?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$idp=$_REQUEST['TITRE_EPISODE'];
 
$reponse = $bdd->query('SELECT * FROM episode where TITRE_EPISODE="'.$idp.'"');

while ($donnees = $reponse->fetch())
{
?>   
                  
                        <h3>Titre Serie:<?php  echo $donnees['TITRE_SERIE']; ?> </h3>
						<h4>Titre Episode:<?php echo $donnees['TITRE_EPISODE'];?> </h4>
						<p>Duree:<?php echo $donnees['DUREE'].'min'; ?> <p> 
						
						<p>Date diffusion:<?php echo $donnees['DATE_DIFFUSION']; ?> <p>
                        <p>Numero saison: <?php echo $donnees['NUMERO_SAISON']; ?></p>			
						
						
						
						<?php } ?>
						
					
								
<?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$ps= $_SESSION['username'];
 
$reponse = $bdd->query('SELECT id_utilisateurs FROM utilisateurs  where pseudo="'.$ps.'"');

while ($ds = $reponse->fetch()){

$id_utilisateur= $ds['id_utilisateurs']; 	
	
	

if (isset ($_GET['TITRE_EPISODE'])&& isset ($_GET['stars'])){
                 
				 $note = $_GET['stars'];
				 $id=$_GET['TITRE_EPISODE'];
$getVoteJoueur = $bdd->query("SELECT * FROM  note_episode WHERE id='".$id_utilisateur."'AND TITRE_episode ='".$idp."'");
if( $getVoteJoueur->fetch() !== false )
{  
echo 'vous avez deja noter la serie';

 }

 
 else
{
                $addnote = $bdd->prepare("INSERT INTO note_episode VALUES (?,?, ?)");
                $addnote->execute(array($id_utilisateur, $idp, $note));
                echo ' note :'  ; 
	            echo $note; echo '/10';				
    echo '<div id="infos"><p style="color:green;text-align:center;">Votre note a bien été pris en compte !</p></div>';     
}
}

$getNewsQuery = $bdd->query("SELECT * FROM `note_episode` WHERE  id='".$id_utilisateur."' AND TITRE_episode ='".$idp."' ");
if( $getNewsQuery->fetch() !== false )
{ 
   
 }
else
{
	echo 'Noter : ' ;
	echo '<div class="rating rating2">
           <a href="?TITRE_EPISODE'.$_GET['TITRE_EPISODE'].'&stars=10" title="Donner 10/10">★</a><!--
		--><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=9" title="Donner 9/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=8" title="Donner 8/10">★</a><!--
		--><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=7" title="Donner 7/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=6" title="Donner 6/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=5" title="Donner 5/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=4" title="Donner 4/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=3" title="Donner 3/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=2" title="Donner 2/10">★</a><!--
        --><a href="?TITRE_EPISODE='.$_GET['TITRE_EPISODE'].'&stars=1" title="Donner 1/10">★</a>
</div>';

   
}
?>

<?php } ?>

<?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$getNewsQuery1 = $bdd->query('SELECT avg (note ) as moyenne,TITRE_episode FROM `note_episode` where TITRE_episode="'.$idp.'" group by TITRE_episode ');
while ($moy = $getNewsQuery1->fetch()){
	
                 
				echo '	 Moyenne :'; echo $moy['moyenne'];
                     
				
	
	
}


?>



							
 
								</div>
						
						</td>
						
						
						
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
					   <td> </td>
                       
                        <td>
						<?php
try
{

$bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$idp=$_REQUEST['TITRE_EPISODE'];
 
$reponse = $bdd->query('SELECT * FROM episode where TITRE_EPISODE="'.$idp.'"');

while ($donnees = $reponse->fetch())
{
?>   
                  
						<p>Synopsis: </p>
						
                        <textarea rows="18" cols="25">  <?php echo $donnees['resume']; ?>
                        </textarea>

 
						</td>

						</tr>
						<tr>
						<td> 
                        <a href="listeindividus.php?TITRE_SERIE=<?php  echo $donnees['TITRE_SERIE']; ?>">Liste des participants</a><br>	
                         					
						</td>
                      </tr>	<?php } ?>
						

                     </tbody>
                   </table>
              

     </div><!--Container -->
    







  </body>
</html>
