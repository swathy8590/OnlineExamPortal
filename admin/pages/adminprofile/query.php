<?php
require("../../lib/db.php");
class AdminProfile extends DBconn
{


    public $slct;
    public $username;
    public $password;
    public $cpassword;
    public $key;
    public $email;
    public $phone;
    public $birth;
    public $file;

    public $data;
    public $getdata;

    public function __construct()
    {
        $this->dbConnect();
    }

    public function profileData()
    {

        if (isset($_POST['adminsubmit'])) {

            $this->password = $_POST['password'];
            $this->cpassword = $_POST['cpassword'];
            $this->username = $_POST['username'];

            $this->key = $_POST['adminsubmit'];

            $this->email = $_POST['email'];
            $this->phone = $_POST['phone'];
            $this->birth = $_POST['birth_date'];
            $this->file = $_FILES["file"];

            if ($this->password === $this->cpassword) {

                if (isset($_SESSION['c_password'])) {
                    unset($_SESSION['c_password']);
                }

                $path = "../../images/";

                $pathname = $path . basename($this->file['name']);
                echo $pathname;


                if ($this->file['size'] < 500000000 && !file_exists($pathname)) {
                    move_uploaded_file($this->file['tmp_name'], $pathname);
                } else {
                    echo "error upload png image ";
                };


                echo $pathname;
                try {

                    $sql = "UPDATE adminlogin SET username='$this->username',password='$this->password', email='$this->email', Phone='$this->phone',birth_date='$this->birth', image='$pathname' WHERE id=$this->key ";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    echo $stmt->rowCount() . " records UPDATED successfully";


                    header("location:index.php");
                } catch (PDOException $e) {
                    echo $this->slct . "<br>" .
                        $e->getMessage();
                }
            } else {

                $_SESSION['c_password'] = "password is not matching";

                header('location:index.php');
            }
        }
    }


    public function display()
    {

        try {

            $this->data =  $this->conn->prepare("SELECT * FROM adminlogin ");
            $this->data->execute();
            $this->getdata = $this->data->setFetchMode(PDO::FETCH_ASSOC);
            return $dd = $this->data->fetchAll();
        } catch (PDOException $e) {
            echo $this->data . "<br>" .
                $e->getMessage();
        }
    }
}

$profile = new AdminProfile();
$profile->profileData();
$profile->display();
