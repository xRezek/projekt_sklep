<?php
  session_start();
  include 'debug.php';
  error_reporting(0);
  if(isset($_SESSION['login']))
    header('Location: index.php');
  include 'dbconfig.php'; 
    $adminLogin = $_POST['adminLogin'];
    $adminPassword = $_POST['adminPassword'];   
  if( $adminLogin =='admin' && $adminPassword =='admin'){
    $_SESSION['adminLogged'] = true;
    header('Location: adminPanel.php');
  }
  
?>
<!DOCTYPE html>
<html lang="pl-PL">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/clothes-rack.png"> <!-- <a https://www.flaticon.com/free-icons/clothes Clothes icons created by Freepik - Flaticon  -->
    <link rel="stylesheet" href="./css/clearstyle.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap-icons.min.css">
    <title>Projekt</title>
  </head>

  <body>
    <header>      
        <nav class="navbar nav-underline navbar-expand-lg bg-white ">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="img-fluid" width="70" length="70" src="./images/logo.jpg"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                  <a class="nav-link p-2 ms-4" aria-current="page" href="index.php">Powrót na stronę główną</a>
                </li>
        </nav>     
    </header>
    <!-- main -->
    <main class="container p-3">
    <section class="bg-light py-3 py-md-5">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <h1>Panel Admina</h1>
            </div>
            <form action="admin_login.php" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="adminLogin" id="adminLogin" placeholder="Login" required>
                    <label for="email" class="form-label">Login</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="adminPassword" id="adminPassword" value="" placeholder="Hasło" required>
                    <label for="password" class="form-label">Hasło</label>
                    
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-dark btn-lg" type="submit">Zaloguj się</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>




    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
  </body>
</html>