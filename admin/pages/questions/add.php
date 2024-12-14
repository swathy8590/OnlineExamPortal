<?php
include("query.php");
$data = $question->selectsub();
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
  <link href="css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>

<body>

  <div class="container-fluid bodysection p-2">


    <?php

    require("../../components/common/sidebar.php");


    ?>


    <div class="row">
      <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
        <div class="mainbox  ">
          <div>
            <h3>Question adding page</h3>
          </div>
          <div class="container-xl p-0 mt-4">
            <!-- Account page navigation-->
            <div class="row ">

              <div class="col-xl-12">
                <!-- Account details card-->
                <div class="card mb-4 p-4">

                  <div class="card-body">
                    <form action="query.php" method="post">
                      <!-- Form Group (username)-->
                      <div class="mb-3">
                        <label class="small mb-1" for="Questions">Questions</label>
                        <textarea class="form-control" id="Questions" type="text" name="question"></textarea>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="OptionA">Option A</label>
                          <input class="form-control" id="OptionA" type="text" name="optionA">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="OptionB">Option B</label>
                          <input class="form-control" id="OptionB" type="text" name="optionB">
                        </div>
                      </div>
                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputpasword">Option C</label>
                          <input class="form-control" id="inputpasword" type="text" name="optionC">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputconformpassword">Option D</label>
                          <input class="form-control" id="inputconformpassword" type="text" name="optionD">
                        </div>
                      </div>
                      <!-- Form Group (email address)-->
                      <div class="mb-3">
                        <label class="small mb-1" for="answer">Answer</label>
                        <input class="form-control" id="answer" type="text" name="answer">
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col col-xl-6">
                          <select class="form-select" aria-label="Default select example" name="subject">
                            <option selected>Subject</option>
                            <?php
                            foreach ($data as $datas) {

                              echo  "<option value='" . $datas['subName'] . "'>" . $datas['subName'] . "</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <!-- Form Group (birthday)-->

                        <div class="col col-xl-6">
                          <select class="form-select" aria-label="Default select example" name="class">
                            <option selected>Class</option>
                            <?php
                            foreach ($data as $datas) {

                              echo  "<option value='" . $datas['class'] . "'>" . $datas['class'] . "</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="small mb-1" for="mark">Mark</label>
                        <input class="form-control" id="mark" type="number" name="mark">
                      </div>
                      <!-- Save changes button-->
                      <button class="btn savechanges" type="submit" name="submit">Save</button>
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