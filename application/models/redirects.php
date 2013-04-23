<?php
class redirects extends CI_Model{
    private $logged='/profile';
    private $notLogged='/login';
    public function __construct() {
        parent::__construct();
    }
    public function initial(){

        $this->ifLogged();
        $this->ifNotLogged();
        echo 'test';
    }
    public function ifLogged(){
        if($this->session->userdata('il')){
            redirect($this->logged);
        }
    }
    public function ifNotLogged(){
         if(!$this->session->userdata('il')){
            redirect($this->notLogged);
        }
    }
}