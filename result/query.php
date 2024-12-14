<?php

require('../admin/lib/db.php');



class Result extends DBconn
{

    public $slctresult;
    public $result;

    public $user_id;
    public $subject;
    public $class;

    public function __construct()
    {
        $this->dbConnect();
    }


    public function display()
    {


        $this->class = $_SESSION['class'];
        $this->subject = $_SESSION['subject'];
        $this->user_id =  $_SESSION['user_id'];

        try {
            $this->slctresult = $this->conn->prepare("SELECT * FROM resultlist  WHERE  subject='$this->subject' AND class=$this->class AND user_id='$this->user_id'  ORDER BY id DESC LIMIT 1 ");
            $this->slctresult->execute();
            $this->result = $this->slctresult->setFetchMode(PDO::FETCH_ASSOC);

            return $dd = $this->slctresult->fetchAll();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$result = new Result();
$result->display();
