<?php

require("query.php");

$count = $_SESSION['question_count'];

$indx = $_SESSION['indx'];

if (isset($_SESSION['question'])) {
    $data = $_SESSION['question'];
}


unset($_SESSION['login_time']);

$username = $_SESSION['name'];
$class = $_SESSION['class'];
$finish = $_SESSION['last_id'];
$user_id =  $_SESSION['user_id'];
$subject = $_SESSION['subject'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/questionstyle.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid ">
        <div class="row main">

        </div>

        <div class="row main">
            <div class="col bodysec ">
                <div class="row justify-content-center align-items-center questionmain">
                    <h2 class="text-center head-exam">EXAM PORTAL</h2>
                    <div class="col-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 col-xxl-6">

                        <div class="col headersec ">
                            <div class="headingmain pt-3 pb-3">
                                <div class="w-[10px]">
                                    <div class="mb-1"><span class="bld"> Student:</span> <?php echo ucfirst($username)   ?></div>
                                    <div class="mb-1"><span class="bld">Subject:</span> <?php echo ucwords($subject)   ?></div>
                                    <div><span class="bld">Class:</span> <?php echo $class   ?></div>
                                </div>
                            </div>
                        </div>
                        <div class=" p-5 questionpage">
                            <?php
                            if (isset($_SESSION['question'])) {

                                foreach ($data as $key => $datas) {
                                    echo '<div class="row">
    <div class="col-10 col-xl-10 col-xxl-11">
        
        <div class="question d-flex">
           <h4> ' . ($indx) . '.' . $datas['question'] . '?</h>
        </div>
    </div>
    <div class="col-1 col-xl-1 col-xxl-1">
        <p>' . ($indx) . '/' . $count . '</p>
    </div>
    <form action="query.php" method="post" class="row gy-3 ms-1">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer[' . $datas['id'] . ']" value="' . ucwords($datas['optionA']) . '" id="optionA' . $key . '">
            <label class="form-check-label" for="optionA' . $key . '">' . $datas['optionA'] . '</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer[' . $datas['id'] . ']" value="' . $datas['optionB'] . '" id="optionB' . $key . '" >
            <label class="form-check-label" for="optionB' . $key . '">' . $datas['optionB'] . '</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer[' . $datas['id'] . ']" value="' . $datas['optionC'] . '" id="optionC' . $key . '" >
            <label class="form-check-label" for="optionC' . $key . '">' . $datas['optionC'] . '</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="answer[' . $datas['id'] . ']" value="' . $datas['optionD'] . '" id="optionD' . $key . '" >
            <label class="form-check-label" for="optionD' . $key . '">' . $datas['optionD'] . '</label>
        </div>
        <div class="buttons pe-4 mt-5 d-flex justify-content-between">
            <button type="submit" class="btn  text-primary prevbtn" name="prevbtn" value="' . $datas['id'] . '">Previous</button>';

                                    if ($datas['id'] === $finish) {
                                        echo '<button type="submit" class="btn btn-primary nextbutton" name="finish" value="' . $datas['id'] . '">Finish</button>';
                                    } else {
                                        echo '<button type="submit" class="btn btn-primary nextbutton" name="nextbtn" value="' . $datas['id'] . '">Next</button>';
                                    }

                                    echo '</div>
    </form>
    </div>';
                                }
                            } else {
                                unset($_SESSION['question']);

                                header("location:../index.php");
                            }
                            ?>

                        </div>
                    </div>

                </div>

                <div class="clock">
                    <div id="hour"></div>
                    <div id="minute"></div>
                    <div id="second"></div>
                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../js/clock.js"></script>



</body>

</html>