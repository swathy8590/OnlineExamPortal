<?php
include("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}
$cls = $user->selectclass();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container-fluid bodysection p-2">
    <?php

    require("../../components/common/sidebar.php");

    ?>

    <div class="row">

      <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
        <div class="mainbox mt-1 ">
          <div>
            <h3>User details adding page</h3>
          </div>
          <div class="container-xl p-0 mt-4">
            <div class="row ">

              <div class="col">
                <div class="card mb-4 p-4">

                  <div class="card-body">
                    <form action="query.php" method="post">
                      <div class="mb-3">
                        <label class="small mb-1" for="name">Register_no</label>
                        <input class="form-control" id="name" type="text" name="reg_no">
                      </div>
                      <div class="mb-3">
                        <label class="small mb-1" for="answer">Name</label>
                        <input class="form-control" id="name" type="text" name="name">
                      </div>

                      <div class="row gx-3 mb-3">
                        <div class="col col-xl-12">
                          <select class="form-select" aria-label="Default select example" name="class">
                            <option selected>Class</option>
                            <?php foreach ($cls as $class) {

                              echo "<option value='" . $class['class'] . "'>" . $class['class'] . "</option>";
                            } ?>
                          </select>
                        </div>
                      </div>

                      <button class="btn savechanges" type="submit" name="submit">Save </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





















  <script src="js/sidebar.js"></script>
  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="../../js/sidebar.js"></script>

</body>

</html>