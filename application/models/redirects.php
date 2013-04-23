<?php
class redirects extends CI_Model{
    private $logged='/profile';
    private $notLogged='/login';
    public function __construct() {
        parent::__construct();
    }
    /**
     * Redirects if user is not suppoused to be on the page in particular
     */
    public function initial(){

        $this->ifLogged();
        $this->ifNotLogged();
        //echo 'test';
    }
    /**
     * Redirects the user if he is logged in
     */
    public function ifLogged(){
        if($this->session->userdata('il')){
            redirect($this->logged);
        }
    }
    /**
     * Redirects the user if he is NOT logged in
     */
    public function ifNotLogged(){
         if(!$this->session->userdata('il')){
            redirect($this->notLogged);
        }
    }
}