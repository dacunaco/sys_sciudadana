<?php
    if(!defined('BASEPATH'))    exit('No direct script access allowed');
    class User extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
            $this->load->model('User_model');
        }
        function index(){
            if(!$this->session->userdata('user_data')){
                $this->load->view('user/view_login'); 
            }else{
                redirect('admin');
            }            
        }
        function login(){
                $username = $this->input->post('login');
                $password = $this->input->post('password');
                $user_data = $this->User_model->check_login($username, $this->encrypt->encode_security($password));
                
                if(!$user_data){
                    $this->session->set_flashdata('login_error', TRUE);
                    $data['mensaje'] = "Usuario o clave incorrecta";
                    $this->load->view('user/view_login',$data);
                }else{
                    $this->session->set_userdata('user_data', $user_data);
                    redirect('admin');
                }
        }
        function logout(){
            $this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            redirect('user');
        }
    }
?>
