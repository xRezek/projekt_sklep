<?php
 session_start();
 include 'debug.php';
 include 'dbconfig.php'; 
 $conn = mysqli_connect($server, $user, $pass, $base);
 if (!$conn)
   die("Couldn't connect to database");

 mysqli_query($conn,"DELETE FROM merch WHERE id=". $_GET['id']);

  header('Location: storage.php');




  mysqli_close($conn);