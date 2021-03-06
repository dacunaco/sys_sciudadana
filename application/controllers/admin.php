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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
        
                $this->load->library('googlemaps');

                $config['center'] = '-8.112,-79.0288';
                $config['zoom'] = 14;
                $config['map_div_id'] = 'map';
                $config['cluster'] = TRUE;
                $config['scrollwheel'] = FALSE;
                $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                $config['places'] = TRUE;
                $this->googlemaps->initialize($config);
                
                $mapa_principal = $this->db->get("incidente")->result();
                
                foreach ($mapa_principal as $row_mapa_principal){
                    $marker = array();
                    $marker['position'] = $row_mapa_principal->strcoordenadasincidente;
                    $marker['infowindow_content'] = $row_mapa_principal->strdescripcionincidente;
                    
                    $marcador = $this->db->get_where("tipo_incidente",array("idtipoincidente" => $row_mapa_principal->idtipoincidente))->result();
                    
                    foreach ($marcador as $row_marcador){
                        $marker['icon'] = base_url().'assets/images/tipo-incidente/'.$row_marcador->imgtipoincidente;
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
                    'departamentos' => $this->Admin_model->getDepartamentos()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newZona');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_tipo_incidente($mensaje = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['mensaje'] = $mensaje;
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
                    'zonas' => $this->db->get("zona")->result()
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
                    'zonas' => $this->db->get("zona")->result()
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
                    'perfil' => $this->db->get('perfil_trabajador')->result()
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newTrabajador');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function nuevo_incidente($coordenadas = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'zonas' => $this->db->get("zona")->result(),
                    'tipoincidentes' => $this->db->get("tipo_incidente")->result()
                );
                
                $data['coordenadas'] = $coordenadas;
                $data['trabajadores'] = $this->db->get('trabajador')->result();
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_newIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function listado_tipo_incidente($mensaje = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'tipo_incidentes' => $this->db->get("tipo_incidente")->result()
                );
                
                $data['mensaje'] = $mensaje;
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
                    'zonas' => $this->Admin_model->getZonas()
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
                    'cuadrantes' => $this->Admin_model->getCuadrantes()
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
                    'urbanizaciones' => $this->Admin_model->getUrbanizaciones()
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
                    'trabajadores' => $this->db->get("trabajador")->result()
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->library('googlemaps');

                $config['center'] = '-8.112,-79.0288';
                $config['zoom'] = 14;
                $config['map_div_id'] = 'map';
                $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                $config['places'] = TRUE;
                $this->googlemaps->initialize($config);


                $data['map'] = $this->googlemaps->create_map();
                
                $data['incidentes'] = $this->db->get_where('incidente',"strestadoincidente <> 'E' ")->result();
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['tipoincidente'] = $this->db->get("tipo_incidente")->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTipoIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporteTipoIncidente(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                $this->db->where("strestadoincidente <> 'E'");
                $data['incidentes'] = $this->db->get_where("incidente",array("idtipoincidente" => $this->input->post("tipo")))->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_report1');
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['tipoincidente'] = $this->db->get("tipo_incidente")->result();
                $data['zonas'] = $this->db->get("zona")->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZ');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporteTipoIncidenteZona(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['zonas'] = $this->db->get_where("zona",array("idzona" => $this->input->post("zona")))->result();
                $data['tipoincidente'] = $this->input->post("tipo");
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_report2');
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['tipoincidente'] = $this->db->get("tipo_incidente")->result();
                $data['zonas'] = $this->db->get("zona")->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZE');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporteTipoIncidenteZonaEstado(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['zonas'] = $this->db->get_where("zona",array("idzona" => $this->input->post("zona")))->result();
                $data['tipoincidente'] = $this->input->post("tipo");
                $data['estado'] = $this->input->post("estado");
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_report3');
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['tipoincidente'] = $this->db->get("tipo_incidente")->result();
                $data['zonas'] = $this->db->get("zona")->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZU');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reporteTipoIncidenteZonaUrbanizacion(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['zonas'] = $this->db->get_where("zona",array("idzona" => $this->input->post("zona")))->result();
                $data['tipoincidente'] = $this->input->post("tipo");
                $data['urbanizacion'] = $this->input->post("urbanizacion");
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_report4');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function newZona(){
            $zona = $this->input->post("zona");
            $departamento = $this->input->post("region");
            $provincia = $this->input->post("provincia");
            $distrito = $this->input->post("distrito");
            $count = $this->db->get("zona")->num_rows();
            $idzona = "ZN".$this->zerofill($count + 1, 9);
            
            $result = $this->Admin_model->insertZona($idzona,$zona,$departamento,$provincia,$distrito);
            
            if($result){
                echo "Se insertó correctamente la zona.";
            }
            
        }
        
        function editar_zona(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['zona'] = $this->Admin_model->getZonaById($this->input->get('zid'));
            
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editZona');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
            
        }
        
        function editZona(){
            $zona = $this->input->post("zona");
            $departamento = $this->input->post("region");
            $provincia = $this->input->post("provincia");
            $distrito = $this->input->post("distrito");
            $idzona = $this->input->post("id");
            
            $result = $this->Admin_model->modifyZona($idzona,$zona,$departamento,$provincia,$distrito);
            
            if($result){
                echo "Se modificó correctamente la zona.";
            }
            
        }
        
        function deleteZona(){
            $zona = $this->input->post("zona");
            
            $result = $this->Admin_model->deleteZona($zona);
            
            if($result){
                echo "Se eliminó correctamente la zona.";
            }
            
        }
        
        function newTipoIncidente(){
            $count = $this->db->get("tipo_incidente")->num_rows();
            $tipoincidente = "TI".$this->zerofill($count + 1, 9);
            $descripcion = $this->input->post("tipoincidente");
            for($i = 0; $i < count($_FILES); $i++)  {   
		if(!empty($_FILES['imagen'.$i]['name'])){
                    $respuesta[] = $this->doUpload($tipoincidente,$i, $_FILES['imagen'.$i],'assets/images/tipo-incidente/', 'jpg|png|jpeg|gif',9999, 9999, 0);               
            	}
            };
            
            if($respuesta[0] == 0){
                $this->nuevo_tipo_incidente(0);
            }else{
                foreach ($respuesta as $key => $value) {
                    foreach ($value as $key2 => $value2) {
                        $result = $this->Admin_model->insertTipoIncidente($value2['file_name'],$tipoincidente,$descripcion);
                        if($result){
                            $this->nuevo_tipo_incidente(1);
                        }
                    }
                }
            }
        }
        
        function deleteTipoIncidente(){
            $tipoincidente = $this->input->post("tipoincidente");
            
            $image = $this->Admin_model->extractImagesTipoIncidente($tipoincidente);

            foreach ($image as $row_image){
                if($this->delete("assets/images/tipo-incidente", $row_image->imgtipoincidente)){
                    $result = $this->Admin_model->deleteTipoIncidente($tipoincidente);
                    
                    if($result){
                        echo "Se eliminó correctamente el tipo incidente.";
                    }
                }
            }
        }
        
        function editar_tipo_incidente($mensaje = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'tipoincidente' => $this->db->get_where("tipo_incidente",array("idtipoincidente" => $this->input->get("tpid")))->result()
                );
                
                $data['id'] = $this->input->get("tpid");
                $data['mensaje'] = $mensaje;
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editTipoIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function editTipoIncidente(){
            $tipoincidente = $this->input->post("id");
            $imagen = $_FILES['imagen0']['name'];
            
            $image = $this->Admin_model->extractImagesTipoIncidente($tipoincidente);

            foreach ($image as $row_image){
                if($imagen == ""){
                    $data_insert = array(
                        'strtipoincidente' => $this->input->post("tipoincidente")
                    );
                    $result = $this->Admin_model->editTipoIncidente($data_insert,$tipoincidente);
                    if($result){
                        $this->listado_tipo_incidente(1);
                    }
                }else{
                    if($this->delete("assets/images/tipo-incidente", $row_image->imgtipoincidente)){
                        for($i = 0; $i < count($_FILES); $i++)  {   
                            if(!empty($_FILES['imagen'.$i]['name'])){
                                $respuesta[] = $this->doUpload($tipoincidente,$i, $_FILES['imagen'.$i],'assets/images/tipo-incidente/', 'jpg|png|jpeg|gif',9999, 9999, 0);               
                            }
                        };

                        if($respuesta[0] == 0){
                            $this->listado_tipo_incidente(0);
                        }else{
                            foreach ($respuesta as $key => $value) {
                                foreach ($value as $key2 => $value2) {
                                    $data_insert = array(
                                        'imgtipoincidente' => $value2['file_name'],
                                        'strtipoincidente' => $this->input->post("tipoincidente")
                                    );
                                    $result = $this->Admin_model->editTipoIncidente($data_insert,$tipoincidente);
                                    if($result){
                                        $this->listado_tipo_incidente(1);
                                    }
                                }
                            }
                        }
                    }
                    
                }
            }
        }
        
        function newCuadrante(){
            $zona = $this->input->post("zona");
            $cuadrante = $this->input->post("cuadrante");
            $count = $this->db->get("cuadrante")->num_rows();
            $idcuadrante = "CD".$this->zerofill($count + 1, 9);
            
            $result = $this->Admin_model->insertCuadrante($idcuadrante,$zona,$cuadrante);
            
            if($result){
                echo "Se insertó correctamente la zona.";
            }
            
        }
        
        function editar_cuadrante(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'zonas' => $this->db->get("zona")->result()
                );
                
                $data['cuadrante'] = $this->db->get_where("cuadrante",array("idcuadrante" => $this->input->get("cid")))->result();
            
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editCuadrante');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
            
        }
        
        function editCuadrante(){
            $cuadrante = $this->input->post("cuadrante");
            $zona = $this->input->post("zona");
            $idcuadrante = $this->input->post("id");
            
            $result = $this->Admin_model->modifyCuadrante($idcuadrante,$cuadrante,$zona);
            
            if($result){
                echo "Se modificó correctamente la zona.";
            }
        }
        
        function deleteCuadrante(){
            $cuadrante = $this->input->post("cuadrante");
            
            $result = $this->Admin_model->deleteCuadrante($cuadrante);
            
            if($result){
                echo "Se eliminó correctamente el cuadrante.";
            }
            
        }
        
        function newUrbanizacion(){
            $zona = $this->input->post("zona");
            $cuadrante = $this->input->post("cuadrante");
            $urbanizacion = $this->input->post("urbanizacion");
            $count = $this->db->get("urbanizacion")->num_rows();
            $idurbanizacion = "UR".$this->zerofill($count + 1, 9);
            
            $result = $this->Admin_model->insertUrbanizacion($idurbanizacion,$urbanizacion,$zona,$cuadrante);
            
            if($result){
                echo "Se insertó correctamente la urbanizacion.";
            }
        }
        
        function deleteUrbanizacion(){
            $urbanizacion = $this->input->post("urbanizacion");
            
            $result = $this->Admin_model->deleteUrbanizacion($urbanizacion);
            
            if($result){
                echo "Se eliminó correctamente la urbanización.";
            } 
        }
        
        function editar_urbanizacion(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'zonas' => $this->db->get("zona")->result()
                );
                
                $data['urbanizacion'] = $this->db->get_where("urbanizacion",array("idurbanizacion" => $this->input->get("uid")))->result();
            
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editUrbanizacion');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function editUrbanizacion(){
            $cuadrante = $this->input->post("cuadrante");
            $zona = $this->input->post("zona");
            $urbanizacion = $this->input->post("urbanizacion");
            $idurbanizacion = $this->input->post("id");
            
            $result = $this->Admin_model->modifyUrbanizacion($idurbanizacion,$urbanizacion,$cuadrante,$zona);
            
            if($result){
                echo "Se modificó correctamente la urbanización.";
            }
        }
        
        function newTrabajador(){
            $count = $this->db->get("trabajador")->num_rows();
            $idtrabajador = "TB".$this->zerofill($count + 1, 9);
            
            $data_insert = array(
                'idtrabajador' => $idtrabajador,
                'strnombres' => strtoupper($this->input->post("nombres")),
                'strapellidopaterno' => strtoupper($this->input->post("apellidopaterno")),
                'strapellidomaterno' => strtoupper($this->input->post("apellidomaterno")),
                'strdireccion' => $this->input->post("direccion"),
                'strdni' => $this->input->post("dni"),
                'strsexo' => $this->input->post("sexo"),
                'strtelefono' => $this->input->post("telefono"),
                'datfechanacimiento' => date("Y-m-d H:i:s",  strtotime($this->input->post("fechanacimiento"))),
                'strcodigo' => $this->input->post("codigo"),
                'idPerfilTrabajador' => $this->input->post("perfil")
            );
            
            $result = $this->Admin_model->insertTrabajador($data_insert);
            
            if($result){
                echo "Se insertó correctamente el trabajador.";
            }
        }
        
        function deleteTrabajador(){
            $trabajador = $this->input->post("trabajador");
            
            $result = $this->Admin_model->deleteTrabajador($trabajador);
            
            if($result){
                echo "Se eliminó correctamente el trabajador.";
            } 
        }
        
        function editar_trabajador(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'perfil' => $this->db->get("perfil_trabajador")->result()
                );
                
                $data['trabajador'] = $this->db->get_where("trabajador",array("idtrabajador" => $this->input->get("tid")))->result();
            
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editTrabajador');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function editTrabajador(){            
            $data_insert = array(
                'strnombres' => strtoupper($this->input->post("nombres")),
                'strapellidopaterno' => strtoupper($this->input->post("apellidopaterno")),
                'strapellidomaterno' => strtoupper($this->input->post("apellidomaterno")),
                'strdireccion' => $this->input->post("direccion"),
                'strdni' => $this->input->post("dni"),
                'strsexo' => $this->input->post("sexo"),
                'strtelefono' => $this->input->post("telefono"),
                'datfechanacimiento' => date("Y-m-d H:i:s",  strtotime($this->input->post("fechanacimiento"))),
                'strcodigo' => $this->input->post("codigo"),
                'idPerfilTrabajador' => $this->input->post("perfil")
            );
            
            $result = $this->Admin_model->editTrabajador($data_insert,  $this->input->post("id"));
            
            if($result){
                echo "Se modificó correctamente el trabajador.";
            }
        }
        
        function get_coordenadas(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->library('googlemaps');

                $config['center'] = '-8.112,-79.0288';
                $config['zoom'] = 14;
                $config['map_div_id'] = 'map';
                $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                $config['places'] = TRUE;
                $this->googlemaps->initialize($config);
                
                $marker = array();
                $marker['position'] = '-8.112,-79.0288';
                $marker['draggable'] = true;
                $marker['ondragend'] = 'document.getElementById("coordenadas").value = event.latLng.lat() + \', \' + event.latLng.lng();';
                $this->googlemaps->add_marker($marker);
                
                $data['map'] = $this->googlemaps->create_map();
                
                
                $this->load->view('admin/view_getMap',$data);
                
            }else{
                redirect('user');
            }  
        }
        
        function post_coordenadas(){
            $this->nuevo_incidente($this->input->post("coordenadas"));
        }
        
        function newIncidente(){
            $count = $this->db->get("incidente")->num_rows();
            $idincidente = "IN".$this->zerofill($count + 1, 9);
            
            $data_insert = array(
                'idincidente' => $idincidente,
                'strdescripcionincidente' => $this->input->post('descripcion'),
                'strcoordenadasincidente' => $this->input->post('coordenadas'),
                'strestadoincidente' => 'P',
                'datfechahoraincidente' => date('y-m-d', strtotime($this->input->post('fecha')))." ".  date('H:i:s', strtotime($this->input->post('hora'))),
                'datfechahoraregistroincidente' => date('Y-m-d H:i:s'),
                'imgincidente' => "",
                'idzona' => $this->input->post('zona'),
                'idtrabajador' => $this->input->post('trabajador'),
                'idtipoincidente' => $this->input->post('tipoincidente'),
                'idcuadrante' => $this->input->post('cuadrante'),
                'idurbanizacion' => $this->input->post('urbanizacion')
            );
            
            $result = $this->Admin_model->insertIncidente($data_insert);
            
            if($result){
                echo "Se insertó correctamente el incidente.";
            }
        }
        
        function listado_reportes(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportes');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function get_detalle_incidente(){
            $this->db->where("strestadodetalleincidente <> 'E'");
            $data['detalle'] = $this->db->get_where("detalle_incidente",array("idincidente" => $this->input->post("incidente")))->result();
            
            $this->load->view("admin/view_getDetalle",$data);
        }
        
        function get_edit_detalle_incidente(){
            $data['detalle'] = $this->db->get_where("detalle_incidente",array("iddetalleincidente" => $this->input->post("detalle")))->result();
            
            $this->load->view("admin/view_getDetalleIncidente",$data);
        }
        
        function eliminar_incidente(){
            $query = $this->Admin_model->deleteIncidente($this->input->post("incidente"));
            
            if($query){
                echo "1";
            }  else {
                echo "0";
            }
        }
        
        function newDetalleIncidente(){
            $count = $this->db->get("detalle_incidente")->num_rows();
            $idincidente = "DI".$this->zerofill($count + 1, 9);
            
            $data_insert = array(
                'iddetalleincidente' => $idincidente,
                'strestadodetalleincidente' => $this->input->post("estado"),
                'straccion' => $this->input->post("descripcion"),
                'datfechahoradetalleincidente' => date("Y-m-d", strtotime($this->input->post("fecha")))." ".$this->input->post("hora"),
                'idincidente' => $this->input->post("incidente")
            );
            
            $result = $this->Admin_model->insertDetalleIncidente($data_insert);
            
            if($result){
                echo "Se insertó correctamente el detalle al incidente.";
            }
        }
        
        function editar_detalle_incidencia(){
            $data_insert = array(
                'strestadodetalleincidente' => $this->input->post("estado"),
                'straccion' => $this->input->post("descripcion"),
                'datfechahoradetalleincidente' => date("Y-m-d", strtotime($this->input->post("fecha")))." ".$this->input->post("hora")
            );
            
            $result = $this->Admin_model->editDetalleIncidente($data_insert,  $this->input->post("detalle"));
            
            if($result){
                echo "Se modificó correctamente el detalle al incidente.";
            }
        }
        
        function eliminar_detalle_incidente(){
            $query = $this->Admin_model->deleteDetalleIncidente($this->input->post("detalle"));
            
            if($query){
                echo "1";
            }  else {
                echo "0";
            }
        }
        
        function editar_incidente($coordenadas = NULL){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni'],
                    'zonas' => $this->db->get("zona")->result(),
                    'tipoincidentes' => $this->db->get("tipo_incidente")->result(),
                    'incidente' => $this->db->get_where("incidente",array("idincidente" => $this->input->get("iid")))->result()
                );
                
                $data['coordenadas'] = $coordenadas;
                $data['trabajadores'] = $this->db->get('trabajador')->result();
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_editIncidente');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function editIncidente(){
            $data_insert = array(
                'strdescripcionincidente' => $this->input->post('descripcion'),
                'strcoordenadasincidente' => $this->input->post('coordenadas'),
                'datfechahoraincidente' => date('y-m-d', strtotime($this->input->post('fecha')))." ".  date('H:i:s', strtotime($this->input->post('hora'))),
                'imgincidente' => "",
                'idzona' => $this->input->post('zona'),
                'idtrabajador' => $this->input->post('trabajador'),
                'idtipoincidente' => $this->input->post('tipoincidente'),
                'idcuadrante' => $this->input->post('cuadrante'),
                'idurbanizacion' => $this->input->post('urbanizacion')
            );
            
            $result = $this->Admin_model->editIncidente($data_insert,  $this->input->post("incidente"));
            
            if($result){
                echo "Se modificó correctamente el incidente.";
            }
        }
        
        function concluirIncidente(){
            $query = $this->Admin_model->concluirIncidente($this->input->post("incidenteconclusion"));
            
            if($query){
                echo 1;
            }else{
                echo 0;
            }
        }
        
        function view_map(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->library('googlemaps');
                
                $incidencia = $this->db->get_where("incidente",array("idincidente" => $this->input->get("iid")))->result();
                
                foreach ($incidencia as $row_mapa_principal){
                    $config['center'] = $row_mapa_principal->strcoordenadasincidente;
                    $config['zoom'] = 14;
                    $config['map_div_id'] = 'map';
                    $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                    $config['places'] = TRUE;
                    $this->googlemaps->initialize($config);
                    
                    $marker = array();
                    $marker['position'] = $row_mapa_principal->strcoordenadasincidente;
                    $marker['infowindow_content'] = $row_mapa_principal->strdescripcionincidente;
                    
                    $marcador = $this->db->get_where("tipo_incidente",array("idtipoincidente" => $row_mapa_principal->idtipoincidente))->result();
                    
                    foreach ($marcador as $row_marcador){
                        $marker['icon'] = base_url().'assets/images/tipo-incidente/'.$row_marcador->imgtipoincidente;
                    }
                    
                    $marker['animation'] = 'BOUNCE';
                    $this->googlemaps->add_marker($marker);
                }   
                
                $data['map'] = $this->googlemaps->create_map();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_Map');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reportMapForm(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $data['tipoincidente'] = $this->db->get("tipo_incidente")->result();
                $data['zonas'] = $this->db->get("zona")->result();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportMap');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function reportMap(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->library('googlemaps');
                
                $incidencia = $this->db->get_where("incidente",array("idzona" => $this->input->post("zona"), "idtipoincidente" => $this->input->post("tipo")))->result();
                
                foreach ($incidencia as $row_mapa_principal){
                    $config['center'] = '-8.112,-79.0288';
                    $config['zoom'] = 14;
                    $config['map_div_id'] = 'map';
                    $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
                    $config['places'] = TRUE;
                    $this->googlemaps->initialize($config);
                    
                    $marker = array();
                    $marker['position'] = $row_mapa_principal->strcoordenadasincidente;
                    $marker['infowindow_content'] = $row_mapa_principal->strdescripcionincidente;
                    
                    $marcador = $this->db->get_where("tipo_incidente",array("idtipoincidente" => $row_mapa_principal->idtipoincidente))->result();
                    
                    foreach ($marcador as $row_marcador){
                        $marker['icon'] = base_url().'assets/images/tipo-incidente/'.$row_marcador->imgtipoincidente;
                    }
                    
                    $marker['animation'] = 'BOUNCE';
                    $this->googlemaps->add_marker($marker);
                }   
                
                $data['map'] = $this->googlemaps->create_map();
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_Map');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function cargarProvincias(){
            $departamento = $this->input->post("departamento");
            
            $result = $this->Admin_model->getProvincias($departamento);
            
            echo '<option value="">Seleccione una provincia</option>';
            foreach ($result as $row_provincia){
                echo '<option value="'.$row_provincia->IdProvincia.'">'.$row_provincia->Nombre.'</option>';
            }
        }
        
        function cargarCuadrantes(){
            $zona = $this->input->post("zona");
            
            $result = $this->Admin_model->getCuadrantesById($zona);
            
            echo '<option value="">Seleccione un cuadrante</option>';
            foreach ($result as $row_cuadrante){
                echo '<option value="'.$row_cuadrante->idcuadrante.'">'.$row_cuadrante->strnombrecuadrante.'</option>';
            }
        }
        
        function cargarUrbanizaciones(){
            $cuadrante = $this->input->post("cuadrante");
            
            $result = $this->Admin_model->getUrbanizacionesById($cuadrante);
            
            echo '<option value="">Seleccione una urbanización</option>';
            foreach ($result as $row_urbanizacion){
                echo '<option value="'.$row_urbanizacion->idurbanizacion.'">'.$row_urbanizacion->strnombreurbanizacion.'</option>';
            }
        }
        
        
        function cargarDistritos(){
            $provincia = $this->input->post("provincia");
            
            $result = $this->Admin_model->getDistritos($provincia);
            
            echo '<option value="">Seleccione un distrito</option>';
            foreach ($result as $row_distrito){
                echo '<option value="'.$row_distrito->IdDistrito.'">'.$row_distrito->Nombre.'</option>';
            }
        }
        
        function reportGP(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'foto' => $this->session->userdata['user_data']['user_foto'],
                    'sexo' => $this->session->userdata['user_data']['user_sex'],
                    'nombres' => $this->session->userdata['user_data']['user_name'],
                    'apellidos' => $this->session->userdata['user_data']['user_lastname'],
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                
                $axis_data = array();
                $num_data = array();
                $percentage = array();
                $aux = array();
                
                $axis = $this->db->query("CALL sp_getReporteTI()")->result();
                
                
                foreach ($axis as $row){
                    $axis_data[] = $row->strtipoincidente;
                    $num_data[] = intval($row->total);
                    $aux[] = array($row->strtipoincidente,  intval($row->total));
                }
                
                $series_data[] = array('name' => 'Tipos de Incidentes', 'data' => $num_data);
                
                $percentage[] = array('type' => 'pie', 'name' => 'Incidentes', 'data' => $aux);
                
                $this->db->freeDBResource($this->db->conn_id);
                
                $mes1 = date('m');
                $mes2 = date('m',  strtotime("-1 month"));
                
                $axis2 = $this->db->query("CALL sp_getReporteTIM($mes1,$mes2)")->result();
                $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre");
                
                $data['mes1'] = $meses[intval($mes1)-1];
                $data['mes2'] = $meses[intval($mes2)-1];
                
                $mes1_aux = array();
                $mes2_aux = array();
                
                foreach ($axis2 as $row2){
                    $mes1_aux[] = intval($row2->mes1);
                    $mes2_aux[] = intval($row2->mes2);
                }
                
                $series_data2 = array(array('name' => $meses[intval($mes1)-1], 'data' => $mes1_aux),array('name' => $meses[intval($mes2)-1], 'data' => $mes2_aux));
                
                $this->db->freeDBResource($this->db->conn_id);
                
                $data['series_data2'] = json_encode($series_data2);
                $data['series_data'] = json_encode($series_data);
                $data['axis_data'] = json_encode($axis_data);
                $data['percentage'] = json_encode($percentage);
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportGP');
                $this->load->view('admin/footer');
            }else{
                redirect('user');
            }  
        }
        
        function ajax_get_data(){
            $mes1 = $this->input->post("mes1");
            $mes2 = $this->input->post("mes2");
            
            $axis2 = $this->db->query("CALL sp_getReporteTIM($mes1,$mes2)")->result();

            $mes1_aux = array();
            $mes2_aux = array();

            foreach ($axis2 as $row2){
                $mes1_aux[] = intval($row2->mes1);
                $mes2_aux[] = intval($row2->mes2);
            }
            
            $series_data[] = $mes1_aux;
            $series_data[] = $mes2_aux;
            
            echo json_encode(array('status' => 'ok', 'series_data' => $series_data));
        }
        
        function zerofill($entero, $largo){
            $entero = (int)$entero;
            $largo = (int)$largo;

            $relleno = '';
            if (strlen($entero) < $largo) {
                $relleno = str_repeat('0', $largo - strlen($entero));
            }
            return $relleno . $entero;
        }
        
        function doUpload($product,$i,$files, $dir, $kind, $size = NULL, $width = NULL, $height = NULL, $name = NULL){
            unset($config);
            if($name != NULL){ 	 $config['file_name']  = $name; 	}
            if($size != NULL){ 	 $config['max_size']   = $size; 	}
            if($width != NULL){  $config['max_width']  = $width; 	}
            if($height != NULL){ $config['max_height'] = $height; 	}
            $config['image_library']  = 'gd2';
            $config['upload_path']   = './'.$dir.'/';
            $config['allowed_types'] = $kind;
            $config['overwrite']     = FALSE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name']     = 'TRUE';

            $this->load->library('upload',$config);

            if(!empty($files['name'])){
	        if(!$upload = $this->upload->do_upload('imagen'.$i)){    
                    return 0;
		}else{
                    $data =array('data' =>$this->upload->data());
                    return $data;
                }
            }
	}
        
        function delete($dir,$file,$image = NULL)
	{
		$return = array();
		$archivo1  = './'.$dir.'/'.$file;
                $thumb = explode('.', $file);
                $archivo2  = './'.$dir.'/thumbnails/'.$thumb[0]."_thumb.".$thumb[1];
		if (file_exists($archivo1)) {
		    if(unlink($archivo1)){
		    	$return[0] = TRUE; 
		    } else {
		    	$return[0] = FALSE; 
		    }
		}
		if (file_exists($archivo2)) {
		    if(unlink($archivo2)){
		    	$return[1] = TRUE; 
		    } else {
		    	$return[2] = FALSE; 
		    }
		}
                return TRUE;
	}
    }
?>
