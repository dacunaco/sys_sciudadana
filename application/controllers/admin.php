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
                    'dni' => $this->session->userdata['user_data']['user_dni']
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
                );
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_reportTIZU');
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
                'strcodigo' => $this->input->post("codigo")
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
                    'dni' => $this->session->userdata['user_data']['user_dni']
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
                'strcodigo' => $this->input->post("codigo")
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
                
                $this->load->view('admin/header',$data);
                $this->load->view('admin/view_getMap');
                $this->load->view('admin/footer');
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
        
        function get_mapa_incidencia(){
            $this->load->library('googlemaps');

            $config['center'] = '-8.112,-79.0288';
            $config['zoom'] = 14;
            $config['map_div_id'] = 'map';
            $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
            $config['places'] = TRUE;
            $this->googlemaps->initialize($config);
                      
            
            $data['map'] = $this->googlemaps->create_map();
                
            $this->load->view('admin/view_map_incidencia',$data);
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
