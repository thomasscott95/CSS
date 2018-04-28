<?php
session_start();

require_once('Models/WatchlistDataSet.php');
require_once('Models/WatchlistData.php');

$view = new stdClass();
$view->pageTitle = 'Watchlist';

$watchListDataSet = new WatchlistDataSet();

if (isset($_GET['id'])) {
    $advertId = $_GET["id"];
    $fk_userId = $_SESSION['login_user'];

    $watchListDataSet->insertIntoWatchList($fk_userId, $advertId);
}

$view->watchListDataSet = $watchListDataSet->viewWatchList();


require_once('Views/Watchlist.phtml');