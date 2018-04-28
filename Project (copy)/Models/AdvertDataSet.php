<?php
//session_start();
require ('Database.php');
require ('AdvertData.php');
require ('UserData.php');

class AdvertDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();

    }

    public function fetchAllAdverts() {
        $sqlQuery = 'SELECT * FROM advert';
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);
        }
        return $dataSet;
    }

    public function insertAdvert($POST) {
        $advertTitle = $POST["advertTitle"];
        $advertPicture = $POST["advertPicture"];
        $advertDescription = $POST["advertDescription"];
        $advertPrice = $POST["advertPrice"];

        $fk_userId = $_SESSION['login_user'];


//        $fk_userId = 15;


        $sqlQuery = "INSERT INTO advert (advertTitle, advertPicture , advertDescription , advertPrice, fk_userId, uploadDate) VALUES ('$advertTitle' , '$advertPicture', 
                    '$advertDescription','$advertPrice', '$fk_userId',NOW())";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo ' success';} else {
            echo ' false';
        }
    }

    public function removeAdvert($POST){
        $advertId= $POST["id"];

        $sqlQuery = "DELETE FROM advert WHERE advertId = $advertId";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){ //; // execute the PDO statement
            echo ' success';} else {
            echo ' false';
        }

    }

    public function viewAdminList(){

        //get user id


        $sqlQuery = 'SELECT advert.advertId, advert.advertTitle, advert.advertPicture, users.username, advert.uploadDate
                     FROM advert
                     INNER JOIN users ON users.userId = advert.fk_userId';



        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new AdvertData($row);
        }

        return $dataSet;

    }

}


