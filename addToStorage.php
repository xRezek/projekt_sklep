<?php
 session_start();
 include 'debug.php';
 include 'dbconfig.php'; 
 $conn = mysqli_connect($server, $user, $pass, $base);
 if (!$conn)
   die("Couldn't connect to database");
   $name = $_POST['name'];
   $size = $_POST['size'];
   $type = $_POST['type'];
   $quantity = $_POST['quantity'];
   $img = $_POST['img'];
   $alt = $_POST['alt'];
   $price = $_POST['price'];
  mysqli_query($conn,"INSERT INTO merch (name, size, type, quantity, img, alt, price) VALUES ('$name', '$size', '$type', $quantity, '$img', '$alt', $price)");

  header('Location: storage.php');




  mysqli_close($conn);