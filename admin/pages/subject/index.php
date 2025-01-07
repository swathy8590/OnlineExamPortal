<?php
require("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}

$data = $sub->selectdata();

$sub->edit();
$dd = $sub->selectclass();

$edit_data = $sub->edit();
// print_r($edit_data);

// if (isset($_SESSION['sub_message'])) {

//   unset($_SESSION['sub_message']);
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../css/main.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

</head>

<body>

  <div class="container-fluid bodysection p-2">


    <?php if (isset($_POST['edit'])) {

      foreach ($edit_data  as $data) {



        echo ' 
        
        <div class="main_cont sub_edit">
       <div class="container-xl p-0 mt-4 model ">
            <!-- Account page navigation-->
            <div class="row justify-content-center ">

              <div class="col-xl-8">
                 <div class="card mb-4 p-4">
        
        <div class="card-body">
          <form method="post" action="query.php">
                           <div style="text-align:right"><button type="submit" class="btn-close" name="close_btn" ></button></div>
            <div class="mb-3">
              <label class="small mb-1" for="answer">Subject Name</label>
              <input class="form-control" id="answer" type="text" name="subname" value="' . $data['subName'] . '">
            </div>
            <div class="row gx-3 mb-3">
              <div class="col">
                <label class="small mb-1" for="answer">Class</label>
                <select class="form-select" aria-label="Default select example" name="class">
                  <option selected>' . $data['class'] . '</option>'; ?>
        <?php foreach ($dd as $ff) {

          echo "<option value='" . $ff['class'] . "'>" . $ff['class'] . "</option>";
        } ?><?php echo '
                </select>


              </div>
            </div>
            <button class="btn savechanges" type="submit" name="edit_submit" value="' . $_POST['edit'] . '">Save</button>
          </form>
        </div>
         </div>
          </div>
           </div>
            </div>
            </div>';
          };
        } ?>

        <?php
        include("../../components/common/sidebar.php")



        ?>

        <?php if (isset($_SESSION['sub_message'])) {
          echo '  <div class=" text-center" id="success-message">' . $_SESSION['sub_message'] . '</div>';
        }

        if (isset($_SESSION['sdlt_message'])) {
          echo '  <div class=" text-center" id="success-message">' . $_SESSION['sdlt_message'] . '</div>';
        }

        ?>

        <div class="row">

          <!-- content start -->
          <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
            <div class="mainbox  ">
              <main>
                <table class="table table-striped table-bordered w-100 tablehead ttt" id="index">

                  <button class="btn btn-primary mb-3" type="button">
                    <a href="add.php" class="text-white text-decoration-none">
                      <i class="fa-solid fa-plus me-2"></i>Add Subject
                    </a>
                  </button>
                  <thead class="table-dark">
                    <tr class="tableheading ">
                      <th>ID.</th>
                      <th>Subject name</th>
                      <th>Class</th>
                      <th>Created</th>
                      <!-- <th>Edited</th> -->
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
            data: 'subName'
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

  <script>
    setTimeout(() => {
      const message = document.getElementById('success-message');
      if (message) {
        message.style.transition = "opacity 1s";
        message.style.opacity = 1;
        setTimeout(() => message.remove() <?php if (isset($_SESSION['sdlt_message'])) {
                                            unset($_SESSION['sdlt_message']);
                                          };
                                          if (isset($_SESSION['sub_message'])) {
                                            unset($_SESSION['sub_message']);
                                          } ?>, 300);
      }
    }, 10000);
  </script>
</body>

</html>