

<?php session_start();
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
require("php/user.class.php");
require('php/dbConnect.php');

if(isset($_REQUEST['id_utilisateurs'])){
  $idDest = $_REQUEST['id_utilisateurs'];
  $destination = User:: GetProfil($idDest);
}
if(!empty($_POST)){

  extract($_POST);
  $sql_test_user = "SELECT * FROM utilisateurs  WHERE pseudo=?";
  $prep = $db->prepare($sql_test_user);
  $prep->execute(array($Destination));
  $res = $prep->rowCount();
  if($res == 0){
    $error = true;
    $error_user = "L'utilisateur que vous avez introduit est introvuable";
  }
  else{
    $result = $prep->fetchAll(PDO::FETCH_OBJ);
    foreach($result as $res){
      $iddest = $res->id_utilisateurs;
    User::Envoi_Msg($_SESSION['id_utilisateurs'],$iddest,$msg_content);
    header('Location: envoi.php');
    }
  }

}
//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html >
  <head>
   
   <title>Forum</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script type="text/javascript">

    </script>
    <meta charset="utf-8">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
						
                        <li> <a href="profil.php"> Bienvenue: <?php echo $_SESSION['username']; ?> </a></li></br>
                        
                        <li><a href="deconnexion.php">Deconnexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

	<ul id="menu">
	<li><a href="index1.php">Acceuil</a>
		
	</li>
	<li><a href="profil.php">Profil</a>
		
	</li>
	<li><a href="trouverutilisateur.php">Trouver un utilisateur</a>

	</li>
	 <li><a href="boite_recep.php"   <span class="Count">(<?php echo User::NbrMessages($_SESSION['id_utilisateurs']); ?>)</span>  Boite de reception</a>

	</li>
	<li><a href="envoi.php">Envoyer un message</a>
		
	</li>
	
</ul>

	
	<div class="Container">

         <div class="MainWebsite">

<div id="contact-form">
	<div>
		 
		
	</div>
		<p id="failure">Oopsie...message not sent.</p>  
		<p id="success">Your message was sent successfully. Thank you!</p>

		  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<div>
		      <label for="name">
		      	<span class="required">Destinataire: *</span> 
		      	<input type="text" id="name" value="<?php if(isset($destination)){echo $destination->pseudo;}  ?>"  name="Destination" placeholder="nom du destinataire "   required="required" tabindex="1" autofocus="autofocus" />
		      </label> 
			</div>
			<div>
		      <label for="email">
		      	<span class="required">Titre du message: *</span>
		      	<input type="text" name="titre" placeholder="titre du message"  tabindex="2" required="required" />
		      </label>  
			</div>
			
			<div>		          
		      <label for="message">
		      	<span class="required">Message: *</span> 
		      	<textarea id="message" name="msg_content" placeholder="contenu" tabindex="5" required="required"></textarea> 
		      </label>  
			</div>
			<div>				
		        <button type="submit"  name="submit" id="submit"  onclick="envoyerMsg();">Envoyer</button>
                 <script type="text/javascript">
                 /*function envoyerMsg(){  
                  if (confirm ('Voulez vous vraiment envoyer ce message?')){
                     document.forms["mon_formulaire"].submit();
                         }
                              }*/
                 </script>
       
			</div>
			
		   </form>

	</div>
	
     </div>         

     </div><!--Container -->
    









  </body>
</html>
