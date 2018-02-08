<?php
//logout code goes here
session_start();
if(isset($_SESSION['username'])){
  session_destroy();
 include("index.php");
}
?>
