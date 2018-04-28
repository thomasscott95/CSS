<?php
//session_start();
require ('Database.php');
require ('UserData.php');

class UserDataSet {
    protected $_dbHandle, $_dbInstance;
        
    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function retrieveAllUsers() {
        $sqlQuery = 'SELECT * FROM users';
                
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement
        
        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }


    public function retrieveAllUserNames() {
        $sqlQuery = 'SELECT username FROM users';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new UserData($row);
        }
        return $dataSet;
    }


    public function loginUser($POST) {

        $username = $POST["username"];


        $sqlQuery = "SELECT * FROM users WHERE username = '$username'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet=null;
        while ($row = $statement->fetch()) {
            $dataSet = new UserData($row);
        }
        //echo 'works';
        if($dataSet==null){
            return false;
        } else {
            //echo 'works';
            if((password_verify(htmlentities($_POST["password"]), $dataSet->getPassword())) && ($username==$dataSet->getUserName() )){
                echo 'successfully logged in ';
                //var_dump($dataSet);
                $_SESSION['login_user'] = $dataSet->getUserId();
                echo $_SESSION['login_user'];
                return 'true';
            } else {
                echo 'Wrong password';
                return 'false';
            }
        }
    }



    public function signUpUser($POST) {


        $username = $POST["username"];
        $password = password_hash($POST["password"], PASSWORD_BCRYPT);
        $email = $POST["email"];
        $address = $POST["address"];
        $postcode = $POST["postcode"];
        $contactNo = $POST["contactNo"];

//        $fk_UserId = 4;




        $sqlQuery = "INSERT INTO users (username, password, email, postcode,  address, contactNo) VALUES ('$username', '$password', 
                    '$email','$postcode','$address','$contactNo')";
        //echo $sqlQuery;
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        if($statement->execute()){  //; // execute the PDO statement
            echo ' success';
        } else {
            echo ' false';
        }
    }
}


