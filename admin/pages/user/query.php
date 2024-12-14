<?php


require("../../lib/db.php");

class User extends DBconn
{

    public $sltclass;
    public $getclass;

    public $name;
    public $class;
    public $reg_no;
    public  $insert;
    public $selectuser;
    public $result;

    public $edit_user;
    public $edit_result;

    public $e_name;
    public $e_reg_no;
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


    public function adduser()
    {
        if (isset($_POST['submit'])) {


            $this->reg_no = $_POST['reg_no'];
            $this->name = $_POST['name'];
            $this->class = $_POST['class'];

            $sql = "INSERT INTO `userslist` (reg_no,name,class)
            VALUES ('$this->reg_no', '$this->name','$this->class')";
            $this->conn->exec($sql);
            header("location:index.php");
        }
    }

    public function selectdata()
    {
        try {
            $this->selectuser = $this->conn->prepare("SELECT * FROM userslist");
            $this->selectuser->execute();
            $this->result = $this->selectuser->setFetchMode(PDO::FETCH_ASSOC);

            return
                json_encode($this->selectuser->fetchAll());
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function edit()
    {
        if (isset($_POST['edit'])) {
            $key = $_POST['edit'];


            try {
                $this->edit_user = $this->conn->prepare("SELECT * FROM userslist WHERE id='$key'");
                $this->edit_user->execute();
                $this->edit_result = $this->edit_user->setFetchMode(PDO::FETCH_ASSOC);

                return
                    $this->edit_user->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }

    public function update()
    {
        if (isset($_POST['edit_user'])) {

            echo  $id = $_POST['edit_user'];
            $this->e_name = $_POST['name'];
            $this->e_class = $_POST['class'];
            $this->e_reg_no = $_POST['reg_no'];


            try {

                $sql = "UPDATE userslist SET  name=' $this->e_name ',reg_no=' $this->e_reg_no ', class=' $this->e_class ' WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";
                $_SESSION['sub_message'] = $stmt->rowCount() . " records UPDATED successfully";
                header("location:index.php");
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }
    }

    public function delete()
    {
        if (isset($_POST['delete'])) {
            echo  $id = $_POST['delete'];


            try {

                $sql = "DELETE FROM userslist  WHERE id=$id ";
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

$user = new User();
$user->adduser();
$user->update();
$user->delete();
