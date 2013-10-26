<?php
    if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Main_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
        function saveIncidencia($data){
            $query = $this->db->insert('incidencia', $data);
            
            if($query){
                return true;
            }else{
                return FALSE;
            }
        }
        
        function getIndicencias(){
            $query = $this->db->get('incidencia')->result();
            return $query;
        }
        
        function getIncidenciaByState($state){
            $this->db->where('estado',$state);
            $query = $this->db->get('incidencia')->result();
            return $query;
        }
        
        function getIndicenciasById($id){
            $this->db->where('estado',$id);
            $query = $this->db->get('incidencia')->result();
            return $query;
        }
    }
?>
