<?php
class login_model extends CI_Model{
    private $username;
    private $password;
    public function __construct() {
        parent::__construct();

    }
    /**
     * 
     * @param type $username
     * @param type $password
     * @return boolean
     * Validates data for login. Also stores in model
     */
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
    /**
     * Actually tries to log in the user
     * @return boolean
     */
    public function doLogin(){
        $username=$this->username;
        $password=$this->password;
        $query=$this->db->query('SELECT * FROM '.$this->db->dbprefix('users').' WHERE username='.$this->db->escape($username).' AND password="'.md5($password).'"');
   
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