<?php
  session_start();
  include 'debug.php';
  include 'dbconfig.php'; 
  $conn = mysqli_connect($server, $user, $pass, $base);
  if (!$conn)
    die("Couldn't connect to database");
  $sql = "SELECT * FROM merch where id=".$_GET['id'];
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
          <a href="storage.php"><h2>Magazyn</h2></a>
          </div>
        <div class="col bg-light rouded shadow mt-2">
        <div class="col-3">
                <h3>Edytuj Produkt</h3>
                <form action="updateStorage.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nazwa Produktu</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Rozmiar</label>
                        <input type="text" class="form-control" id="size" name="size" value="<?php echo $row['size']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Typ</label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="jacket" <?php if($row['type'] == 'jacket') echo 'selected'; ?>>Marynarka</option>
                            <option value="shirt" <?php if($row['type'] == 'shirt') echo 'selected'; ?>>Koszule z krótkim rękawem</option>
                            <option value="suitShirt" <?php if($row['type'] == 'suitShirt') echo 'selected'; ?>>Koszula</option>
                            <option value="t-shirt" <?php if($row['type'] == 't-shirt') echo 'selected'; ?>>Podkoszulki</option>
                            <option value="shorts" <?php if($row['type'] == 'shorts') echo 'selected'; ?>>Spodenki</option>
                            <option value="jeans" <?php if($row['type'] == 'jeans') echo 'selected'; ?>>Spodnie</option>
                            <option value="shoes" <?php if($row['type'] == 'shoes') echo 'selected'; ?>>Buty</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Ilość</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Link do Obrazu</label>
                        <input type="text" class="form-control" id="img" name="img" value="<?php echo $row['img']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alt" class="form-label">Alternatywny Tekst Obrazu</label>
                        <input type="text" class="form-control" id="alt" name="alt" value="<?php echo $row['alt']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Cena</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Zaktualizuj Produkt</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
    </main>



    <script src="./scripts/bootstrap.bundle.min.js"></script>
    <script src="./scripts/app.js"></script>
    <script src="./scripts/jquery-3.7.1.min.js"></script>
  </body>
</html>