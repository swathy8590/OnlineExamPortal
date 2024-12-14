<?php
require("../../lib/db.php");
class addclass extends DBconn
{
    protected $insert;
    protected $class;
    protected $select;
    protected $result;

    public $edit_cls;
    public $edit_result;

    public $e_class;

    public function __construct()
    {
        $this->dbConnect();
    }

    public function classes()
    {

        if (isset($_POST['classub'])) {

            $this->class = $_POST['class'];
            $this->insert = "INSERT INTO classlist (class)
           VALUES ($this->class)";

            $this->conn->exec($this->insert);
            header("location:index.php");
        }
    }

    public function selectdata()
    {
        try {
            $this->select = $this->conn->prepare("SELECT * FROM classlist");
            $this->select->execute();


            $this->result = $this->select->setFetchMode(PDO::FETCH_ASSOC);

            return
                json_encode($this->select->fetchAll());
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function edit()
    {
        if (isset($_POST['edit'])) {
            $key = $_POST['edit'];


            try {
                $this->edit_cls = $this->conn->prepare("SELECT * FROM classlist WHERE id='$key'");
                $this->edit_cls->execute();
                $this->edit_result = $this->edit_cls->setFetchMode(PDO::FETCH_ASSOC);

                return
                    $this->edit_cls->fetchAll();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }



    public function update()
    {
        if (isset($_POST['cls_edit'])) {

            echo  $id = $_POST['cls_edit'];

            $this->e_class = $_POST['class'];


            try {

                $sql = "UPDATE classlist SET   class=' $this->e_class ' WHERE id=$id ";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                echo $stmt->rowCount() . " records UPDATED successfully";
                $_SESSION['message'] = $stmt->rowCount() . " records UPDATED successfully";
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

                $sql = "DELETE FROM classlist  WHERE id=$id ";
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

$cls = new addclass();
$cls->classes();
$cls->update();
$cls->delete();
