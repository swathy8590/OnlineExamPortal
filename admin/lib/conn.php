<?php
session_start();
class Connect
{

    public $conn;
    protected $database;
    protected $localhost;
    protected $username;
    protected $password;


    public function __construct()
    {
        $this->database = "examportal";
        $this->localhost = "mysql:host=localhost;";
        $this->username = "root";
        $this->password = "";
        $this->conn =  new PDO($this->localhost, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
