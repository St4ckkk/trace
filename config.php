<?php
$username = "root"; // username
$password = ""; // password of the database
$hostname = "localhost"; // host of the database
$database = "trace"; // name of th  e database

// Attempt to connect to the database
try
 {
  $bdd = new PDO('mysql:host='.$hostname.';dbname='.$database.'', $username, $password);
 }
  catch (Exception $e)
 {
  // If an error is thrown, display the message
  die('Error : ' . $e->getMessage());
 }
 ?>