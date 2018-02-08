<?php
date_default_timezone_set("Europe/Paris");
class User{
    private $username = null;
    private $mdp_utilisateur = null;
    private $picture_url = null;
    private $dt_naissance = null;
    private $sexe = null;
	
	
    private $db = null;
   //autres informations;
    private $hostname = "localhost"; 
    private $dbname = "cinema"; 
    private $Username = "root"; 
    private $Password = ""; 

  

   function __construct($username,$dt_naissance,$sexe,$mdp_utilisateur,$picture_url){
     //constructeur
     $this->username = $username;
	 $this->dt_naissance = $dt_naissance;
	 $this->sexe = $sexe;
	 $this->mdp_utilisateur = $mdp_utilisateur;
	 $this->picture_url = $picture_url;

    
try{
     $db = new PDO("mysql:host={$this->hostname};dbname={$this->dbname}",$this->Username,$this->Password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     $this->db = $db;
     }
     catch (PDOException $e) {
       echo 'Exception -> ';
       var_dump($e->getMessage());
     }
   }//fin du constructeur

   function insert(){//methode pour inséré l'utilisateur
       $sql_register_user = "INSERT INTO utilisateurs (pseudo,dt_naissance,sexe,mdp_utilisateur,photo) VALUES(?,?,?,?,?)";
       $prepared_register_user= $this->db->prepare($sql_register_user);
       $prepared_register_user->execute(array($this->username,$this->dt_naissance,$this->sexe,$this->mdp_utilisateur,$this->picture_url));

   }//end function 
    
	
	 static function AfficherProfil($id){
     $db = new PDO("mysql:host=localhost;dbname=cinema","root",""); 
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     $sql_lst_prof = "select * from utilisateurs where id_utilisateurs=?";
     $prepared_lst_prof = $db->prepare($sql_lst_prof);
     $prepared_lst_prof->execute(array($id));

     $User = $prepared_lst_prof->fetchAll(PDO::FETCH_OBJ);

       foreach ($User as $user) {
         return $user;
       }
     }
	 
	 
	 //$pseudo,$sexe,$dt_naissance,$target_Path
	 
	 static function MiseAJours($id,$pseudonyme,$dt_naissance,$sexe,$picture_url){
     $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
    // pseudonyme,email,motPasse,photo,statut
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     $sql_query_update = "UPDATE utilisateurs  SET pseudo=?,dt_naissance=?,sexe=?,photo=? WHERE id_utilisateurs=?";
     $prepared_update = $db->prepare($sql_query_update);
     $prepared_update->execute(array($pseudonyme,$dt_naissance,$sexe,$picture_url,$id));



   }//end function
  

 

   
   public static function recherche($pseudonyme){//methode pour faire la recherche d'un utilisateur
      $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $sql_find_user = "SELECT * FROM utilisateurs WHERE pseudo=?";
      $prepared_find_user = $db->prepare($sql_find_user);
      $prepared_find_user->execute(array($pseudonyme));
      $num_res = $prepared_find_user->rowCount();
      $fountUser = $prepared_find_user->fetchAll(PDO::FETCH_OBJ);
      if($num_res == 0){
        return false;
      }else{
        foreach ($fountUser as $user) {
          return $user;
        }
      }
   }//end function
   
   
   
   
    static function Envoi_Msg($from,$to,$content){
    $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
    // pseudonyme,email,motPasse,photo,statut
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql_insert_msg1 = "INSERT INTO msgcnt(laDate,texte) VALUES(?,?)";
    $prep = $db->prepare($sql_insert_msg1);
    $prep->execute(array(date('Y-m-d H:i:s'),$content));

    $sql_insert_msg2 = "INSERT INTO msgcntp(idAuteur,idReceveur) values(?,?)";
    $prep2 = $db->prepare($sql_insert_msg2);
    $prep2->execute(array($from,$to));

  }

  static function NbrMessages($id){
    $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
   // pseudonyme,email,motPasse,photo,statut
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql_count = "select * from msgcntp where idReceveur =?";
    $prepared_count = $db->prepare($sql_count);
    $prepared_count->execute(array($id));
    return $prepared_count->rowCount();
  }

  static function Affiche_Msg($user_id){
    $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
   // pseudonyme,email,motPasse,photo,statut
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql_messages = "select * from msgcntp JOIN msgcnt where `msgcntp`.`idReceveur`=? AND `msgcnt`.`idMsg`=`msgcntp`.`idMsg`";
    $prepared_msg = $db->prepare($sql_messages);
    $prepared_msg->execute(array($user_id));
    return $prepared_msg->FetchAll(PDO::FETCH_OBJ);

  }

  /* Des méthodes pour la messagerie*/

  static function Info_Envoi($id1,$id2){
    $db = new PDO("mysql:host=localhost;dbname=cinema","root","");
   // pseudonyme,email,motPasse,photo,statut
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql_messages = "select * from `utilisateurs` JOIN `msgcntp` JOIN `msgcnt` WHERE `msgcnt`.`idMsg`=`msgcntp`.`idMsg` AND `utilisateurs`.`id_utilisateurs` =? AND `msgcntp`.`idReceveur` =? ORDER BY `msgcnt`.`laDate` DESC";
    $prepared_msg = $db->prepare($sql_messages);
    $prepared_msg->execute(array($id1,$id2));
    $num = $prepared_msg->rowCount();

    return $prepared_msg->FetchAll(PDO::FETCH_OBJ);

  }




}?>

