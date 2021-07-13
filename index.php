<?php
session_start();
include_once "config/koneksi.php";
include_once "models/m_database.php";
$connection = new Databases($host,$user,$password,$db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/jQuery.dataTables.min.css">
    <title>Belajar OOP</title>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.bundle.min.js"></script>
    <script src="assets/jQuery.dataTables.min.js"></script>
    <script src="assets/sweetalert2.all.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
  <div class="container-fluid">
    <a class="navbar-brand" href="?hal=dashboard" style="font-size: 30px;font-weight: bold;">Belajar OOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse float-md-end" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll ms-right" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a <?php echo @$_GET['hal'] == 'dashboard' ? 'class="nav-link active"' : 'class="nav-link"'; ?> aria-current="page" href="?hal=dashboard">Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a <?= @$_GET['hal'] == 'product' || @$_GET['hal'] == 'transaction' || @$_GET['logout'] == '1' ? 'class="nav-link dropdown-toggle active"' : 'class="nav-link dropdown-toggle"'; ?> href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Link
          </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a <?= @$_GET['hal'] == 'product' ? 'class="dropdown-item active"' : 'class="dropdown-item"'; ?> href="?hal=product">Product</a></li>
                <li><a <?= @$_GET['hal'] == 'transaction' ? 'class="dropdown-item active"' : 'class="dropdown-item"'; ?> href="?hal=transaction">Transaction</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a <?= @$_GET['logout'] == '1' ? 'class="dropdown-item active"' : 'class="dropdown-item"'; ?> href="?logout=1">Log Out</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
  </div>
</nav>

<!-- content -->
<!-- <div class="container"> -->


      <?php if(@$_GET['hal'] == 'dashboard' || @$_GET['hal'] == '') { ?>
        <?php include_once "views/dashboard.php"; ?>
      <?php }elseif(@$_GET['hal'] == 'product' ) { ?>
        <?php include_once "views/product.php"; ?>
      <?php } ?>
      
<!-- </div> -->
       
      <script>
        $(document).ready( function () {
          $('#dataTable').DataTable({
            lengthMenu: [
              [5, 25, 50, -1],
              [5, 25, 50, "All"]
            ], 
          });
        });
        </script>

</body>
</html>