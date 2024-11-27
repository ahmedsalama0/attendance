<?php 
  $host = '127.0.0.1'; // or localhost
  $db = 'attendance_db';
  $user = 'root'; // Deault of XAMPP
  $pass = '';
  $charset = 'utf8mb4';

  // dsn -> Data Src Name (Connector)::>>Establishing a connection.
  $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
  
  try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo 'Hello Database';
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage());
    // echo "<h1 class='text-danger'>No Database Found</h1>";
  }

  // after setting up a successful connection.
  require_once 'crud.php';
  $crud = new Crud($pdo);
  
?>