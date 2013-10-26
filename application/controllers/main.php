<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
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
        /*$config['placesAutocompleteInputID'] = 'address';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport*/
        $this->googlemaps->initialize($config);

        /*$marker = array();
        $marker['position'] = '-8.112,-79.0288';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("coordenada").value = "("+event.latLng.lat()+ ","+event.latLng.lng()+")";';
        $this->googlemaps->add_marker($marker);*/
        
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
        
        $this->load->view('main/view_main',$data);
    }
    
    function nueva_incidencia(){
        $data['co'] = $this->input->get('co');
        $this->load->view('includes/view_nincidencia',$data);
    }
    
    function newIncidencia(){
        $data_insert = array(
            'nombres' => $this->input->post('names'),
            'estado' => $this->input->post('estado'),
            'coordenadas' => $this->input->post('coordenadas'),
            'descripcion' => $this->input->post('descripcion')
        );
        
        $result = $this->Main_model->saveIncidencia($data_insert);
        
        if($result){
            redirect('main');
        }
    }
    
    function listIncidenciasById(){
        $data['alta'] = $this->Main_model->getIncidenciaByState(1);
        $data['media'] = $this->Main_model->getIncidenciaByState(2);
        $data['baja'] = $this->Main_model->getIncidenciaByState(3);
        $data['cero'] = $this->Main_model->getIncidenciaByState(4);
        $incidencias = $this->Main_model->getIndicenciasById($this->input->get('iid'));
        
        $this->load->library('googlemaps');

        $config['center'] = '-8.112,-79.0288';
        $config['zoom'] = 14;
        $config['map_div_id'] = 'map';
        $config['places'] = TRUE;
        $config['mapTypeControlStyle'] = 'DROPDOWN_MENU';
        $config['placesAutocompleteInputID'] = 'address';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '-8.112,-79.0288';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("coordenada").value = "("+event.latLng.lat()+ ","+event.latLng.lng()+")";';
        $this->googlemaps->add_marker($marker);
        
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
        
        $this->load->view('main/view_main',$data);
    }
}
?>
