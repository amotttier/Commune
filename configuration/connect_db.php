<?php
  try
  {
    $bdd = new PDO(
      'mysql:host=localhost;dbname=nphamang_mottier;charset=utf8',
      'nphamang_mottier',
      '1123581321LoL',
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>
