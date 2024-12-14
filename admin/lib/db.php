<?php

require("conn.php");

class DBconn extends Connect
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dbCheck()
    {

        try {
            $stmt = $this->conn->query("SHOW DATABASES LIKE '$this->database'");
            $exists = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($exists) {
                //echo "Database '$this->database' exists.";
            } else {
                $sql = "CREATE DATABASE IF NOT EXISTS `$this->database`";
                $this->conn->exec($sql);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public  function dbConnect()
    {
        try {
            $this->conn =  new PDO("mysql:host=localhost;dbname=examportal", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "db";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


$db = new DBconn();

$db->dbCheck();
