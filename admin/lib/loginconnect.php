<?php
require("db.php");
class login extends DBconn
{

    protected  $slct;
    protected  $username;
    protected  $password;

    public function __construct()
    {
        $this->dbConnect();
    }

    public function adminlogin()
    {
        try {

            if (isset($_POST['loginsubmit'])) {
                $this->username = $_POST['username'];
                $this->password = $_POST['password'];
                // echo $password, $username;


                $this->slct =  $this->conn->prepare("SELECT * FROM adminlogin WHERE username='$this->username' AND password='$this->password'");
                $this->slct->execute();
                $this->slct =  $this->conn->prepare("SELECT FOUND_ROWS()");
                $this->slct->execute();

                if ($this->slct->fetchColumn()) {
                    $_SESSION['username'] = $this->username;
                    header("location:../pages/dashbord");
                };
            }
        } catch (PDOException $e) {
            echo $this->slct . "<br>" .
                $e->getMessage();
        }
    }
}


$dd = new login();
$dd->adminlogin();
