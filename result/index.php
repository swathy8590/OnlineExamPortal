<?php

unset($_SESSION['subject']);
unset($_SESSION['question_count']);
unset($_SESSION['attended']);
require("query.php");

$attended =  $_SESSION['attended'];
$count = $_SESSION['question_count'];
$data = $result->display();
$totalmark = $_SESSION['total_mark'];



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/resultpage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col headersec">
                <div class="headingmain">
                    <h2>EXAM RESULTS</h2>
                </div>

            </div>
        </div>

        <div class="row">

            <div class="col bodysec">


                <div class="container">

                    <!-- <div class="row  ">
                        <div class="col  ">
                            <div class="headingmain headersec">
                                <h2>EXAM RESULT</h2>
                            </div>
                        </div>
                    </div> -->



                    <?php

                    foreach ($data as $datas) {
                        echo

                        '

                       
                        
                        <div class="row justify-content-center align-items-center gx-5 questionmain">
                        <div class="col col-xl-5 col-xxl-5 me-3">
                        
                        
                        
                            <div class="row gy-4 ">
                                <div class="col col-md-12 col-lg-12 col-xl-12 col-xxl-12 name p-3">
                                    <h5 class="textmaincolor">' . ucfirst($datas['username']) . '</h5>
                                    <p class="textcolor">' . ucfirst($datas['subject']) . ' </p>
                                </div>
                                <div class="col col-md-12 col-xl-12 col-xxl-12 grade p-4">

                                    <div class="row detailsmain">
                                        <div class="col ">
                                            <h6 class="textcolor">Grade</h6>
                                            <h4 class="textmaincolor">' . $datas['grade'] . '</h4>
                                        </div>
                                        <div class="col">
                                            <h6 class="textcolor">Total score </h6>
                                            <h4 class="textmaincolor">' . $datas['mark'] . '/' . $totalmark . '</h4>
                                        </div>
                                    </div>


                                    <div class="row detailsmain">
                                        <div class="col ">
                                            <h6 class="textcolor">Class</h6>
                                            <h4 class="textmaincolor">' . $datas['class'] . '</h4>
                                        </div>
                                        <div class="col">
                                            <h6 class="textcolor">Question attended </h6>
                                            <h4 class="textmaincolor">' . $attended . '/' . $count . '</h4>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col col-xl-5 col-xxl-5 presantage  d-flex flex-column align-items-center ">

                            <div class="presantagemain mt-5 mb-2 p-4 progress-bar " role="progressbar"  aria-valuenow="65"
                                aria-valuemin="0" aria-valuemax="100" style="--value:' . (int)$datas['percentage'] . '">
                                <h6 class="textcolor">' . $datas['pass_or_fail'] . '</h6>
                            </div>

                             '; ?><?php if ($datas['percentage'] < 80) {
                                        echo '<a href="../question" class="btn btn-primary mt-3" style="padding: 0.5rem 1rem; border-radius: 5px;">Retake Exam</a>';
                                    } ?>

                    <?php echo ' <h5 class="textcolor mt-3">
                                    '; ?><?php if ($datas['percentage'] >= 80) {
                                                echo "Congratulations! You Passed!";
                                            } else {
                                                echo "Better luck next time!";
                                            } ?>
                <?php echo '</h5>
                            </div>

                        </div>


                    </div> ';
                    } ?>


                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>