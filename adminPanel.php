<?php
  session_start();
  include 'debug.php';
  include 'dbconfig.php'; 
  $conn = mysqli_connect($server, $user, $pass, $base);
  $sql = "SELECT DISTINCT o.client_id, cl.login, cl.email, cl.address, m.name, m.size, m.price, o.quantity, (m.price * o.quantity) AS total_price FROM orders o JOIN merch m ON o.merch_id = m.id JOIN clients cl ON o.client_id = cl.id ORDER BY o.client_id";
  $resultOrder = mysqli_query($conn, $sql);
  $numRows = mysqli_num_rows(mysqli_query($conn,"SELECT  client_id FROM orders;"));
  
   
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
          <a href="storage.php"><h2>Magazyn</h2></a>
          </div>
        <div class="col bg-light rouded shadow mt-2">
          <h2>Zamówienia</h2>
          <?php
          if ($numRows > 0) {
            $current_login = null;

            // Wyświetlanie wyników
            while ($row = mysqli_fetch_assoc($resultOrder)) {
              
                if ($current_login !== $row['login']) {
                  
                    if ($current_login !== null) {
                      
                      echo '
                      <tr>
                        <td></td>
                        <td>Do zapłaty: '. $sumTotal .'zł</td>
                        <td><a href="confirmOrder.php?id='.$_POST['current_id'].'"><button class="btn btn-success"><i class="bi bi-check-lg"></i></button></a></td>
                        
                      </tr>';
                      $sumTotal = 0;
                        echo '
                            </tbody>
                        </table>
                        ';
                    }
                    $current_login = $row['login'];
                    $_POST['current_id'] = $row['client_id'];
                    $sumTotal = 0;
                    
                    echo '
                    <h3>Klient: ' . $row['login'] . '</h3>
                    <p>Adres: ' . $row['address'] . '</p>
                    <table class="table table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Product Name</th>
                                <th>Size</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';
                    
                }
                $sumTotal += $row['total_price'];
                echo '
                <tr>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['size'] . '</td>
                    <td>' . $row['quantity'] . '</td>
                    
                </tr>';
            }
            
            echo '
                      <tr>
                        <td></td>
                        <td>Do zapłaty: '. $sumTotal .'zł</td>
                        <td><a href="confirmOrder.php?id='.$_POST['current_id'].'"><button class="btn btn-success"><i class="bi bi-check-lg"></i></button></a></td>
                        
                      </tr>';
            // Zamknięcie ostatniej tabeli
            echo '
            
                </tbody>
            </table>';
        } else {
          echo '<p>Brak zamówień</p>';
      }
        
          ?>
        </div>
      </div>
    </main>



    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
  </body>
</html>