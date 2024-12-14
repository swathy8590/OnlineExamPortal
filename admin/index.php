<?php
session_start();
if (isset($_SESSION['username'])) {
  header(("location:pages/dashbord"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/adminlogin.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid main image">

    <div class="row justify-content-center align-items-center pagemain">
      <div class="page "></div>
      <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-3 px-5 py-3 loginpage">
        <!-- <div class="round "></div> -->


        <div class="adminhead">
          <h3> ADMIN LOGIN</h3>
        </div>

        <form id="loginForm" method="post" action="lib/loginconnect.php">
          <!-- <div class="row mb-3 mt-5 ms-auto me-auto">
            <label for="inputEmail4" class="form-label">Username</label> -->
          <div class="col-sm-12 mt-4">
            <input type="text" placeholder="Username" class="form-control" id="inputEmail3" name="username">
          </div>
          <!-- </div> -->
          <!-- <div class="row mb-3 ms-auto me-auto">
            <label for="inputPassword4" class="form-label">Password</label> -->
          <div class="col-sm-12 mt-4">
            <input type="password" placeholder="Password" class="form-control" id="inputPassword3" name="password">
          </div>
          <!-- </div> -->
          <div class="d-grid gap-2 col-12 mx-auto  mt-4">
            <button class="btn btn-primary  signinbutton" type="submit" name="loginsubmit">Login</button>
          </div>
        </form>

        <!-- Message Display Area -->
        <div id="message" class="text-center mt-3"></div>


      </div>
    </div>
  </div>



  </div>

  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>



</body>

</html>