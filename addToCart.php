<?php
 include 'dbconfig.php';
 include 'debug.php';
 $conn = @mysqli_connect($server,$user,$pass,$base);
 $query = "SELECT * FROM merch WHERE img ='" . $_GET['product-title'] . "' LIMIT 1";
 $result = mysqli_query($conn,$query);
 $rows = mysqli_fetch_assoc($result);
 


  session_start();

  if (isset($_SESSION['login'])) {
    if(!$conn){
      die("Błąd połączenia z bazą za utrudnienienia przepraszamy");
    }else{
      $client_id = $_SESSION['id'];
      $product_id = $rows['id'];
      $quantity = $_GET['product-quantity'];
      $insertQuery = "INSERT INTO cart(id, client_id,product_id,quantity) VALUES(NULL,$client_id,$product_id,$quantity)";
      mysqli_query($conn,$insertQuery);
      $_SESSION['statement'] = "Produkt dodany pomyślnie";
      header('Location: product.php?product='.$_GET['product-title']);
    } 
      

    
  }else{
    $_SESSION['statement'] = "Zalgouj się aby dodać produkt do koszyka";
    header('Location: product.php?product='.$_GET['product-title']);
  } 
  mysqli_close($conn);