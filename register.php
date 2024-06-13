<?php
  session_start();
  include 'dbconfig.php';
  include 'debug.php';

  if(isset($_SESSION['login']))
    header('Location: index.php');
  ############################
  if(isset($_POST['email'])){
    // flaga walidacji
    $good = true;

    // Login check
    $login = $_POST['login'];
    if(strlen($login)<3 || strlen($login)>20){
      $good = false;
      $_SESSION['e_login'] ="Login musi posiadać od 3 do 20 znaków"; 
    }
  if(!ctype_alnum($login)){
      $good = false;
      $_SESSION['e_login'] = "Login może zawierać tylko cyfry i litery alfabetu łacińskiego ";
    }
  
    // e-mail check
    $email = $_POST['email'];
    $email_good = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($email_good,FILTER_VALIDATE_EMAIL) || $email_good != $email ){
        $good = false;
        $_SESSION['e_email'] = "Podaj poprawny adres e-mail";
    }
    // password check
    $password = $_POST['password'];
    $password_c = $_POST['password_confirm'];
    if(strlen($password) < 8 || strlen($password) > 20){
        $good = false;
        $_SESSION['e_password'] = "Hasło musi posiadać od 8 do 20 znaków";
    }
    if($password != $password_c){
        $good = false;
        $_SESSION['e_password_c'] = "Hasła muszą być identyczne";
    }
    // checkbox check
    if(!isset($_POST['iAgree'])){
      $good = false;
      $_SESSION['e_checkbox'] = "Zaakceptuj regulamin";
    }
    //address check
    $address = htmlentities($_POST['address'], ENT_QUOTES);

    
    try{
               
      $conn = new mysqli($server,$user,$pass,$base);
      if($conn->connect_errno!=0){
          throw new Exception(mysqli_connect_errno());
      }else{
          $result = $conn->query("SELECT id FROM clients WHERE email='$email'");
          if(!$result) throw new Exception($conn->error);
          $email_amount = $result->num_rows;
          if($email_amount>0){
              $good = false;
              $_SESSION['e_email'] = "Istnieje już konto o podanym adresie email";

          }
          // Login check
          $result = $conn->query("SELECT id FROM clients WHERE login='$login'");
          if(!$result) throw new Exception($conn->error);
          $login_amount = $result->num_rows;
          if($login_amount>0){
              $good = false;
              $_SESSION['e_login'] = "Istnieje już użytkownik o podanym loginie";

          }
          if($good==true){
              //it works!
              if($conn->query("INSERT INTO clients VALUES(NULL,'$email','$login',sha1($password), '$address')")){
                  $_SESSION['everythingIsGood'] = true;
                  header('Location: login.php');

              }else{
                  throw new Exception($conn->error);
              }
              
          }

          $conn->close();
      }

  }catch(Exception $e){
      echo "<span class='text-danger'> Błąd serewera. Przepraszamy za utrudnienia.</span>";
      echo $e;
  }
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
                  <a class="nav-link p-2 ms-4" aria-current="page" href="index.php">Strona Główna</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle p-2 ml-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produkty
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="listOfProducts.php?type=all">Wszystko</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=jacket">Marynarka</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=shirt">Koszule z krótkim rękawem</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=suitShirt"">Kouszula</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=t-shirt">Podkoszulki</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=shorts">Spodenki</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=jeans">Spodnie</a></li>
                    <li><a class="dropdown-item" href="listOfProducts.php?type=shoes">Buty</a></li>
                  </ul>
                <li class="nav-item">
                  <a class="nav-link p-2 ms-4" href="aboutUs.php">O Nas</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle p-2 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Kontakt
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="careers.php">Kariera</a></li>
                    <li><a class="dropdown-item" href="#">Wsparcie</a></li>
                  </ul>
                </li>
              </ul>
              <div class="nav-item p-2 d-flex"><a href="login.php" class="nav-link">Zaloguj się</a></div>
              <div class="nav-item  p-2 d-flex"><a href="#" class="nav-link active">Zarejestruj się</a></div>
              <div class="nav-item p-2 d-flex">
                <a href="#">
                  <button class="d-flex btn-lg btn btn-light text-nowrap btn-outline-dark me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-bag"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </nav>     
    </header>
<!-------------------Koszyk offcanvas-->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Koszyk</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div>
          <?php
            if(!isset($_SESSION['login'])){
              echo '<h3>Musisz się zalogować aby zobaczyć swój koszyk</h3>';
              
            }
            else{
              $conn = mysqli_connect($server,$user,$pass,$base);
              $cart_id = $_SESSION['id'];
              $queryCart = "SELECT m.name, m.size, m.img, m.alt, m.price, c.quantity, c.product_id FROM cart c JOIN merch m ON c.product_id = m.id JOIN clients cl ON c.client_id = cl.id WHERE cl.id = $cart_id";
              $resultCart = mysqli_query($conn,$queryCart);
              $numRows = mysqli_num_rows($resultCart);
              $sum = 0;
              
              
              
              mysqli_close($conn);
              
              
             
              while($rowsCart = mysqli_fetch_assoc($resultCart)):
                $sum += ($rowsCart['price'] * $rowsCart['quantity']);
              echo '
              <div class="card mb-3">
                  <div class="row g-0">
                      <div class="col-md-4 mt-5">
                          <img src="./images/' . $rowsCart['img'] . '" class="img-fluid rounded-start" alt="' . $rowsCart['alt'] . '">
                      </div>
                      <div class="col-md-8">
                          <div class="card-body">
                              <h5 class="card-title">' . $rowsCart['name'] . '</h5>
                              <p class="card-text">Rozmiar: ' . $rowsCart['size'] . '</p>
                              <p class="card-text">Cena: ' . $rowsCart['price'] . '</p>
                              <p class="card-text">Ilość: ' . $rowsCart['quantity'] . '</p>
                              <a href ="deleteCartItem.php?id='.$rowsCart['product_id'].'"><button class="btn btn-danger btn-sm">Usuń</button></a>
                          </div>
                      </div>
                  </div>
              </div>';
              
              endwhile;

              
              if($numRows>0){
                echo '<h4>SUMA: '.$sum.' zł</h4>';
                echo '<a class="text-center" href="summary.php"><button type="button" class="btn btn-dark btn-lg">Przejdź do podsumowania</button></a>';
              }else{
                echo '<h4>Brak produktów w koszyku</h4>';
              }
                          
            }
          ?>
        </div>      
      </div>
    </div>
<!------------------------------------------------>
    <!-- main -->
    <main class="container p-1">
<section class="bg-light py-1 py-md-3">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <a href="#!">
              <img src="./images/logo.jpg" alt="BootstrapBrain Logo" width="200" height="175">
              </a>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Podaj dane do rejestracji</h2>
            <form action="register.php" method="POST">
              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Login" required>
                    <label for="lastName" class="form-label">Login</label>
                    <?php 
                        if(isset($_SESSION['e_login'])){
                        echo "<span class='text-danger'>".$_SESSION['e_login']."</span>" ;
                        unset($_SESSION['e_login']);
                        }
                    ?>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="address" id="address" placeholder="ul. Polna 1, Sosnowiec, 22-333" required>
                    <label for="lastName" class="form-label">Adres (ulica , miasto , kod pocztowy)</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    <label for="email" class="form-label">Email</label>
                    <?php 
                        if(isset($_SESSION['e_email'])){
                        echo "<span class='text-danger'>".$_SESSION['e_email']."</span>" ;
                        unset($_SESSION['e_email']);
                        }
                    ?>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Hasło" required>
                    <label for="password" class="form-label">Hasło</label>
                    <?php 
                        if(isset($_SESSION['e_password'])){
                        echo "<span class='text-danger'>".$_SESSION['e_password']."</span>" ;
                        unset($_SESSION['e_password']);
                        }
                    ?>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="Potwierdź hasło" required>
                    <label for="password" class="form-label">Potwierdź hasło</label>
                  </div>
                  <?php 
                      if(isset($_SESSION['e_password_c'])){
                      echo "<span class='text-danger'>".$_SESSION['e_password_c']."</span>" ;
                      unset($_SESSION['e_password_c']);
                      }
                  ?>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                    <label class="form-check-label text-secondary" for="iAgree">
                      Akceptuję <a href="#!" class="link-dark text-decoration-none">regulamin</a>
                    </label><br>
                    <?php 
                        if(isset($_SESSION['e_checkbox'])){
                        echo "<span class='text-danger'>".$_SESSION['e_checkbox']."</span>" ;
                        unset($_SESSION['e_checkbox']);
                        }
                    ?>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-dark btn-lg" type="submit">Zarejestruj się</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Masz już konto? <a href="login.php" class="link-dark text-decoration-none">Zaloguj się</a></p>
                </div>
              </div>
            </form>
          </div>
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
