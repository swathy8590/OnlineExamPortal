<?php
include("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}

$data = $user->selectdata();

$edit_data = $user->edit();


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
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

</head>

<body>

  <div class="container-fluid bodysection p-2">


    <?php

    if (isset($_POST['edit'])) {

      foreach ($edit_data as $data) {


        echo '  
      <div class="main_cont sub_edit">
       <div class="container-xl p-0 mt-4 model ">
            <!-- Account page navigation-->
            <div class="row justify-content-center ">

              <div class="col-xl-8">
                 <div class="card mb-4 p-4">
      <div class="card-body">
                    <form action="query.php" method="post">
                      <div class="mb-3">
                        <label class="small mb-1" for="name">Register_no</label>
                        <input class="form-control" id="name" type="text" name="reg_no" value="' . $data['reg_no'] . '">
                      </div>
                      <div class="mb-3">
                        <label class="small mb-1" for="answer">Name</label>
                        <input class="form-control" id="name" type="text" name="name" value="' . $data['name'] . '">
                      </div>

                      <div class="row gx-3 mb-3">
                        <div class="col col-xl-12">
                          <select class="form-select" aria-label="Default select example" name="class">
                            <option selected>' . $data['class'] . '</option>'; ?>
        <?php foreach ($cls as $class) {

          echo "<option value='" . $class['class'] . "'>" . $class['class'] . "</option>";
        } ?><?php echo '
                          </select>
                        </div>
                      </div>

                      <button class="btn savechanges" type="submit" name="edit_user" value="' . $_POST['edit'] . '">Save </button>
                    </form>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>';
          }
        }



            ?>


        <?php

        require("../../components/common/sidebar.php");

        ?>

        <div class="row">

          <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
            <div class="mainbox mt-1 ">

              <main>
                <table class="table table-striped table-bordered w-100 tablehead " id="index">

                  <button class="btn btn-primary mb-3" type="button">
                    <a href="add.php" class="text-white text-decoration-none">
                      <i class="fa-solid fa-plus me-2"></i>Add User
                    </a>
                  </button>
                  <thead class="table-dark">
                    <tr class="tableheading">
                      <th>ID.</th>
                      <th>reg_no</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>reg_date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                </table>
              </main>
            </div>
          </div>
        </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://kit.fontawesome.com/64fc7c3650.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="../../js/sidebar.js"></script>
  <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>


  <script>
    $(document).ready(function() {
      $('#index').DataTable({
        data: <?php
              echo $data;
              ?>,
        columns: [{
            data: 'id'
          },
          {
            data: 'reg_no'
          },
          {
            data: 'name'
          },
          {
            data: 'class'
          },
          {
            data: 'reg_date'
          },
          {
            data: null,
            render: function(data, type, row) {
              return `
          <div class="action-buttons">
          <form aciton="query.php" method="post" >
          <a href="edit.php?id=${row.id}" class="btn-edit" title="Edit">
             <button class="edit-btn " type="submit" name="edit"  value="${row.id}"> <i class="fa fa-edit"></i></button>
           <span class="hover-text">Edit</span>
            </a>
        
            </form>
            <form aciton="query.php" method="post">
            <a   onclick="return confirm('Are you sure you want to delete this item?')">
             <button class="dlt-btn" type="submit" name="delete"  value="${row.id}"> <i class="fa fa-trash"></i></button>
              <span class="hover-text">Delete</span>
            </a>
             </form>
          </div>
         
        `;
            }
          }

        ]

      });
    });
  </script>

</body>

</html>