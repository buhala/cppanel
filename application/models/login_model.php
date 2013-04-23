<?php
class login_model extends CI_Model{
    private $username;
    private $password;
    public function __construct() {
        parent::__construct();

    }
    public function validateData($username,$password){
        $this->username=$username;
        $this->password=$password;
        $return['success']=true;
        if(strlen($username)<3){
            $return['error'][]='SHORT_USERNAME';
            $return['success']=false;
        }
        if(strlen($password)<3){
            $return['error'][]='SHORT_PASSWORD';
            $return['success']=false;
        }
        return $return;
    }
    public function doLogin(){
        $username=$this->username;
        $password=$this->password;
        $query=$this->db->query('SELECT * FROM ps_users WHERE username='.$this->db->escape($username).' AND password="'.md5($password).'"');
   
        if($query->num_rows()!=1){
            
            $return['success']=false;
            $return['error'][]='USER_PASS_WRONG';
            
        }
        else{
            
            $return['success']=true;
            $this->session->set_userdata('il',true);
            $this->session->set_userdata('id',$query->row()->id);
            redirect('/profile');
        }
        return $return;
    }
}