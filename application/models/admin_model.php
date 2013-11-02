<?php
    if(!defined('BASEPATH'))   exit('No direct script access allowed');
    class Admin_model extends CI_Model{
        function __construct() {
            parent::__construct();
            
        }
        
        function saveIncidencia($data){
            $query = $this->db->insert('incidente', $data);
            
            if($query){
                return true;
            }else{
                return FALSE;
            }
        }
        
        function getIndicencias(){
            $query = $this->db->get('incidente')->result();
            return $query;
        }
        
        function getIncidenciaByState($state){
            $this->db->where('estado',$state);
            $query = $this->db->get('incidente')->result();
            return $query;
        }
        
        function getIndicenciasById($id){
            $this->db->where('strestadoincidente',$id);
            $query = $this->db->get('incidente')->result();
            return $query;
        }
        
        function getDepartamentos(){
            $result = $this->db->get('departamento')->result();
            
            return $result;
        }
        
        function getProvincias($departamento){
            $this->db->where("IdDepartamento",$departamento);
            $result = $this->db->get("provincia")->result();
            
            return $result;
        }
        
        function getDistritos($provincia){
            $this->db->where("IdProvincia",$provincia);
            $result = $this->db->get("distrito")->result();
            
            return $result;
        }
        
        function insertZona($id,$zona,$departamento,$provincia,$distrito){
            $result = $this->db->insert("zona",array("idzona" => $id, "strnombrezona" => $zona, "IdDepartamento" => $departamento, "IdProvincia" => $provincia, "IdDistrito" => $distrito));
            
            return $result;
        }
        
        function getZonas(){
            $this->db->select("a.idzona,a.strnombrezona,b.Nombre as region, c.Nombre as provincia, d.Nombre as distrito");
            $this->db->where("a.IdDepartamento = CONVERT(b.IdDepartamento using utf8) collate utf8_unicode_ci and a.IdProvincia = CONVERT(c.IdProvincia using utf8) collate utf8_unicode_ci and a.IdDistrito = d.IdDistrito");
            $result = $this->db->get("zona a, departamento b, provincia c, distrito d")->result();
            
            return $result;
        }
    }
?>
