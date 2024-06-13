<?php
    session_start();
    include 'debug.php';
    include 'dbconfig.php'; 
    $conn = mysqli_connect($server, $user, $pass, $base);
    if (!$conn)
      die("Could not connect to server");
    dump($_GET);
    mysqli_query($conn,"DELETE FROM ORDERS WHERE client_id ='". $_GET["id"]."'");
  header('Location: adminPanel.php');