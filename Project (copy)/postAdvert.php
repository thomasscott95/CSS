<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'postAdvert';
require_once('Views/postAdvert.phtml');
require_once('Models/AdvertDataSet.php');

$advertDataSet = new AdvertDataSet();

if(!isset($_SESSION['login_user'])){

}

if(isset($_POST['submit'])){
    echo 'CONTROLLER';

    $advertDataSet -> insertAdvert($_POST);
}