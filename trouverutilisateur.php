<?php session_start();
require('php/user.class.php');
//cette page est accessible que pour les membres connecté:
if(!isset($_SESSION['username'])){
  header('Location: connexion.php');
}

if(!empty($_POST)){
  extract($_POST);
    if(!User::recherche($username)){
      $found = false;
      $error_not_found = "Aucun utilisateur n'est trouvé avec ce nom d'utilisateur : ".$username;
    }else{
      $found = true;
      $FoundUser = User::recherche($username);
    }
}
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 
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
	<li><a href="index1.php">Acceuil</a>
		
	</li>
	<li><a href="profil.php">Profil</a>
		
	</li>
	<li><a href="trouverutilisateur.php">Trouver un utilisateur</a>

	</li>
	
	<li><a href="boite_recep.php">Boite de reception</a>

	</li>
	<li><a href="envoi.php">Envoyer un message</a>
		
	</li>
	
</ul>

	
	<div class="Container">
        
<div class="MainWebsite">
<div class="Feeds">
              <div class="FindUser_tr">
                
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" class="form-control" name="username" placeholder="Taper le nom d'utilisateur ici"><br>
                <input type="submit"  value="Trouver" class="btn btn-info">
              </form>
              </div>
			
			
			
			  
		     <?php if(@$found){ ?>
             
			   <div class="Results_tr">
                 <table class="table">
                   <thead>
                     <tr>
                       
                       <th>Nom D'utilisateur</th>
                       <th>Date de naissance</th>
                       <th>Sexe</th>
                       <th>Photo</th>
					   <th>Contacter</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                       
                        <td><?php echo $FoundUser->pseudo;?></td>
                        <td><?php  echo $FoundUser->dt_naissance;?></td>
						<td><?php  echo $FoundUser->sexe;?></td>
                        <td><img src="<?php  echo $FoundUser->photo;?>" Title="<?php echo $FoundUser->pseudo;?>" width="120" height="120" /></td>
                        <td><a href="envoi.php">Envoyer Message</a> 
                        
                      </tr>

                     </tbody>
                   </table>
               </div>
			<?php } ?>
        </div>
  </div>
 </div>
    
    






 

  </body>
</html>
