<?php
class coins_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function addCoins($coins){
        $this->db->query('UPDATE '.$this->db->dbprefix('users').' SET coins=coins+'.(int)$coins.' WHERE id='.$this->session->userdata('id'));
        $return['success']=true;
        return $return;
        
    }
}