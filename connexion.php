<?php
session_start();
require('php/dbconnect.php');

if(!empty($_POST)){
  extract($_POST);
  
  //2- crée 2 variables booleéns
  $error = false;
  $logged = true;
  
  
  //3- vérifier d'abbord si le nom d'utilisateur existe dans la BDD
  $user_test_sql = "SELECT * FROM utilisateurs WHERE pseudo=? ";
	$user_test = $db->prepare($user_test_sql);
	$user_test->execute(array($username));
	$num_res = $user_test->rowCount();
  if ($num_res==0) {
    $error = true;
    $logged = false;
    $erreur = " Nom d'Utilisateur Incorrect ! essaye une aure fois ";
  }else{
   foreach ($user_test as $users) {
     $dbpass = $users['mdp_utilisateur'];
     if (md5($_POST['password']) != $dbpass) {
       $error = true;
       $logged = false;
       $erreur = "password incorrect !";
     }//end if passwrd = $dbpass
   }//end foreash
 }//end else
  if ($logged) {
      $_SESSION['username'] = $username;
      $sql_id = "SELECT * FROM  utilisateurs  WHERE pseudo=?";
      $prep = $db->prepare($sql_id);
      $prep->execute(array($username));
      $userinfo = $prep->fetchAll(PDO::FETCH_OBJ);
      foreach($userinfo as $ids){
        $_SESSION['id_utilisateurs'] = $ids->id_utilisateurs;
		
      }
	 

     header('location:index1.php');
	
  }


}


?><!DOCTYPE html>
<html >
  <head>
    
    <title>S'authentifier</title>
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
                       
                        <li><a href="index.php"> Acceuil  </a></li>
                        <li><a href="connexion.php">Connexion</a></li>
                      
                        </ul>
                        </nav>
				      </div>	
                 </div>
    </header>  

 
    <!-- Formulaire de connexion-->

    <div class="form-connexion">

 

    <form action="" method="post">     
	<div class="form-group">
       <label for="exampleInputEmail1">Nom D'utilisateur</label>
       <input type="text" class="form-control" name="username" placeholder="Nom d'utilisateur">
     </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mot de passe</label>
    <input type="password" class="form-control" name="password" placeholder="Mot de passe">
  </div>
  
  <button type="submit" class="btn btn-info">Connecter</button>
   <a href="inscription.php"  >  Crée un compte</a>
   
</form>
<?php
if(isset($erreur)){
	echo '<font color="red">'.$erreur ;
}
?>
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

				<p>Company Name © 2017 </p>  
			</div>

</footer>








  </body>
</html>
