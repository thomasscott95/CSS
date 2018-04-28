<?php

class WatchlistData {

    protected $_watchlistId, $_fk_userId, $_fk_advertId, $_advertTitle, $_advertDescription, $_advertPicture, $_userEmail, $_userContactNo  ;

    public function __construct($dbRow) {
        $this->_watchlistId = $dbRow['watchlistId'];
        $this->_fk_userId = $dbRow['userId'];
        $this->_fk_advertId = $dbRow['advertId'];
        $this->_advertTitle = $dbRow['advertTitle'];
        $this->_advertDescription = $dbRow['advertDescription'];
        $this->_advertPicture = $dbRow['advertPicture'];
        $this->_userEmail = $dbRow['email'];
        $this->_userContactNo = $dbRow['contactNo'];



    }

    public function getWatchlistId() {
        return $this->_watchlistId;
    }

    public function getFkUserId() {
        return $this->_fk_userId;
    }

    public function getAdvertId() {
        return $this->_fk_advertId;
    }
    public function getAdvertTitle() {
        return $this->_advertTitle;
    }

    public function getAdvertDescription() {
        return $this->_advertDescription;
    }

    public function getAdvertPicture() {
        return $this->_advertPicture;
    }
    public function getUserEmail() {
        return $this->_userEmail;
    }

    public function getUserContactNo() {
        return $this->_userContactNo;
    }









}