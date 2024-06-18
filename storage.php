<?php
  session_start();
  if(!isset($_SESSION['adminLogged']))
      header('Location: index.php');
  include 'debug.php';
  include 'dbconfig.php'; 
  $conn = mysqli_connect($server, $user, $pass, $base);
  if (!$conn)
    die("Couldn't connect to database");
  $sql = "SELECT * FROM merch";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  
   
  mysqli_close($conn);
  
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
                  <a class="nav-link p-2 ms-4" aria-current="page" href="logout.php">Powrót na stronę główną</a>
                </li>
        </nav>     
    </header>
    <main class="containter">
      <div class="row ">
        <div class="col-3 bg-light rouded shadow mt-2">
          <a href="adminPanel.php"><h2>Zamówienia</h2></a>
          <div class="row">
          <h3>Dodaj Nowy Produkt</h3>
                <form action="addToStorage.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nazwa Produktu</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Rozmiar</label>
                        <input type="text" class="form-control" id="size" name="size" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Typ</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="jacket">Marynarka</option>
                            <option value="shirt">Koszule z krótkim rękawem</option>
                            <option value="suitShirt">Koszula</option>
                            <option value="t-shirt">Podkoszulki</option>
                            <option value="shorts">Spodenki</option>
                            <option value="jeans">Spodnie</option>
                            <option value="shoes">Buty</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Ilość</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Link do Obrazu</label>
                        <input type="text" class="form-control" id="img" name="img" required>
                    </div>
                    <div class="mb-3">
                        <label for="alt" class="form-label">Alternatywny Tekst Obrazu</label>
                        <input type="text" class="form-control" id="alt" name="alt" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Cena</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Dodaj Produkt</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
          </div>
        </div>
        <div class="col bg-light rouded shadow mt-2">
          <h2>Magazyn</h2>
          <?php
          echo'
            <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Nazwa</th>
                    <th>Rozmiar</th>
                    <th>Typ</th>
                    <th>Ilość</th>
                    <th>Cena</th>
                    <th>Obraz</th>
                    <th>Alternatywny tekst</th>
                </tr>
            </thead>
            <tbody>
        ';  
        while ($row = mysqli_fetch_assoc($result)){
          echo'<tr>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['size'].'</td>
                  <td>'.$row['type'].'</td>
                  <td>'.$row['quantity'].'</td>
                  <td>'.$row['price'].'</td>
                  <td>'.$row['img'].'</td>
                  <td>'.$row['alt'].'</td>
                  <td><a href="deleteFromStorage.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Usuń</button></a></td>
                  <td><a href="editStorage.php?id='.$row['id'].'"><button type="button" class="btn btn-primary">Edytuj</button></a></td>
                </tr>';



        }
        echo'</tbody> </table>';        
          ?>
        </div>
      </div>
    </main>



    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
  </body>
</html>