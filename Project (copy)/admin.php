<?php
session_start();

require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');

$view = new stdClass();
$view->pageTitle = 'Admin';

//This makes a new advert data set.
$advertDataSet = new AdvertDataSet();

//If the isset is the 'id'(the advert ID) then it will remove the advert from the list, this is only used by the admin.
if(isset($_GET['id'])){

    $advertDataSet->removeAdvert($_GET);
}

//This will view the advert data set and will view the viewAdminList methos which is located within the Advert data set.
$view->advertDataSet = $advertDataSet->viewAdminList();

require_once('Views/admin.phtml');
