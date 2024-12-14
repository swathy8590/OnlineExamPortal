<?php

require("db.php");
$db = new DBconn();


class Table extends DBconn
{
    public $logintable;
    protected $questiontbl;
    protected $classtable;
    protected $subtable;
    protected $questiontable;
    protected $usertable;
    protected $examtble;
    protected $resulttble;

    public $conn;

    public function __construct()
    {

        $this->dbConnect();

        //adminlogin table
        $this->logintable = "CREATE TABLE IF NOT EXISTS adminlogin (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            email VARCHAR(30) NOT NULL,
              Phone VARCHAR(30) NOT NULL,
              birth_date VARCHAR(30) NOT NULL,
               image VARCHAR(30) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )";

        //class table creation
        $this->classtable = "CREATE TABLE IF NOT EXISTS classlist (
           id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
           class VARCHAR(30) NOT NULL,
           reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

        //subject table creation
        $this->subtable = "CREATE TABLE IF NOT EXISTS subjectlist (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          subName VARCHAR(30) NOT NULL,
          class VARCHAR(30) NOT NULL,
          reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

        //question table creation
        $this->questiontable = "CREATE TABLE IF NOT EXISTS questionlist (
           id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
           question VARCHAR(30) NOT NULL,
           optionA VARCHAR(30) NOT NULL,
           optionB VARCHAR(30) NOT NULL,
           optionC VARCHAR(30) NOT NULL,
           optionD VARCHAR(30) NOT NULL,
           Answer VARCHAR(30) NOT NULL,
           subName VARCHAR(30) NOT NULL,
           class VARCHAR(30) NOT NULL,
            mark VARCHAR(30) NOT NULL,
           reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


        //user table creation
        $this->usertable = "CREATE TABLE IF NOT EXISTS userslist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      reg_no VARCHAR(30) NOT NULL,
    name VARCHAR(30) NOT NULL,
     class VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

        //exam table creation
        $this->examtble = "CREATE TABLE IF NOT EXISTS examlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_id VARCHAR(30) NOT NULL,
    question_id VARCHAR(30) NOT NULL,
    subject VARCHAR(30) NOT NULL,
    class VARCHAR(30) NOT NULL,
       answer VARCHAR(30) NOT NULL,
          mark VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";



        //result table creation
        $this->resulttble = "CREATE TABLE IF NOT EXISTS resultlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     username VARCHAR(30) NOT NULL,
      user_id VARCHAR(30) NOT NULL,
    subject VARCHAR(30) NOT NULL,
    class VARCHAR(30) NOT NULL,
       pass_or_fail VARCHAR(30) NOT NULL,
          mark VARCHAR(30) NOT NULL,
           percentage VARCHAR(30) NOT NULL,
           grade VARCHAR(30) NOT NULL,
              attended_q VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

        try {

            //result table 
            $this->conn->exec($this->resulttble);
            echo "Table resultlist created successfully";

            //exam table 
            $this->conn->exec($this->examtble);
            echo "Table examlist created successfully";

            //user table 
            $this->conn->exec($this->usertable);
            echo "Table userslist created successfully";

            //question table
            $this->conn->exec($this->questiontable);
            echo "Table questionlist created successfully";

            //subject table
            $this->conn->exec($this->subtable);
            echo "Table subjectlist created successfully";

            //class table 
            $this->conn->exec($this->classtable);
            echo "Table classlist created successfully";


            //adminlogin table
            $this->conn->exec($this->logintable);
            echo "Table adminlogin created successfully";
        } catch (PDOException $e) {
            echo $this->logintable . "<br>" . $e->getMessage();
        }
    }


    // public function migration()
    // {




    //     $this->conn->exec($this->logintable);
    // }
}




$tbl = new Table();
//$tbl->migration();
