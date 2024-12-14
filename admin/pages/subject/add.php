<?php
include("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}
$dd = $sub->selectclass();
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
    <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
      <div class="mt-1">
        <h3>Subject adding page</h3>
      </div>
      <div class="card mb-4 p-4 mt-4">

        <div class="card-body">
          <form method="post" action="query.php">
            <div class="mb-3">
              <label class="small mb-1" for="answer">Subject Name</label>
              <input class="form-control" id="answer" type="text" name="subname">
            </div>
            <div class="row gx-3 mb-3">
              <div class="col">
                <select class="form-select" aria-label="Default select example" name="class">
                  <option selected>class</option>
                  <?php foreach ($dd as $ff) {

                    echo "<option value='" . $ff['class'] . "'>" . $ff['class'] . "</option>";
                  } ?>
                </select>


              </div>
            </div>
            <button class="btn savechanges" type="submit" name="save">Save</button>
          </form>
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