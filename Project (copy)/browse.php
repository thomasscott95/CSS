<?php
session_start();
$view = new stdClass();
$view->pageTitle = 'browse';


require_once('Models/AdvertDataSet.php');
require_once('Models/AdvertData.php');

//This makes an new advert data set and also views the advert data set and pull the method fetchAllAdverts from the
// advert data set.
$advertDataSet = new AdvertDataSet();
$view->advertDataSet = $advertDataSet->fetchAllAdverts();

require_once('Views/browse.phtml');
