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


<ul id="menu">
	<li><a href="#">Accueil</a>
		
	</li>
	<li><a href="profil.php">Profil</a>
		
	</li>
	<li><a href="trouverutilisateur.php">TrouverUtilisateur</a>

	</li>
	
	<li><a href="listeseries.php">ToutesSerie</a>

	</li>
	<li><a href="#">Genre</a>
		<ul>

	
			<li><a href="affichagenre.php?id_genre=7"><a>Action </a> </li>
			<li><a href="affichagenre.php?id_genre=3"><a>Horreur</a></li>
			<li><a href="affichagenre.php?id_genre=6"><a>comique</a></li>
			<li><a href="affichagenre.php?id_genre=1"><a>Drame</a></li>
			<li><a href="affichagenre.php?id_genre=4"><a>thriller</a></li>
			<li><a href="affichagenre.php?id_genre=2"><a>Romance</a></li>
			<li><a href="affichagenre.php?id_genre=8"><a>Famillial</a></li>
			<li><a href="affichagenre.php?id_genre=9"><a>Guerre</a></li>
			<li><a href="affichagenre.php?id_genre=10"><a>Histoire</a></li>
		
		</ul>
	</li>
	
</ul>
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=cinema;charset=utf8','root','');

$articles = $bdd->query('SELECT *  FROM serie ORDER BY TITRE_SERIE,ANNEE,PAYS DESC');
if(isset($_GET['q']) AND !empty($_GET['q'])) {
   $q = htmlspecialchars($_GET['q']);
   $articles = $bdd->query('SELECT *  FROM serie WHERE TITRE_SERIE LIKE "%'.$q.'%" or ANNEE LIKE "%'.$q.'%" or PAYS LIKE "%'.$q.'%" ORDER BY TITRE_SERIE  DESC');
   if($articles->rowCount() == 0) {
      $articles = $bdd->query('SELECT *  FROM serie WHERE CONCAT(TITRE_SERIE,PAYS,ANNEE) LIKE "%'.$q.'%" ORDER BY TITRE_SERIE DESC');
   }
}
?>
	


<div id="recherche">
<form  id="searchthis" method="GET" >
<input id="search" name="q" type="text"  placeholder="Mot_Cles Series" />
<input id="search-btn" type="submit" value="Valider" /> 
</form>
</div> 

<?php if($articles->rowCount() > 0) {

			while($a = $articles->fetch()) {
			if(isset($_GET['q']) AND !empty($_GET['q'])) {	
			$identifiant=$a['TITRE_SERIE'];
			$annee=$a['ANNEE'];
			$date_creation=$a['DATE_CREATION'];
			$pays=$a['PAYS'];
		
				if(!isset($_REQUEST['TITRE_SERIE']) AND !isset($_REQUEST['ANNEE']) AND !isset($_REQUEST['PAYS'])){
						
				
                         header("location:affichageresultat.php?TITRE_SERIE=$identifiant & ANNEE=$annee ");
						}

                }  
}}else{
	$erreur=" aucun resultat trouver pour:".$q;
	echo '<font color="red">'.$erreur ; 
	
	}	
	

?>
  




   <div id="section_bnr">
	 
	 <div class="center">
         <p> Series à l'affiche </p>
     </div>
     <div id="banniere"> 
        <figure>
	
	<img src="images/im1.jpg">
	<img src="images/im2.jpg">
	<img src="images/im3.jpg">
	
	    </figure>
     
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

