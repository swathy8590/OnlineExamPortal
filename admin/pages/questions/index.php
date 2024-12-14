<?php
include("query.php");
if (!isset($_SESSION['username'])) {
  header(("location:../../index.php"));
}


$dataz = $question->selectsub();

$data = $question->selectdata();

$message = "";
$dlt_message = "";
if (isset($_SESSION['message'])) {
  $message = $_SESSION['message'];
  unset($_SESSION['message']);
}

if (isset($_SESSION['dlt_message'])) {
  $dlt_message = $_SESSION['dlt_message'];
  // unset($_SESSION['dlt_message']);
}
// if(isset($question->edit())){
$edit_data = $question->edit();
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
  <?php
  if (isset($_POST['edit'])) {

    foreach ($edit_data as $data) {

      echo '<div class="main_cont">
       <div class="container-xl p-0 mt-4 model ">
            <!-- Account page navigation-->
            <div class="row ">

              <div class="col-xl-12">
             
                <!-- Account details card-->
                <div class="card mb-4 p-4">
                

                  <div class="card-body">
                  <div  class="text-end">
                 
                     <button type="button" class="btn-close" ></button>
                   </div>
                    <form action="query.php" method="post">
                      <!-- Form Group (username)-->
                      <div class="mb-3">
                        <label class="small mb-1" for="Questions">Questions</label>
                        <textarea class="form-control" id="Questions" type="text" name="question">' . $data['question'] . '</textarea>
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="OptionA">Option A</label>
                          <input class="form-control" id="OptionA" type="text" name="optionA" value="' . $data['optionA'] . '"/>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="OptionB">Option B</label>
                          <input class="form-control" id="OptionB" type="text" name="optionB" value="' . $data['optionB'] . '">
                        </div>
                      </div>
                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (organization name)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputpasword">Option C</label>
                          <input class="form-control" id="inputpasword" type="text" name="optionC" value="' . $data['optionC'] . '">
                        </div>
                        <!-- Form Group (location)-->
                        <div class="col-md-6">
                          <label class="small mb-1" for="inputconformpassword">Option D</label>
                          <input class="form-control" id="inputconformpassword" type="text" name="optionD" value="' . $data['optionD'] . '">
                        </div>
                      </div>
                      <!-- Form Group (email address)-->
                      <div class="mb-3">
                        <label class="small mb-1" for="answer">Answer</label>
                        <input class="form-control" id="answer" type="text" name="answer" value="' . $data['Answer'] . '">
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                        <!-- Form Group (phone number)-->
                        <div class="col col-xl-6">
                          <select class="form-select" aria-label="Default select example" name="subject"  >
                            <option selected>' . $data['subName'] . '</option>'; ?>
      <?php
      foreach ($dataz as $datas) {

        echo  "<option value='" . $datas['subName'] . "'>" . $datas['subName'] . "</option>";
      }
      ?>
      <?php echo '
                          </select>
                        </div>
                        <!-- Form Group (birthday)-->

                        <div class="col col-xl-6">
                          <select class="form-select" aria-label="Default select example" name="class">
                            <option selected>' . $data['class'] . '</option>'; ?>

      <?php
      foreach ($dataz as $datas) {

        echo  "<option value='" . $datas['class'] . "'>" . $datas['class'] . "</option>";
      }
      ?><?php echo '
                          </select>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label class="small mb-1" for="mark">Mark</label>
                        <input class="form-control" id="mark" type="number" name="mark" value="' . $data['mark'] . '">
                      </div>
                      <!-- Save changes button-->
                      <button class="btn savechanges" type="submit" name="edit_submit" value="' . $_POST['edit'] . '">Save</button>
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



      <div></div>

      <div class="container-fluid bodysection p-2">

        <?php

        require("../../components/common/sidebar.php");


        ?>

        <?php if ($message): ?>
          <div class=" text-center" id="success-message">
            <?php echo $message;

            ?>
          </div>
        <?php endif; ?>

        <?php if ($dlt_message): ?>
          <div class=" text-center" id="success-message">
            <?php echo $dlt_message;

            ?>
          </div>
        <?php endif; ?>
        <div class="row">
          <!-- content start -->
          <div class="ps-5 pe-5 maincontainer active-cont mainmargin ">
            <div class="mainbox  ">
              <main class=" overflow-scroll ">
                <table class="table  table-striped table-bordered align-middle text-center ttt " id="index">
                  <button class="btn btn-primary mb-3" type="button">
                    <a href="add.php" class="text-white text-decoration-none">
                      <i class="fa-solid fa-plus me-2"></i>Add Question
                    </a>
                  </button>
                  <thead>
                    <tr class="">
                      <th>No.</th>
                      <th>Questions</th>
                      <th>Option A</th>
                      <th>Option B</th>
                      <th>Option C</th>
                      <th>Option D</th>
                      <th>Answer</th>
                      <th>Subject</th>
                      <th>Class</th>
                      <th>Mark</th>
                      <th>Created</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Table content populated dynamically -->
                  </tbody>
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
        $('#index').DataTable({
          data: <?php echo $data; ?>,
          columns: [{
              data: 'id'
            },
            {
              data: 'question'
            },
            {
              data: 'optionA'
            },
            {
              data: 'optionB'
            },
            {
              data: 'optionC'
            },
            {
              data: 'optionD'
            },
            {
              data: 'Answer'
            },
            {
              data: 'subName'
            },
            {
              data: 'class'
            },
            {
              data: 'mark'
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
      </script>

      <script>
        setTimeout(() => {
          const message = document.getElementById('success-message');
          if (message) {
            message.style.transition = "opacity 1s";
            message.style.opacity = 1;
            setTimeout(() => message.remove() <?php if (isset($_SESSION['dlt_message'])) {
                                                unset($_SESSION['dlt_message']);
                                              };
                                              if (isset($_SESSION['message'])) {
                                                unset($_SESSION['message']);
                                              } ?>, 100);
          }
        }, 10000);
      </script>



</body>

</html>

<?php



?>