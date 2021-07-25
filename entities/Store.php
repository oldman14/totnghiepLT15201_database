<?php

class Store{
    public $StoreID;
    public $StoreName;
    public $StoreAddress;
    public $StorePhone;
    public $StoreLat;
    public $StoreLong;
    public $Token;
    public $StoreImage;
    function __construct($StoreID)
    {
        $this->StoreID = $StoreID;
    }
}

?>