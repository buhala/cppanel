<?php
/**
 * Redirection class, depending on if the user is logged in, redirect him!
 */
class redirectController extends CI_Controller{
    /**
     * The only function in this class, do the basic redirect
     */
    public function index(){
        //$this->load->model('redirects');
        //echo 'TEST';
        $this->redirects->initial();
    }
}