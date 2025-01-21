<?php
require("../../lib/db.php");

class Subject extends DBconn
{
    public $sltclass;
    public $getclass;
    public $class;
    public $subname;
    public  $insert;
    public $selectsub;
    public $subresult;

    public $edit_sub;
    public $edit_result;


    public $e_subject;
    public $e_class;



    public function __construct()
    {
        $this->dbConnect();
    }
    public function selectclass()
    {
        try {
            $this->sltclass = $this->conn->prepare("SELECT * FROM classlist");
            $this->sltclass->execute();

            $this->getclass = $this->sltclass->setFetchMode(PDO::FETCH_ASSOC);
            return $dd = $this->sltclass->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function addsubject()
    {
        if (isset($_POST['save'])) {

            if (isset($_POST['subname']) && isset($_POST['class'])) {
                $this->subname = trim($_POST['subname']);
                $this->class = trim($_POST['class']);

                $sql = "INSERT INTO `subjectlist` (subName, class)
            VALUES ('$this->subname', ' $this->class')";
                $this->conn->exec($sql);
                header("location:index.php");
            }
        }
    }



    public function selectdata()
    {
        try {
            $this->selectsub = $this->conn->prepare("SELECT * FROM subjectlist");
            $this->selectsub->execute();
            $this->subresult = $this->selectsub->setFetchMode(PDO::FETCH_ASSOC);

            return
                json_encode($this->selectsub->fetchAll());
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function edit()
    {
        if (isset($_POST['edit'])) {
            $key = $_POST['edit'];


            try {
                $this->edit_sub = $this->conn->prepare("SELECT * FROM subjectlist WHERE id='$key'");
                $this->edit_sub->execute();
                $this->edit_result = $this->edit_sub->setFetchMode(PDO::FETCH_ASSOC);

                return
                    $this->edit_sub->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function update()
    {
        if (isset($_POST['edit_submit'])) {

            echo  $id = $_POST['edit_submit'];
            echo "hi";
            $this->e_subject = $_POST['subname'];
            $this->e_class = $_POST['class'];


            try {

                $sql = "UPDATE subjectlist SET  subName=' $this->e_subject ', class=' $this->e_class ' WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";
                $_SESSION['sub_message'] = $stmt->rowCount() . " records UPDATED successfully";
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

                $sql = "DELETE FROM subjectlist  WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " record Deleted successfully";
                $_SESSION['sdlt_message'] = $stmt->rowCount() . " record deleted successfully";
                header("location:index.php");
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }
}

$sub = new Subject();
$sub->addsubject();
$sub->update();
$sub->delete();
