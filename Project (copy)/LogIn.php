<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'LogIn';
require_once('Models/UserDataSet.php');
require_once('Models/UserData.php');
//This makes an new user data set.
$userDataSet = new UserDataSet();

//This allows
if(isset($_POST['login'])){

    $info = $userDataSet-> loginUser($_POST);

    if($info == true){
//        header("Location:index.php");
        echo"<script>history.go(-2); </script>";

    }
    else{
        echo 'wrong';
    }
}


if(isset($_POST['register']) && $_SESSION['Random'] == $_POST['Captcha']){
    //echo " controller ";

    $userDataSet->  signUpUser($_POST);


}
$_SESSION ['Random'] = rand(1,100);
require_once('Views/LogIn.phtml');
