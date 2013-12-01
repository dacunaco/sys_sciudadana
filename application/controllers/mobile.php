<?php
    if(!defined('BASEPATH'))    exit('No direct script access allowed');
    class Mobile extends CI_Controller{
        function __construct() {
            parent::__construct();
            $this->load->library('encrypt');
            $this->load->model('Admin_model');
        }
        function index(){
            if($this->session->userdata('user_data')){
                $data = array(
                    'trabajador' => $this->session->userdata['user_data']['user_id'],
                    'zonas' => $this->db->get("zona")->result(),
                    'tipoincidentes' => $this->db->get("tipo_incidente")->result()
                );
                $this->load->view('mobile/view_main',$data); 
            }else{
                redirect('usermobile'); 
            }            
        }
        
        function registrarIncidente(){
            $count = $this->db->get("incidente")->num_rows();
            $idincidente = "IN".$this->zerofill($count + 1, 9);
            
            $data_insert = array(
                'idincidente' => $idincidente,
                'strdescripcionincidente' => $this->input->post('descripcion'),
                'strcoordenadasincidente' => $this->input->post('lat').",".$this->input->post('lng'),
                'strestadoincidente' => 'P',
                'datfechahoraincidente' => $this->input->post('fechahora'),
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
        
        function zerofill($entero, $largo){
            $entero = (int)$entero;
            $largo = (int)$largo;

            $relleno = '';
            if (strlen($entero) < $largo) {
                $relleno = str_repeat('0', $largo - strlen($entero));
            }
            return $relleno . $entero;
        }
    }
?>
