<?php
require('../admin/lib/db.php');


if (!isset($_SESSION['name']) || !isset($_SESSION['class'])) {
    header("location:../index.php");
}

class Question extends DBconn
{


    public $slctquestion;
    public $result;
    public $class;
    public $userid;
    public $subject;
    public $mark;
    public $chekexam;
    public $currentID;
    public $username;

    public $checkans;
    public $examfinish;
    public $examresult;

    public $totalmark;
    public $markresult;
    public $pass_fail;
    public $grade;

    public $checkpass;
    public $passresult;

    public $resultmark;
    public function __construct()
    {
        $this->dbConnect();
    }


    public function questions()
    {
        $this->class = $_SESSION['class'];
        $this->subject = $_SESSION['subject'];
        $this->userid =  $_SESSION['user_id'];
        $this->username = $_SESSION['name'];


        try {
            $this->totalmark = $this->conn->prepare("SELECT SUM(mark) FROM questionlist  WHERE   subName='$this->subject' AND class=$this->class");
            $this->totalmark->execute();
            $this->markresult = $this->totalmark->setFetchMode(PDO::FETCH_ASSOC);

            $data = $this->totalmark->fetchAll();

            foreach ($data as $datas) {
                $totalmark = $datas['SUM(mark)'];
                $_SESSION['total_mark'] = $totalmark;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


        try {
            $this->slctquestion = $this->conn->prepare("SELECT id FROM questionlist  WHERE class=$this->class AND subName='$this->subject' ORDER BY id DESC LIMIT 1");
            $this->slctquestion->execute();
            $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);
            $dd = $this->slctquestion->fetchAll();
            $this->slctquestion =  $this->conn->prepare("SELECT FOUND_ROWS()");
            $this->slctquestion->execute();

            if ($this->slctquestion->fetchColumn()) {

                $last = $dd[0]['id'];

                $_SESSION['last_id'] = $last;
            } else {
                // echo "class or subject is not available";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        try {
            $this->checkpass = $this->conn->prepare("SELECT id FROM resultlist  WHERE  user_id='$this->userid' AND class=$this->class AND subject='$this->subject' AND  pass_or_fail='passed'");
            $this->checkpass->execute();
            $this->passresult = $this->checkpass->setFetchMode(PDO::FETCH_ASSOC);
            // $dd = $this->checkpass->fetchAll();
            $this->checkpass =  $this->conn->prepare("SELECT FOUND_ROWS()");
            $this->checkpass->execute();



            if ($this->checkpass->fetchColumn()) {
                unset($_SESSION['question']);
                $_SESSION['pass_meassage'] = "You have already passed this exam.";
                // echo "You have already passed this exam.";
            } else {

                if (isset($_SESSION['pass_meassage'])) {
                    unset($_SESSION['pass_meassage']);
                }

                if (isset($_POST['nextbtn'])) {
                    $this->currentID = $_POST['nextbtn'];

                    try {
                        $this->slctquestion = $this->conn->prepare("SELECT * FROM questionlist  WHERE id > $this->currentID AND subName='$this->subject' AND class=$this->class  ORDER BY id ASC LIMIT 1");
                        $this->slctquestion->execute();
                        $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);

                        $dd = $this->slctquestion->fetchAll();

                        if (!empty($dd)) {
                            $_SESSION['question'] = $dd;

                            $_SESSION['indx'] = $_SESSION['indx'] + 1;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                } elseif (isset($_POST['prevbtn'])) {
                    $this->currentID = $_POST['prevbtn'];

                    try {
                        $this->slctquestion = $this->conn->prepare("SELECT * FROM questionlist  WHERE id < $this->currentID AND subName='$this->subject' AND class=$this->class  ORDER BY id DESC LIMIT 1");
                        $this->slctquestion->execute();
                        $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);

                        $dd = $this->slctquestion->fetchAll();
                        if (!empty($dd)) {
                            $_SESSION['question'] = $dd;

                            $_SESSION['indx'] = $_SESSION['indx'] - 1;
                        } else {

                            // unset($_SESSION['question']);
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    header("location:index.php");
                } else {




                    try {
                        $this->slctquestion = $this->conn->prepare("SELECT COUNT( id) FROM questionlist WHERE subName='$this->subject' AND class=$this->class ");
                        $this->slctquestion->execute();
                        $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);
                        $dd = $this->slctquestion->fetchAll();
                        // $this->slctquestion =  $this->conn->prepare("SELECT FOUND_ROWS()");
                        // $this->slctquestion->execute();
                        foreach ($dd as $count) {


                            $_SESSION['question_count'] = $count['COUNT( id)'];
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }




                    try {
                        $this->slctquestion = $this->conn->prepare("SELECT * FROM questionlist WHERE subName='$this->subject' AND class=$this->class ORDER BY id ASC LIMIT 1");
                        $this->slctquestion->execute();
                        $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);
                        $dd = $this->slctquestion->fetchAll();
                        $this->slctquestion =  $this->conn->prepare("SELECT FOUND_ROWS()");
                        $this->slctquestion->execute();

                        if ($this->slctquestion->fetchColumn()) {

                            if (isset($_SESSION['not_available'])) {
                                unset($_SESSION['not_available']);
                            }

                            if (!isset($_SESSION['question']) && empty($_SESSION['question'])) {
                                $_SESSION['question'] = $dd;
                                $_SESSION['indx'] = $_SESSION['question_count'] / $_SESSION['question_count'];
                                // $_SESSION['indx'] = 1;


                            }
                        } else {
                            $_SESSION['not_available'] = "question not available";
                            unset($_SESSION['question']);
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                }
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function next()
    {


        if (isset($_POST['nextbtn'])) {


            if (isset($_POST['answer'])) {
                echo "yes";

                $selected = $_POST['answer'];


                foreach ($selected as $key => $answer) {
                    //check answer is correct

                    try {
                        $this->checkans = $this->conn->prepare("SELECT * FROM questionlist WHERE id='$key'");
                        $this->checkans->execute();
                        $this->result = $this->checkans->setFetchMode(PDO::FETCH_ASSOC);
                        $dd = $this->checkans->fetchAll();

                        if ($dd['0']['Answer'] === $answer) {

                            echo "correct answer";
                            $this->mark = $dd['0']['mark'];
                        } else {
                            echo "not correct";
                            $this->mark = 0;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    // end of check answer is correct

                    //data check

                    try {

                        $this->chekexam = $this->conn->prepare("SELECT * FROM examlist WHERE user_id='$this->userid' AND  question_id='$key' AND class='$this->class' AND subject='$this->subject'");
                        $this->chekexam->execute();
                        $dataid = $this->chekexam->fetchAll();
                        $this->chekexam =  $this->conn->prepare("SELECT FOUND_ROWS()");
                        $this->chekexam->execute();


                        foreach ($dataid as $data) {
                            $id = $data['id'];
                            $_SESSION['id'] = $id;
                        }




                        // data check  if
                        if ($this->chekexam->fetchColumn()) {


                            try {

                                $sql = "UPDATE examlist SET answer='$answer',mark='$this->mark' WHERE id=$id ";
                                $stmt = $this->conn->prepare($sql);
                                $stmt->execute();
                                echo '--' . $stmt->rowCount() . " records UPDATED successfully";
                            } catch (PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                            }
                        } else {


                            try {
                                $sql = "INSERT INTO `examlist`(user_id, question_id,subject,class,answer, mark)
                                VALUES ('$this->userid', '$key','$this->subject','$this->class','$answer','$this->mark')";
                                $this->conn->exec($sql);
                                echo "add";
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        }
                        //end of data check if
                    } catch (PDOException $e) {
                        echo "error";
                        // echo $this->chekexam . "<br>" .
                        //     $e->getMessage();
                    }

                    // end data check

                }
            } else {
                $qst_id = $_POST['nextbtn'];




                // try {

                //     $this->chekexam = $this->conn->prepare("SELECT * FROM examlist WHERE user_id='$this->userid' AND  question_id='$qst_id' AND class='$this->class' AND subject='$this->subject'");
                //     $this->chekexam->execute();
                //     $dataid = $this->chekexam->fetchAll();
                //     $this->chekexam =  $this->conn->prepare("SELECT FOUND_ROWS()");
                //     $this->chekexam->execute();


                //     foreach ($dataid as $data) {
                //         $id = $data['id'];
                //     }




                //     // data check  if
                //     if ($this->chekexam->fetchColumn()) {
                //         $dd = "";
                //         echo "not";
                //         try {

                //             $sql = "UPDATE examlist SET answer='$dd',mark=0 WHERE id=$id ";
                //             $stmt = $this->conn->prepare($sql);
                //             $stmt->execute();
                //             echo '--' . $stmt->rowCount() . " records UPDATED successfully";
                //         } catch (PDOException $e) {
                //             echo $sql . "<br>" . $e->getMessage();
                //         }
                //     }
                //     //end of data check if
                // } catch (PDOException $e) {
                //     echo "error";
                //     // echo $this->chekexam . "<br>" .
                //     //     $e->getMessage();
                // }

                try {

                    $this->chekexam = $this->conn->prepare("SELECT * FROM examlist WHERE user_id='$this->userid' AND  question_id='$qst_id' AND class='$this->class' AND subject='$this->subject'");
                    $this->chekexam->execute();
                    $dataid = $this->chekexam->fetchAll();
                    $this->chekexam =  $this->conn->prepare("SELECT FOUND_ROWS()");
                    $this->chekexam->execute();


                    foreach ($dataid as $data) {
                        $id = $data['id'];
                    }




                    // data check  if
                    if ($this->chekexam->fetchColumn()) {
                        $dd = "";
                        echo "not";
                        try {

                            $sql = "DELETE FROM examlist WHERE id=$id";
                            $stmt = $this->conn->prepare($sql);
                            $stmt->execute();
                            echo '--' . $stmt->rowCount() . " records UPDATED successfully";
                        } catch (PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                    //end of data check if
                } catch (PDOException $e) {
                    echo "error";
                    // echo $this->chekexam . "<br>" .
                    //     $e->getMessage();
                }
            }

            header("location:index.php");
        }
    }

    public function finish()
    {


        if (isset($_POST['finish']) || !isset($_COOKIE['exam_start'])) {





            unset($_SESSION['indx']);



            if (isset($_POST['answer'])) {

                $selected = $_POST['answer'];

                foreach ($selected as $key => $answer) {
                    //check answer is correct

                    try {
                        $this->checkans = $this->conn->prepare("SELECT * FROM questionlist WHERE id='$key'");
                        $this->checkans->execute();
                        $this->result = $this->checkans->setFetchMode(PDO::FETCH_ASSOC);
                        $dd = $this->checkans->fetchAll();

                        if ($dd['0']['Answer'] === $answer) {

                            echo "correct answer";
                            echo $this->mark = $dd['0']['mark'];
                        } else {
                            echo "not correct";
                            $this->mark = 0;
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    // end of check answer is correct

                    //data check

                    try {

                        $this->chekexam = $this->conn->prepare("SELECT id FROM examlist WHERE user_id='$this->userid' AND  question_id='$key' AND class=$this->class AND subject='$this->subject'");
                        $this->chekexam->execute();
                        $dataid = $this->chekexam->fetchAll();
                        $this->chekexam =  $this->conn->prepare("SELECT FOUND_ROWS()");
                        $this->chekexam->execute();

                        foreach ($dataid as $data) {
                            echo $id = $data['id'];
                        }




                        // data check  if
                        if ($this->chekexam->fetchColumn()) {


                            try {

                                $sql = "UPDATE examlist SET answer='$answer',mark='$this->mark' WHERE id=$id ";
                                $stmt = $this->conn->prepare($sql);
                                $stmt->execute();
                                echo $stmt->rowCount() . " records UPDATED successfully";
                            } catch (PDOException $e) {
                                echo $sql . "<br>" . $e->getMessage();
                            }
                        } else {


                            try {
                                $sql = "INSERT INTO `examlist`(user_id, question_id,subject,class,answer, mark)
                                VALUES ('$this->userid', '$key','$this->subject','$this->class','$answer','$this->mark')";
                                $this->conn->exec($sql);
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        }
                        //end of data check if
                    } catch (PDOException $e) {
                        echo "error";
                        // echo $this->chekexam . "<br>" .
                        //     $e->getMessage();
                    }

                    // end data check
                }
            } else {
                $qst_id = $_POST['finish'];




                try {

                    $this->chekexam = $this->conn->prepare("SELECT * FROM examlist WHERE user_id='$this->userid' AND  question_id='$qst_id' AND class='$this->class' AND subject='$this->subject'");
                    $this->chekexam->execute();
                    $dataid = $this->chekexam->fetchAll();
                    $this->chekexam =  $this->conn->prepare("SELECT FOUND_ROWS()");
                    $this->chekexam->execute();


                    foreach ($dataid as $data) {
                        $id = $data['id'];
                    }




                    // data check  if
                    if ($this->chekexam->fetchColumn()) {
                        $dd = "";
                        echo "not";
                        try {

                            $sql = "UPDATE examlist SET answer='$dd',mark=0 WHERE id=$id ";
                            $stmt = $this->conn->prepare($sql);
                            $stmt->execute();
                            echo '--' . $stmt->rowCount() . " records UPDATED successfully";
                        } catch (PDOException $e) {
                            echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                    //end of data check if
                } catch (PDOException $e) {
                    echo "error";
                    // echo $this->chekexam . "<br>" .
                    //     $e->getMessage();
                }
            }


            try {
                $this->slctquestion = $this->conn->prepare("SELECT COUNT(id) FROM examlist WHERE user_id='$this->userid'  AND class=$this->class AND subject='$this->subject'");
                $this->slctquestion->execute();
                $this->result = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);
                $dd = $this->slctquestion->fetchAll();
                // $this->slctquestion =  $this->conn->prepare("SELECT FOUND_ROWS()");
                // $this->slctquestion->execute();
                foreach ($dd as $count) {

                    $_SESSION['attended'] = $count['COUNT(id)'];
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }


            $this->examfinish = $this->conn->prepare("SELECT SUM(mark) FROM examlist  WHERE user_id='$this->userid'  AND class='$this->class' AND subject='$this->subject'");
            $this->examfinish->execute();
            // $this->examresult = $this->checkans->setFetchMode(PDO::FETCH_ASSOC);
            $data = $this->examfinish->fetchAll();

            // print_r($data);
            $_SESSION['total_result'] = $this->resultmark;
            foreach ($data as $datas) {
                $total = $datas['SUM(mark)'];

                $this->resultmark = $total;

                $percentage = (100 * $total) / $_SESSION['total_mark'];

                if ($percentage >= 80) {
                    $this->pass_fail = "passed";
                } else {

                    $this->pass_fail = "failed";
                }

                if ($percentage >= 90) {

                    $this->grade = "A+";
                } elseif ($percentage >= 80 && $percentage < 90) {

                    $this->grade = "A";
                } elseif ($percentage >= 70 && $percentage < 80) {

                    $this->grade = "B+";
                } elseif ($percentage >= 60 && $percentage < 70) {

                    $this->grade = "B";
                } elseif ($percentage >= 50 && $percentage < 60) {

                    $this->grade = "C+";
                } elseif ($percentage >= 40 && $percentage < 50) {

                    $this->grade = "C";
                } elseif ($percentage >= 30 && $percentage < 40) {

                    $this->grade = "D+";
                } else {

                    $this->grade = "D";
                }

                $attended = $_SESSION['attended'];


                try {
                    $sql = "INSERT INTO `resultlist`(username,user_id,subject,class,pass_or_fail,mark,percentage,grade,attended_q)
                   VALUES  ('$this->username' ,'$this->userid','$this->subject','$this->class', '$this->pass_fail','$this->resultmark','$percentage','$this->grade','$attended')";

                    $this->conn->exec($sql);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }

                unset($_SESSION['question']);


                header("location:../result/index.php");
            }
        }
    }
}

$question = new Question();
$question->questions();
$question->next();
$question->finish();
