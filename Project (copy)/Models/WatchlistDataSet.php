<?php
//session_start();
require ('Database.php');
require ('WatchlistData.php');

class WatchlistDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

//    public function retrieveAllUsers() {
//        $sqlQuery = 'SELECT * FROM users';
//
//        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
//        $statement->execute(); // execute the PDO statement
//
//        $dataSet = [];
//        while ($row = $statement->fetch()) {
//            $dataSet[] = new UserData($row);
//        }
//        return $dataSet;
//    }

    public function viewWatchList(){

        //get user id


        $sqlQuery = 'SELECT watchlist.watchlistId, advert.advertTitle, advert.advertDescription, advert.advertPicture, advert_owner.email, advert_owner.contactNo
                     FROM users
                     INNER JOIN watchlist ON watchlist.fk_userId=users.userId
                     INNER JOIN advert ON advert.advertId = watchlist.fk_advertId
                     INNER JOIN users AS advert_owner ON advert_owner.userId = advert.fk_userId
                     WHERE users.userId = ' . $_SESSION["login_user"];



        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WatchlistData($row);
        }

        return $dataSet;

    }


    public function insertIntoWatchList($userId, $advertId){

        $sqlQuery = "INSERT INTO watchlist (fk_userId,fk_advertId) values($userId,$advertId)";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new WatchlistData($row);
        }

        return $dataSet;

    }


}


