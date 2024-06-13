<?php
 include 'dbconfig.php';
 include 'debug.php';
 $conn = @mysqli_connect($server,$user,$pass,$base);
 $query = "SELECT * FROM merch WHERE img ='" . $_GET['product'] . "' LIMIT 1";
 $result = mysqli_query($conn,$query);
 $rows = mysqli_fetch_assoc($result);
 session_start();
 //dump($rows);
 //mysqli_close($conn);
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
    <link rel="apple-touch-icon" href="./img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="./img/favicon.ico">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/templatemo.css">
    <link rel="stylesheet" href="./css/custom.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./css/fontawesome.min.css">

    <link rel="stylesheet" type="text/css" href="./css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="./css/slick-theme.css">
    <title>Projekt</title>
  </head>

  <body style="background-color: #e9eef5;">
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
                  <a class="nav-link active p-2 ms-4" aria-current="page" href="index.php">Strona Główna</a>
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
              <?php if(isset($_SESSION['login'])):?>
                <div class="nav-item p-2 d-flex"><?= 'Witaj ' . $_SESSION['login'].' &#9787'?></div>
                <div class="nav-item p-2 d-flex"><a href="logout.php" class="nav-link">Wyloguj się</a></div>
              <?php else:?>
                <div class="nav-item p-2 d-flex"><a href="login.php" class="nav-link">Zaloguj się</a></div>
                <div class="nav-item p-2 d-flex"><a href="register.php" class="nav-link">Zarejestruj się</a></div>
              <?php endif;?>  
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
    <!-- main -------------------------------->
    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="<?='./images/'. $rows['img'] ?>" alt="<?= $rows['alt']?>" id="product-detail">
                    </div>
                    
                </div>
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2"><?= $rows['name']?></h1>
                            <p class="h3 py-2"><?= $rows['price']. ' zł'?></p>
                            <form action="addToCart.php" method="GET">
                                <input type="hidden" name="product-title" value="<?= $rows['img']?>">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Size:
                                                <input type="hidden" name="product-size" id="product-size" value="M">
                                            </li>
                                            <?php if($rows['type']!='shoes'): ?>
                                              <li class="list-inline-item"><span class="btn btn-secondary btn-size">M</span></li>
                                              <li class="list-inline-item"><span class="btn btn-secondary btn-size">L</span></li>
                                            <?php else: ?>
                                              <li class="list-inline-item"><span class="btn btn-secondary btn-size">41</span></li>
                                              <li class="list-inline-item"><span class="btn btn-secondary btn-size">42</span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Quantity:
                                                <input type="hidden" name="product-quantity" id="product-quantity" value="1">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-dark" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-dark" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                   
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-dark btn-lg" name="submit" value="addtocard">Dodaj do koszyka</button>
                                        <?php if(isset($_SESSION['statement'])):
                                        echo $_SESSION['statement'];
                                        unset($_SESSION['statement']);
                                        endif;
                                      ?>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------------------->
    <footer class="container-fluid footer-bg shadow fixed-bottom ">
      <div class="row grey-bg ">
        <div class="col-4 footer-bg text-center p-3">
          <?= "Projekt&copy " . date('Y');  ?>
        </div>
        <div class="col-4 text-center footer-bg">
          <h6>Social media:</h6>
          <p><i class="bi bi-facebook"></i> <i class="bi bi-tiktok"></i> <i class="bi bi-instagram"></i> <i class="bi bi-youtube"></i></p>
        </div>
        <div class="col-4  text-center footer-bg">
        <a href="admin_login.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Panel administratora</a>
        </div>
      </div>
    
    </footer>




    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
    <script src="./scripts/templatemo.js"></script>
  </body>
</html>