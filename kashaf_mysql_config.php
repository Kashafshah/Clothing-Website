<?php
$servername = "localhost";
$username = "root";
$password = "GJhkJB4.o4ZyELak";

try {
  $connection = new PDO("mysql:host=$servername;dbname=website", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>