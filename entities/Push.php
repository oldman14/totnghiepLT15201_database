<?php 

class Push {
    private $title;
    private $message;
    private $image;

    function __construct($title, $message, $image) {
         $this->title = $title;
         $this->message = $message; 
         $this->image = $image; 
    }
    
    public function getPush() {
        $res = array();
        $res['data']['title'] = $this->title;
        $res['data']['message'] = $this->message;
        $res['data']['image'] = $this->image;
        return $res;
    }
 
}