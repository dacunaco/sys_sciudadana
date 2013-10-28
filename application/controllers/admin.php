<?php
    if(!defined('BASEPATH'))    exit('No direct script access allowed');
    class Admin extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->library(array('pagination','encrypt'));
            $this->load->model('Admin_model');
        }
        function index(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                $data['alta'] = $this->Main_model->getIncidenciaByState(1);
                $data['media'] = $this->Main_model->getIncidenciaByState(2);
                $data['baja'] = $this->Main_model->getIncidenciaByState(3);
                $data['cero'] = $this->Main_model->getIncidenciaByState(4);
                $incidencias = $this->Main_model->getIndicencias();
        
                $this->load->library('googlemaps');

                $config['center'] = '-8.112,-79.0288';
                $config['zoom'] = 14;
                $config['map_div_id'] = 'map';
                $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                $config['places'] = TRUE;
                $this->googlemaps->initialize($config);

                foreach ($incidencias as $row){
                    $co = str_replace("(", "", $row->coordenadas);
                    $se = explode(",", $co);
                    $marker = array();
                    $marker['position'] = $se[0].','.$se[1];
                    $marker['infowindow_content'] = $row->nombres;
                    if($row->estado == "1"){
                        $marker['icon'] = base_url().'assets/images/icon-alta-resize.png';
                    }else if($row->estado == "2"){
                        $marker['icon'] = base_url().'assets/images/icon-media-resize.png';
                    }else if($row->estado == "3"){
                        $marker['icon'] = base_url().'assets/images/icon-baja-resize.png';
                    }else if($row->estado == "4"){
                        $marker['icon'] = base_url().'assets/images/icon-clear-resize.png';
                    }
                    $marker['animation'] = 'BOUNCE';
                    $this->googlemaps->add_marker($marker);
                }        

                $data['map'] = $this->googlemaps->create_map();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_main');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }            
        }
        
        function nueva_zona(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newZona');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_tipo_incidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newTipoIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_cuadrante(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newCuadrante');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nueva_urbanizacion(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newUrbanizacion');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_trabajador(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newTrabajador');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_incidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_tipo_incidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listTipoIncidentes');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_zonas(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listZonas');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_cuadrantes(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listCuadrantes');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_urbanizaciones(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listUrbanizacion');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_trabajadores(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listTrabajador');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_incidentes(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_listIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function buscar_incidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_searchIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporte_tipo_incidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTipoIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporte_tipo_incidente_zona(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZ');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporte_tipo_incidente_zona_estado(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZE');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporte_tipo_incidente_zona_urbanizacion(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'num_users' => $this->Admin_model->getNumUsers(),
                    'user' => $this->Admin_model->getUsersByName()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZU');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
    }
?>
