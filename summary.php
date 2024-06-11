<?php
  session_start();
  if(!isset($_SESSION['login'])){
    header('Location: index.php');
    }
  include 'dbconfig.php';
  include 'debug.php';
  $conn = @mysqli_connect($server,$user,$pass,$base);
  $cart_id = $_SESSION['id'];
  $query = "SELECT m.name, m.size, m.img, m.alt, m.price, c.quantity, c.product_id, c.client_id, (m.price * c.quantity) AS total_price FROM cart c JOIN merch m ON c.product_id = m.id JOIN clients cl ON c.client_id = cl.id WHERE cl.id = $cart_id";
  $result = mysqli_query($conn,$query);
  
  
  
  
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
                <div class="nav-item p-2 d-flex"><a href="#" class="nav-link">Zarejestruj się</a></div>
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
                dump($rowsCart);
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
              }
                          
            }
          ?>
        </div>      
      </div>
    </div>
<!------------------------------------------------>
    <!-- main -->
    <main class="container p-3">
      <div class="row gx-4">
      <div class="row ">
            <div class="col h2">Podsumowanie</div>
          </div>
        <div class="col-2 ">
          
        </div>
        
        <div class="col-md-8 bg-light shadow rounded mx-4">
          <div class="row p-2 "> 
            <?php
            if(!$numRows)
            echo '<h3>Brak produktów w koszyku</h3>';
            ?>
            <?php 

            
              $_SESSION['cartProductId'] = [];
              $_SESSION['cartProductQuantity'] = [];
               
            
              while($rows = mysqli_fetch_assoc($result)): 
              array_push($_SESSION['cartProductId'], $rows['product_id']);
              array_push($_SESSION['cartProductQuantity'], $rows['quantity']);
              $_SESSION['cartClientId'] = $rows['client_id'];
              //dump($_SESSION['cartProductQuantity']);
              ?>  
                   
                <div class="col-md-4 card  mb-2 rounded shadow">
                  <div class="card-body p-4"><img src="./images/<?=$rows['img']?>" alt="<?= $rows['alt']?>" class="img-fluid d-block mx-auto mb-3">
                    <h5> <a href="product.php?product=<?= $rows['img']?>" class="text-dark"><?= $rows['name']?></a></h5>
                    <p class="small  font-italic  fs-5 ">Cena: <?= $rows['price'] . " zł"?> <a href ="deleteCartItem.php?id=<?=$rows['product_id']?>&page=summary"><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></a></p>
                    <p class="small  font-italic  fs-5 ">Ilość: <?= $rows['quantity']?></p> 
                    <p class="small  font-italic  fs-5 ">Rozmiar: <?= $rows['size']?></p> 
                  </div>
                </div>
            <?php  endwhile; 
            if($numRows):?>
            <?= '<h4>SUMA: '.$sum.' zł</h4>';?>
            <a href="makeOrder.php"><button type="button" class="btn btn-dark btn-lg">Złóż zamówienie</button></a>
            <?php endif;?>
          </div>
          <a href="addToOrders.php"></a>
        </div>   
        
        <div class="col-1"></div>
      </div>
    </main>
    <footer class="container-fluid footer-bg shadow <?php  if($numRows <= 3) echo 'fixed-bottom';?>">
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
  </body>
</html>