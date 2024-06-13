<?php
 session_start();
 include 'debug.php';
 include 'dbconfig.php'; 
 $conn = mysqli_connect($server, $user, $pass, $base);
 if (!$conn)
   die("Couldn't connect to database");
 $id = $_POST['id'];
 $name = $_POST['name'];
 $size = $_POST['size'];
 $type = $_POST['type'];
 $quantity = $_POST['quantity'];
 $img = $_POST['img'];
 $alt = $_POST['alt'];
 $price = $_POST['price'];
   
 $query = "UPDATE merch SET name='$name', size='$size', type='$type', quantity=$quantity, img='$img', alt='$alt', price=$price WHERE id=$id";

 mysqli_query($conn,$query);

  header('Location: storage.php');




  mysqli_close($conn);