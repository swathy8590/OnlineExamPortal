<?php


include('query.php');
$data = $profile->display();

if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}

if (isset($_SESSION['c_password'])) {
  $msg = $_SESSION['c_password'];
} else {
  $msg = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="../../css/main.css" rel="stylesheet">

</head>

<body>
  <div class="container-fluid bodysection p-2">
    <?php include("../../components/common/sidebar.php") ?>

    <div class="row">
      <div class="ps-5 pe-5 maincontainer active-cont mainmargin">
        <div class="mainbox">
          <div class="ms-4">
            <h3 class="profile-header">Admin Profile Page</h3>
          </div>
          <div class="container-xl mt-4">
            <!-- Account page navigation-->
            <?php
            foreach ($data as $datas) {
              $_SESSION['admin_img'] = $datas['image'];
              echo '
            <form action="query.php" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-lg-4 mb-4 text-center">
                  <!-- Profile picture card-->
                  <div class="card">
                    <div class="card-body profilebox">
                      <img class="img-account-profile mb-3" src="' . $datas['image'] . '" alt="Profile Picture">
                      <div><input class="form-control" name="file" type="file" /></div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8">
                  <!-- Account details card-->
                  <div class="card p-4">
                    <h4>Edit Profile</h4>
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input class="form-control" id="inputUsername" type="text" name="username" placeholder="Enter your username" value="' . $datas['username'] . '">
                      </div>
                      <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputpasword">Password</label>
                          <input class="form-control" id="inputpasword" type="password" name="password" placeholder="Enter your password" value="' . $datas['password'] . '">
                        </div>
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputconformpassword">Confirm Password</label>
                          <input class="form-control" id="inputconformpassword" type="password" name="cpassword" placeholder="Confirm your password" value="' . $datas['password'] . '">
                        </div>
                      </div>
                      <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Email Address</label>
                        <input class="form-control" id="inputEmailAddress" type="email" name="email" placeholder="Enter your email address" value="' . $datas['email'] . '">
                      </div>
                      <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputPhone">Phone Number</label>
                          <input class="form-control" id="inputPhone" type="tel" name="phone" placeholder="Enter your phone number" value="' . $datas['Phone'] . '">
                        </div>
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputBirthday">Date of Birth</label>
                          <input class="form-control" id="inputBirthday" type="date" name="birth_date" value="' . $datas['birth_date'] . '">
                        </div>
                      </div>
                      <button class="btn savechanges" type="submit" name="adminsubmit" value="' . $datas['id'] . '">Save Changes</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>';
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="../../js/sidebar.js"></script>
  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
</body>

</html>