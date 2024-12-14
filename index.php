<?php


require('query.php');
$data = $user->selectsub();



$message = "";
if (isset($_SESSION['pass_meassage'])) {
  $message =  $_SESSION['pass_meassage'];
}

// if (isset($_SESSION['login_error'])) {
//   $message =  $_SESSION['login_error'];
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/loginstyle.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <div class="container-fluid main image">

    <!-- <img src="images/image.jpg" class="w-100 h-100" /> -->

    <div class="row justify-content-center align-items-center pagemain  ">
      <div class="page "></div>
      <div class="col-11 col-sm-8 col-md-6 col-lg-6 col-xl-5 col-xxl-3 px-5 py-3 loginpage  ">



        <div class="loginhead">
          <h2> LOGIN</h2>
        </div>
        <?php

        if (isset($_SESSION['login_error'])) {
          echo '
<div>' . $_SESSION['login_error'] . '</div>';
        }

        if (isset($_SESSION['not_available'])) {
          echo '
          <div>' . $_SESSION['not_available'] . '</div>';
        }

        ?>
        <form method="post" action="query.php" class="mb-2">
          <!-- <div class="row mb-3 mt-5 ms-auto me-auto labels">
            <label for="inputEmail4" class="form-label">Username</label> -->
          <div class="col-sm-12 mt-4">
            <input type="text" placeholder="your name" class="form-control" id="inputEmail3" name="name">
          </div>
          <!-- </div> -->
          <!-- <div class="row mb-3 ms-auto me-auto labels"> -->

          <div class="col-sm-12 mt-4">
            <input type="number" placeholder="Register no." class="form-control" id="inputPassword3" name="reg_no">
          </div>
          <!-- </div> -->

          <div class="row ms-auto me-auto labels mt-4">
            <select class="form-select" aria-label="Default select example" name="class">
              <option selected>Class</option>
              <?php
              foreach ($data as $datas) {

                echo  "<option value='" . $datas['class'] . "'>" . $datas['class'] . "</option>";
              }
              ?>
            </select>
          </div>


          <div class="row ms-auto me-auto labels mt-4">
            <select class="form-select" aria-label="Default select example" name="subject">
              <option selected>Subject</option>
              <?php
              foreach ($data as $datas) {

                echo  "<option value='" . $datas['subName'] . "'>" . $datas['subName'] . "</option>";
              }
              ?>
            </select>

          </div>
          <?php
          if (isset($_SESSION['pass_meassage'])) {
            echo '<div id="success-message" class="text-center">' . $message . '</div>';
          }; ?>

          <div class="d-grid gap-2 col-12 mx-auto">
            <button class="btn btn-primary mt-4 signinbutton" type="submit" name="submit">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  </div>

  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    setTimeout(() => {
      const message = document.getElementById('success-message');
      if (message) {
        message.style.transition = "opacity 1s";
        message.style.opacity = 1;
        setTimeout(() =>
          <?php

          unset($_SESSION['pass_meassage']);
          ?>


          , 2000);
      }
    }, 1000);
  </script>

</body>

</html>