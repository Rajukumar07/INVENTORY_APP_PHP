<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>User Login</title>
</head>

<body>
  <div class="row" style="background-color: blue; margin: 10px;padding: 10px;color: white;">
    <h4>Inventory Management System</h4>
  </div>
  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <div class="form-des">
        <form action="login_backend.php" method="post">
          <h2>
            <center><u>Login Form</u></center>
          </h2><br><br>
          <span>USERNAME : </span>
          <input type="text" class="form-control" name="uname"><br>
          <span>PASSWORD : </span>
          <input type="password" class="form-control" name="pass"><br>
          <input type="submit" value="LOG-IN" class="form-control bg-success"><br>
        </form>
        <span>NEW USER ? </span><a href="signup.php">SIGN UP</a>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>