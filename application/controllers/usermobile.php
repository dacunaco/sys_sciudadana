<?php
    if(!defined('BASEPATH'))    exit('No direct script access allowed');
    class Usermobile extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
            $this->load->model('Usermobile_model');
        }
        function index(){
            if(!$this->session->userdata('user_data')){
                $this->load->view('mobile/view_login'); 
            }else{
                redirect('mobile');
            }            
        }
        function login(){
                $username = $this->input->post('usuario');
                $password = $this->input->post('password');
                $user_data = $this->Usermobile_model->check_login($username, $this->encrypt->encode_security($password));
                
                if(!$user_data){
                    echo 0;
                }else{
                    $this->session->set_userdata('user_data', $user_data);
                    redirect('mobile');
                }
        }
        function logout(){
            $this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            redirect('usermobile');
        }
    }
?>
