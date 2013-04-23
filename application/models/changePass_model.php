<?php
class changePass_model extends CI_Model{
    private $curpass;
    private $newpass;
    private $newpassagain;
    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @param type $curpass
     * @param type $newpass
     * @param type $newpassagain
     * @return boolean
     * Validates data; Also adds temp data to the model
     */
    public function validateData($curpass,$newpass,$newpassagain){
        $this->curpass=$curpass;
        $this->newpass=$newpass;
        $this->newpassagain=$newpassagain;
        $return['success']=true;
        if(strlen($curpass)<3){
            $return['success']=false;
            $return['error'][]='CURPASS_SHORT';
        }
        if(strlen($newpass)<3){
            $return['error'][]='NEWPASS_SHORT';
            $return['success']=true;
        }
        if($newpass!=$newpassagain){
            $return['error'][]='NEWPASS_MISMATCH';
            $return['success']=false;
        }
        return $return;
    }
    /**
     * Validates if the old pass is right
     * @return A LOT of stuff
     */
    public function doChange(){
        $curpass=$this->curpass;
        $newpass=$this->newpass;
       // echo md5($curpass);
        if($this->db->query('SELECT * FROM '.$this->db->dbprefix('users').' WHERE password="'.md5($curpass).'" AND id='.$this->session->userdata('id').'')->num_rows()==0){
            $return['error'][]='CURPASS_MISMATCH';
            $return['success']=false;
            
        }
        else{
                $this->db->query('UPDATE '.$this->db->dbprefix('users').' SET password="'.md5($newpass).'" WHERE id='.$this->session->userdata('id'));
            $return['success']=true;
            
            
        }
        return $return;
    }

}
?>
