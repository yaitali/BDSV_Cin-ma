<?php
 session_start();
require('php/user.class.php');
//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}

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
						
                        <li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a><a href="deconnexion.php">/ Deconnecter</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	
    
	

 <div >
			
 <div>       
<div class="Container">

        
               <div class="Results">
			  
                 <table class="table">
                   
                    <tbody>
                      <tr>
 
                       <td> <img src="images/serie.png" Title="" width="190" height="220" /> </td> 
					   
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

$id = $_REQUEST['TITRE_SERIE'];
 
$reponse = $bdd->query('SELECT * FROM serie where TITRE_SERIE="'.$id.'"');

while ($donnees = $reponse->fetch())
{
?> 
                        <h1>Titre:<?php  echo $id ?> </h1>
						<p>Annee de sortie:<?php  echo $donnees['ANNEE']; ?></p>
						<p>Date creation:<?php  echo $donnees['DATE_CREATION']; ?> <p>
                        <p>Pays:<?php  echo $donnees['PAYS']; ?> </p>
                       
						
						
						<?php  }?>

						
						
						
						

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
$getNewsQuery1 = $bdd->query('SELECT avg (note ) as moyenne,titre_serie FROM `note_serie` where titre_serie="'.$id.'" group by titre_serie ');
while ($moy = $getNewsQuery1->fetch()){
	
                 
				echo '	 Moyenne :'; echo $moy['moyenne'];
 
}

?>	
<br>
                      
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

if (isset ($_GET['TITRE_SERIE'])&& isset ($_GET['stars'])){
                $note = $_GET['stars'];
				$id=$_GET['TITRE_SERIE'];
				$getVoteJoueur = $bdd->query("SELECT * FROM  note_serie WHERE id='".$id_utilisateur."'AND titre_serie ='".$id."'");
				if( $getVoteJoueur->fetch() !== false )
				{ 
                  echo 'vous avez deja voter';
				  	
	 
	            }
				 
	 
				else
					{
                $addnote = $bdd->prepare("INSERT INTO note_serie VALUES (?,?, ?)");
                $addnote->execute(array($id_utilisateur, $id, $note));  
                echo ' note :'  ; 
	            echo $note; echo '/10';
	            			
				echo '<div id="infos"><p style="color:green;text-align:center;">Votre note a bien été pris en compte !</p></div>';     
					}
                   }

$getNewsQuery = $bdd->query("SELECT * FROM `note_serie` WHERE  id='".$id_utilisateur."' AND titre_serie ='".$id."'");

if( $getNewsQuery->fetch() !== false )
{ 
  

  
 }
else
{

   
    echo 'Noter :'; 
	echo '<div class="rating rating2">
           <a href="?TITRE_SERIE'.$_GET['TITRE_SERIE'].'&stars=10" title="Donner 10/10">★</a><!--
		--><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=9" title="Donner 9/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=8" title="Donner 8/10">★</a><!--
		--><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=7" title="Donner 7/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=6" title="Donner 6/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=5" title="Donner 5/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=4" title="Donner 4/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=3" title="Donner 3/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=2" title="Donner 2/10">★</a><!--
        --><a href="?TITRE_SERIE='.$_GET['TITRE_SERIE'].'&stars=1" title="Donner 1/10">★</a>
</div>';
}
  

?>

<?php } ?>

					


						</td>
						
                       <td> 

<?php
$bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema;charset=utf8','root','');

if(isset($_GET['TITRE_SERIE']) AND !empty($_GET['TITRE_SERIE'])) {
	
   $id = $_GET['TITRE_SERIE'];

   $article = $bdd->prepare('SELECT * FROM serie  WHERE TITRE_SERIE = "'.$id.'"');
   $article->execute(array($id));
   $article = $article->fetch();
   if(isset($_POST['submit_commentaire'])) {
      if(isset($_POST['pseudo'],$_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])) {
         $pseudo = htmlspecialchars($_POST['pseudo']);
         $commentaire = htmlspecialchars($_POST['commentaire']);
         if(strlen($pseudo) < 25) {
            $ins = $bdd->prepare('INSERT INTO commentaires (PSEUDO, COMMENTAIRE,id_serie,date_commentaire) VALUES (?,?,?,now())');
            $ins->execute(array($pseudo,$commentaire,$id));
            $c_msg = "<span style='color:green'>commentaire posté!!</span>";
         } else {
            $c_msg = "Erreur: Le pseudo doit faire moins de 25 caractères";
         }
      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
   $commentaires = $bdd->prepare('SELECT * FROM commentaires WHERE id_serie = ? ');
   $commentaires->execute(array($id));
   
?>						
	
<br /><br />
<div id="contact-form">
	<div>
	
		
	</div>
		

		   <form method="POST" >
			<div>
		     Pseudo: *</br> 
		     <input type="text" id="name"  name="pseudo" value="" placeholder="votre pseudo" required="required" tabindex="1" autofocus="autofocus" />
		    
			</div>
		
			<div>		          
		     Commentaire: </br> 
		     <textarea  cols="22"  rows="6" id="message"  name="commentaire" placeholder="commentaire " tabindex="2" required="required"></textarea> 
		      
			</div>
			<div>		           
		      <button type="submit" name="submit_commentaire" value="Poster"   class="btn btn-info"> Poster</button>
			 
			</div>
		   </form>
          
	</div>
<?php if(isset($c_msg)) { echo $c_msg; } ?>

<?php while($c = $commentaires->fetch()) { ?>
 

<?php } ?>
<?php
}
?>
 <button type="submit" class="btn btn-info" ><a href="envoi.php?TITRE_SERIE=<?php echo $id; ?>"/>Forum</button>
						
						</td>
						
						</tr>
						
						<tr>
						<td>
						
						
						
						</td>
						<td> 
						<a href="commentaire.php?commentaire=<?php echo $c['COMMENTAIRE'];?> & pseudo=<?php echo $c['PSEUDO'];?> & TITRE_SERIE=<?php echo $id; ?>" title="Afficher les commentaire">★Liste commentaire</a><br>
                        <a href="listeindividus.php?TITRE_SERIE=<?php echo $id; ?>">★Liste des participants</a><br>						
                        <a href="listepisodes.php?TITRE_SERIE=<?php echo $id; ?>">★Episodes disponibles</a>
						</td>
						 						 
                         </tr>
					 
                     </tbody>
                   </table>
		</div>

</div>		
     
	 


  </body>
</html>
