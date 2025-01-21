<?php
require("../../lib/db.php");
class Question extends DBconn
{


    public $selectsub;
    public $getsub;

    public $question;
    public $optionA;
    public $optionB;
    public $optionC;
    public $optionD;
    public $answer;
    public $subject;
    public $class;
    public $mark;

    public $e_question;
    public $e_optionA;
    public $e_optionB;
    public $e_optionC;
    public $e_optionD;
    public $e_answer;
    public $e_subject;
    public $e_class;
    public $e_mark;

    public $slctquestion;
    public $slctresult;


    public function __construct()
    {
        $this->dbConnect();
    }





    public function selectsub()
    {
        try {
            $this->selectsub = $this->conn->prepare("SELECT * FROM subjectlist");
            $this->selectsub->execute();

            $this->getsub = $this->selectsub->setFetchMode(PDO::FETCH_ASSOC);
            return $dd = $this->selectsub->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {
            session_start();

            $this->question = $_POST['question'];
            $this->optionA = $_POST['optionA'];
            $this->optionB = $_POST['optionB'];
            $this->optionC = $_POST['optionC'];
            $this->optionD = $_POST['optionD'];
            $this->answer = $_POST['answer'];
            $this->subject = trim($_POST['subject']);
            $this->class = trim($_POST['class']);
            $this->mark = $_POST['mark'];

            try {
                $sql = "INSERT INTO `questionlist`(question, optionA, optionB, optionC, optionD, Answer, subName, class, mark)
                VALUES ('$this->question', '$this->optionA', '$this->optionB', '$this->optionC', '$this->optionD', '$this->answer', '$this->subject', '$this->class', '$this->mark')";
                $this->conn->exec($sql);

                $_SESSION['message'] = "Question added successfully!";
                header("location:index.php");
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function selectdata()
    {
        try {
            $this->slctquestion = $this->conn->prepare("SELECT * FROM questionlist");
            $this->slctquestion->execute();
            $this->slctresult = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);

            return
                json_encode($this->slctquestion->fetchAll());
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function edit()
    {
        if (isset($_POST['edit'])) {
            $key = $_POST['edit'];


            try {
                $this->slctquestion = $this->conn->prepare("SELECT * FROM questionlist WHERE id='$key'");
                $this->slctquestion->execute();
                $this->slctresult = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);

                return
                    $this->slctquestion->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }


    public function update()
    {
        if (isset($_POST['edit_submit'])) {

            $id = $_POST['edit_submit'];

            $this->e_question = $_POST['question'];
            $this->e_optionA = $_POST['optionA'];
            $this->e_optionB = $_POST['optionB'];
            $this->e_optionC = $_POST['optionC'];
            $this->e_optionD = $_POST['optionD'];
            $this->e_answer = $_POST['answer'];
            $this->e_subject = trim($_POST['subject']);
            $this->e_class = trim($_POST['class']);
            $this->e_mark = $_POST['mark'];


            try {

                $sql = "UPDATE questionlist SET  question=' $this->e_question', optionA='$this->e_optionA', optionB='$this->e_optionB', optionC='$this->e_optionC', optionD='$this->e_optionD',answer='$this->e_answer',mark='$this->e_mark', subName=' $this->e_subject ', class=' $this->e_class ' WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";
                $_SESSION['message'] = $stmt->rowCount() . " records UPDATED successfully";
                header("location:index.php");
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }


        if (isset($_POST["close_btn"])) {
            header("location:index.php");
        }
    }



    public function delete()
    {
        if (isset($_POST['delete'])) {
            echo  $id = $_POST['delete'];


            try {

                $sql = "DELETE FROM questionlist  WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " record Deleted successfully";
                $_SESSION['dlt_message'] = $stmt->rowCount() . " record deleted successfully";
                header("location:index.php");
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }
}





$question = new Question();
$question->insert();
$question->delete();

$question->update();
