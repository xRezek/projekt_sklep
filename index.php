<?php
  include 'dbconfig.php';
  include 'debug.php';
  $conn = @mysqli_connect($server,$user,$pass,$base);
  $query = "SELECT DISTINCT name, img, alt FROM merch ORDER BY id DESC LIMIT 6;";
  $result = mysqli_query($conn,$query);
  $rows = mysqli_fetch_all($result);
  
  
 // dump($rows);
  
  mysqli_close($conn);
  //exit;
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
                <a class="nav-link active p-2 ms-4" aria-current="page" href="#">Strona Główna</a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle p-2 ml-4 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Produkty
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Wszystko</a></li>
                  <li><a class="dropdown-item" href="#">Marynarka</a></li>
                  <li><a class="dropdown-item" href="#">Koszule z krótkim rękawem</a></li>
                  <li><a class="dropdown-item" href="#">Kouszula</a></li>
                  <li><a class="dropdown-item" href="#">Podkoszulki</a></li>
                  <li><a class="dropdown-item" href="#">Spodenki</a></li>
                  <li><a class="dropdown-item" href="#">Spodnie</a></li>
                  <li><a class="dropdown-item" href="#">Buty</a></li>
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
            <div class="nav-item p-2 d-flex"><a href="#" class="nav-link">Zaloguj się</a></div>
            <div class="nav-item p-2 d-flex"><a href="#" class="nav-link">Zarejestruj się</a></div>
            <div class="nav-item p-2 d-flex"><a href="#"><button class="d-flex btn-lg btn btn-light text-nowrap btn-outline-dark me-3"><i class="bi bi-bag"></i></button></a></div>
          </div>
        </div>
      </nav>
    
  </header>
  <!-- main -->
  <main class="container p-3">
    <div class="row gx-4">
      <div class="col-2 bg-light shadow-lg rounded">jfkadsh</div>
      
      <div class="col-8 bg-light shadow-lg rounded mx-4">
        <div class="row ">
          <div class="col h2">Co nowego?</div>
        </div>
        
        <div class="row p-2">  
          <div class="col-5 mx-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[0][1]?>" alt="<?= $rows[0][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[0][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[1][1]?>" alt="<?= $rows[1][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[1][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row p-2">  
          <div class="col-5 mx-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[2][1]?>" alt="<?= $rows[2][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[2][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[3][1]?>" alt="<?= $rows[3][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[3][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        <div class="row p-2">  
          <div class="col-5 mx-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[4][1]?>" alt="<?= $rows[4][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[4][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-5 card rounded shadow">
            <div class="card-body p-4"><img src="./images/<?=$rows[5][1]?>" alt="<?= $rows[5][2]?>" class="img-fluid d-block mx-auto mb-3">
              <h5> <a href="#" class="text-dark"><?= $rows[5][0]?></a></h5>
              <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
        
      </div>
      
      <div class="col-1  bg-light shadow-lg rounded">ajlsdfk</div>
    </div>
  </main>
  <footer class="container-fluid">
    <div class="row bg-black text-light">
      <div class="col">
        
      </div>
    </div>
  
  </footer>




  <script src="./scripts/bootstrap.bundle.min.js"></script>
  <script src="./scripts/app.js"></script>
  <script src="./scripts/jquery-3.7.1.min.js"></script>
</body>

</html>