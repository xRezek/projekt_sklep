<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./images/cyberpunk.png">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>Projekt</title>
</head>
  <body>
    <div class="conrainer-fluid">
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
                  <a class="nav-link  p-2 ms-4" aria-current="page" href="index.php">Strona Główna</a>
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
                  <a class="nav-link active dropdown-toggle p-2 ms-4" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
        </div>      
      </div>
    </div>
<!------------------------------------------------>
    </div>
    

    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
  </body>
</html>