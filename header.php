<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inventory</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="Dashboard.php">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/inventory/itemlist.php">ITEMS</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="http://localhost/inventory/supplierlist.php">SUPPLIERS </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="http://localhost/inventory/purchase.php">PURCHASE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/inventory/sale.php">SALE</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              REPORTS
            </a>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item" href="http://localhost/inventory/purchase_report.php">PURCHASE REPORT</a></li>
              <li><a class="dropdown-item" href="http://localhost/inventory/sale_report.php">SALE REPORT</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="http://localhost/inventory/item_stock.php">STOCK</a>
          </li>

        </ul>
        <!-- <div class="d-flex   " >
          <a href="http://localhost/inventory/logout.php" class="btn btn-primary" type="submit">logout</a>
        </div> -->
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>