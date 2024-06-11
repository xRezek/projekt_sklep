<?php
 include 'dbconfig.php';
 include 'debug.php';
 $conn = mysqli_connect($server,$user,$pass,$base);
 dump($_GET);
 $deleteParameter = isset($_GET['id']) ? $_GET['id'] : $_GET['product_id'];
 $query = "DELETE FROM cart WHERE product_id=". $deleteParameter.";";
 mysqli_query($conn,$query);
 mysqli_close($conn);
 isset($_GET['page']) ?  header('Location: summary.php?page=summary') : header('Location: index.php');
