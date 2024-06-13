<?php
 session_start();
 include 'dbconfig.php';
 include 'debug.php';


 $client_id = $_SESSION['cartClientId'];
 $product_id = $_SESSION['cartProductId'];
 $product_quantity = $_SESSION['cartProductQuantity'];
 $conn = mysqli_connect($server, $user, $pass, $base);
 

 
  $len = count($product_id);
  for($i=0;$i<$len;$i++) {
    mysqli_query($conn,"INSERT INTO orders(id,client_id,merch_id,quantity) VALUES(NULL, $client_id, $product_id[$i], $product_quantity[$i])");
  }
  mysqli_query($conn,"DELETE FROM cart WHERE client_id = $client_id");
  mysqli_close($conn);
  
  $session['order'] = '<div class="text-center bg-success-subtle text-body-emphasis fs-3"><h1>Zamówienie zostało złożone pomyślnie</h1></div>';
  header('Location: index.php');