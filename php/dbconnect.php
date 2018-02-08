<?php
$hostname = "localhost"; // change here, put your Hostname
$dbname = "cinema"; // change here, put your Database Name
$Username = "root"; // change here, put your Database Username
$Password = ""; // change here, put your Database Password


try {
  $db = new PDO("mysql:host={$hostname};dbname={$dbname}",$Username,$Password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
  echo 'Exception -> ';
  var_dump($e->getMessage());
}

?>
