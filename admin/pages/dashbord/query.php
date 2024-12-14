<?php


require("../../lib/db.php");
class Dash extends DBconn
{


    public $slctquestion;
    public $quresult;
    public $slctexams;
    public $examsresult;

    public $selctuser;
    public $userresult;

    public $pass;
    public $passresult;

    public $fail;
    public $failresult;

    public $attented;
    public $atresult;

    public $userchart;
    public $chartresult;

    public $data;
    public $getdata;

    public function __construct()
    {
        $this->dbConnect();
    }



    public function display_img()
    {

        try {

            $this->data =  $this->conn->prepare("SELECT * FROM adminlogin ");
            $this->data->execute();
            $this->getdata = $this->data->setFetchMode(PDO::FETCH_ASSOC);
            $dd = $this->data->fetchAll();

            foreach ($dd as $data) {
                $_SESSION['admin_img'] = $data['image'];
            }
        } catch (PDOException $e) {
            echo $this->data . "<br>" .
                $e->getMessage();
        }
    }


    public function select_que()
    {
        try {
            $this->slctquestion = $this->conn->prepare("SELECT COUNT(id) FROM questionlist");
            $this->slctquestion->execute();
            $this->quresult = $this->slctquestion->setFetchMode(PDO::FETCH_ASSOC);


            $data = $this->slctquestion->fetchAll();

            foreach ($data as $datas) {


                return $datas['COUNT(id)'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function select_exam()
    {
        try {
            $this->slctexams = $this->conn->prepare("SELECT COUNT(id) FROM resultlist");
            $this->slctexams->execute();
            $this->examsresult = $this->slctexams->setFetchMode(PDO::FETCH_ASSOC);


            $datax = $this->slctexams->fetchAll();

            foreach ($datax as $datas) {


                return $datas['COUNT(id)'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function users()
    {
        try {
            $this->selctuser = $this->conn->prepare("SELECT COUNT(id) FROM userslist");
            $this->selctuser->execute();
            $this->userresult = $this->selctuser->setFetchMode(PDO::FETCH_ASSOC);


            $datax = $this->selctuser->fetchAll();

            foreach ($datax as $datas) {


                return $datas['COUNT(id)'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function pass()
    {
        try {
            $this->pass = $this->conn->prepare("SELECT COUNT(pass_or_fail) FROM resultlist WHERE pass_or_fail='passed' ");
            $this->pass->execute();
            $this->passresult = $this->pass->setFetchMode(PDO::FETCH_ASSOC);


            $datax = $this->pass->fetchAll();

            foreach ($datax as $datas) {


                return $datas['COUNT(pass_or_fail)'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function fail()
    {
        try {
            $this->pass = $this->conn->prepare("SELECT COUNT(pass_or_fail) FROM resultlist WHERE pass_or_fail='failed' ");
            $this->pass->execute();
            $this->passresult = $this->pass->setFetchMode(PDO::FETCH_ASSOC);


            $datax = $this->pass->fetchAll();

            foreach ($datax as $datas) {


                return $datas['COUNT(pass_or_fail)'];
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }





    public function attented()
    {
        try {
            $this->attented = $this->conn->prepare("
                SELECT COUNT(*) AS total, DATE(reg_date) AS date_only
                FROM resultlist
                GROUP BY DATE(reg_date)
            ");
            $this->attented->execute();
            $datax = $this->attented->fetchAll(PDO::FETCH_ASSOC);

            $countsArray = [];
            $dateArray = [];

            foreach ($datax as $datas) {
                $countsArray[] = $datas['total'];
                $dateArray[] = $datas['date_only'];
            }
            $barData = json_encode($countsArray);
            $barDate = json_encode($dateArray);

            $_SESSION['barData'] = $barData;
            $_SESSION['barDate'] = $barDate;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }




    public function usersTotal()
    {
        try {
            $this->userchart = $this->conn->prepare("
                SELECT COUNT(*) AS total, DATE(reg_date) AS date_only
                FROM userslist
                GROUP BY DATE(reg_date)
            ");
            $this->userchart->execute();
            $datax = $this->userchart->fetchAll(PDO::FETCH_ASSOC);

            $lineData = [];
            $lineDate = [];

            foreach ($datax as $datas) {
                $lineData[] = $datas['total'];
                $lineDate[] = $datas['date_only'];
            }
            $linesData = json_encode($lineData);
            $linesDate = json_encode($lineDate);

            $_SESSION['lineData'] = $linesData;
            $_SESSION['lineDate'] = $linesDate;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}


$dash = new Dash();
$dash->select_que();
$dash->select_exam();
$dash->users();
$dash->attented();
$dash->usersTotal();
$dash->display_img();
