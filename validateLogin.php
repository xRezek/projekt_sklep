<?php
 require_once 'dbconfig.php';
 include_once 'debug.php';

 $conn = new  mysqli($server,$user,$pass,$base);


 
 

if(!$conn){
  die("Błąd połązczenia z bazą.");
}else{

  $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); 
  $password = $_POST['password'];
  $sql = "SELECT * FROM clients WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);
    

  if($result->num_rows == 1){
    $row = $result->fetch_assoc();
    session_start();
    
    $_SESSION['login'] = $row['login'];
    $_SESSION['id'] = $row['id'];
    header('Location: index.php');

    
  }else{
    die("Nie ma użytkownika o takich pasach.");
  }

  mysqli_close($conn);



  
}