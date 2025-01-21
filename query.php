<?php

require("admin/lib/db.php");
class UserLogin extends DBconn
{

    public $reg_no;
    public $name;
    public $class;
    public $subject;
    public $login;
    protected $userid;
    public $login_time;

    public $selectsub;
    public $getsub;

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

    public function adduser()
    {

        if (isset($_POST['submit'])) {

            echo $this->reg_no = trim($_POST['reg_no']);
            echo $this->name = trim($_POST['name']);
            echo $this->class = trim($_POST['class']);
            $this->subject = trim($_POST['subject']);

            try {


                $this->login = $this->conn->prepare("SELECT * FROM userslist WHERE name='$this->name' AND reg_no='$this->reg_no' AND class=$this->class ");
                $this->login->execute();
                $dd = $this->login->fetchAll();
                $this->login =  $this->conn->prepare("SELECT FOUND_ROWS()");
                $this->login->execute();

                unset($_SESSION['question']);

                print_r($dd);

                if ($this->login->fetchColumn()) {

                    if (isset($_SESSION['login_error'])) {
                        unset($_SESSION['login_error']);
                    }

                    $_SESSION['name'] = $this->name;
                    $_SESSION['reg_no'] = $this->reg_no;
                    $_SESSION['class'] = $this->class;
                    $_SESSION['subject'] = $this->subject;

                    $_SESSION['user_id'] = $dd['0']['id'];

                    // date_default_timezone_set('Asia/Kolkata');
                    // $_SESSION['login_times'] = date('h:i:s');
                    // $_SESSION['login_times'] = time();
                    //  = $this->login_time;
                    // $time = 59;
                    setcookie('exam_start', "exam started", time() + 60);



                    header("location:question");
                } else {
                    $_SESSION['login_error'] = "The name, register number or class  is incorrect";
                    header("location:index.php");
                };
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}

$user = new UserLogin();
$user->adduser();
