<?php
session_start();
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- <link href="css/main.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

  <div class="container-fluid bodysection p-2">
    <?php

    require("../../components/common/sidebar.php");


    ?>

    <div class="row">

      <!-- content start -->

      <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
        <div class="mainbox mt-1 ">
          <div>
            <h3>Class adding page</h3>
          </div>
          <div class="container-xl p-0 mt-4">
            <div class="row ">

              <div class="col">
                <div class="card mb-4 p-4">

                  <div class="card-body">
                    <form method="post" action="query.php">
                      <!-- Form Group (username)-->
                      <!-- <div class="mb-3">
                        <label class="small mb-1" for="name">No.</label>
                        <input class="form-control" id="name" type="text">
                      </div> -->



                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                        <div class="col">
                          <label class="small mb-1" for="name">Class</label>
                          <input class="form-control" id="name" type="text" name="class">
                          <!-- <select class="form-select" aria-label="Default select example">
                            <option selected>class</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select> -->
                        </div>

                      </div>


                      <!-- <div class="row gx-3 mb-3">
                        <div class="col">
                          <select class="form-select" aria-label="Default select example">
                            <option selected>Div.</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                          </select>
                        </div>

                      </div> -->


                      <!-- Save changes button-->
                      <button class="btn savechanges" type="submit" name="classub">Save </button>
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



  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <script src="../../js/sidebar.js"></script>

</body>

</html>