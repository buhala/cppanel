<?php
class login extends CI_Controller{
  
    public function index(){
        $this->redirects->ifLogged();
        if($this->input->post('act')=='Login'){
            $this->load->model('login_model');
            $rs=$this->login_model->validateData($this->input->post('username'),$this->input->post('password'));
            if($rs['success']==false){
                $data=$rs;
            }
            else{
                $data=$this->login_model->doLogin();
                if($data['success']==true){
                    redirect('/profile');
                }
            }
            
        }
        else{
            $data=array();
        }
        $this->load->view('siteTop');
       $this->load->view('loginForm',$data);
        $this->load->view('siteFooter');
    }
    public function forgotPassword(){
    $this->redirects->ifLogged();
    $this->load->view('siteTop');
    if($this->input->post('act')=='Change it'){
        $this->load->model('forgotPassword_model');
        $data=$this->forgotPassword_model->validateData($this->input->post('email'));
        if($data['success']==true){
            $data=$this->forgotPassword_model->resetPass();
            if($data['success']==true){
                $this->load->library('email');
                $this->email->from('support@CPPanel.com','Support');
                $this->email->subject('Password reset');
                $this->email->message('Your new password is '.$data['newpass']);
                $this->email->to($data['email']);
                $this->email->send();
            }
        }
    }
    else{
        $data=array();
    }
    $this->load->view('forgotPassword',$data);
    $this->load->view('siteFooter');
    }
}
