<?php
class profile extends CI_Controller{
    public function index(){
        $this->redirects->ifNotLogged();
        $this->load->view('siteTop');
        $this->load->view('profileList');
        $this->load->view('siteFooter');
    }
    public function changePass(){
        $this->redirects->ifNotLogged();
        $this->load->view('siteTop');
        if($this->input->post('act')=='Change it!'){
            $this->load->model('changePass_model');
            $rs=$this->changePass_model->validateData($this->input->post('curpass'),$this->input->post('newpass'),$this->input->post('newpassagain'));
            if($rs['success']==false){
                $data=$rs;
            }
            else{
                $data=$this->changePass_model->doChange();
            }
        }
        else{
            $data=array();
        }
        $this->load->view('changePass',$data);
        $this->load->view('siteFooter');
        
    }
        public function logout(){
        $this->session->sess_destroy();
        $this->redirects->ifNotLogged();
    }
        public function coins(){
            $this->load->view('siteTop');
            if($this->input->post('act')=='Add coins'){
                $this->load->model('coins_model');
                $data=$this->coins_model->addCoins($this->input->post('coins'));
            }
            else{
                $data=array();
            }
            
            $this->load->view('addCoins',$data);
            $this->load->view('siteFooter');
        }

       
}
