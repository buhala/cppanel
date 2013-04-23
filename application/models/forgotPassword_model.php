<?php
class forgotPassword_model extends CI_Model{
    private $email;
    public function __construct() {
        parent::__construct();
    }
    public function validateData($email){
        $this->email=$email;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)!==false){
            $return['success']=true;
        }
        else{
            $return['success']=false;
            $return['error'][]='INVALID_MAIL';
        }
        return $return;
    }
    public function resetPass(){
        

        $query=$this->db->query('SELECT email FROM '.$this->db->dbprefix('users').' WHERE email='.$this->db->escape($this->email));
        if($query->num_rows()<1){
            $return['error'][]='NOT_EXIST';
            $return['success']=false;
        }
        else{
            
            $this->load->helper('string');
            $newpass=random_string('alnum',16);
            $this->db->query('UPDATE '.$this->db->dbprefix('users').' SET password="'.md5($newpass).'"');
            $row=$query->row();
            $return['newpass']=$newpass;
            $return['email']=$row->email;
            $return['success']=true;
        }
        return $return;
    }
}
