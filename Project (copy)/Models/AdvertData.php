<?php

class AdvertData {

    protected $_advertId, $_advertTitle, $_advertPicture, $_advertDescription, $_advertPrice, $_fk_userId,$_uploadDate ;
//    $_photoName
    public function __construct($dbRow) {
        $this->_advertId = $dbRow['advertId'];
        $this->_advertTitle = $dbRow['advertTitle'];
        $this->_advertPicture = $dbRow['advertPicture'];
        $this->_advertDescription = $dbRow['advertDescription'];
        $this->_advertPrice = $dbRow['advertPrice'];
        $this->_fk_userId = $dbRow['fk_userId'];
        $this->_uploadDate = $dbRow['uploadDate'];
        $this->_username = $dbRow['username'];

    }

    public function getAdvertId()
    {
        return $this->_advertId;
    }

    public function getAdvertTitle()
    {
        return $this->_advertTitle;
    }

    public function getAdvertPicture()
    {
        return $this->_advertPicture;
    }

    public function getAdvertDescription() {
        return $this->_advertDescription;
    }

    public function getAdvertPrice() {
        return $this->_advertPrice;
    }

    public function getFkUserId() {
        return $this->_fk_userId;
    }

    public function getUploadDate() {
        return $this->_uploadDate;
    }

    public function getUsername() {
        return $this->_username;
    }









}