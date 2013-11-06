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
            $this->db->order_by("a.idzona","asc");
            $result = $this->db->get("zona a, departamento b, provincia c, distrito d")->result();
            
            return $result;
        }
        
        function getZonaById($zona){
            $this->db->where("idzona",$zona);
            $result = $this->db->get("zona")->result();
            
            return $result;
        }
        
        function modifyZona($id,$zona,$departamento,$provincia,$distrito){
            $this->db->where("idzona",$id);
            $result = $this->db->update("zona",array("strnombrezona" => $zona, "IdDepartamento" => $departamento, "IdProvincia" => $provincia, "IdDistrito" => $distrito));
            
            return $result;
        }
        
        function deleteZona($zona){
            $this->db->where("idzona",$zona);
            $result = $this->db->delete("zona");
            
            return $result;
        }
        
        function deleteTipoIncidente($tipoincidente){
            $this->db->where("idtipoincidente",$tipoincidente);
            $result = $this->db->delete("tipo_incidente");
            
            return $result;
        }
        
        function insertTipoIncidente($image,$id,$descripcion){
            $result = $this->db->insert("tipo_incidente",array("idtipoincidente"=>$id, "strtipoincidente" => $descripcion, "imgtipoincidente" => $image));
            
            return $result;
        }
        
        function extractImagesTipoIncidente($tipoincidente){
            $this->db->select("imgtipoincidente");
            $this->db->where("idtipoincidente",$tipoincidente);
            $result = $this->db->get("tipo_incidente")->result();
            
            return $result;
        }
        
        function editTipoIncidente($data,$id){
            $this->db->where("idtipoincidente",$id);
            $result = $this->db->update("tipo_incidente",$data);
            
            return $result;
        }
        
        function insertCuadrante($id,$zona,$cuadrante){
            $result = $this->db->insert("cuadrante",array("idcuadrante" => $id, "strnombrecuadrante" => $cuadrante, "idzona" => $zona));
            
            return $result;
        }
        
        function getCuadrantes(){
            $this->db->select("a.idzona,a.strnombrezona,b.Nombre as region, c.Nombre as provincia, d.Nombre as distrito,e.strnombrecuadrante,e.idcuadrante");
            $this->db->where("e.idzona = a.idzona and a.IdDepartamento = CONVERT(b.IdDepartamento using utf8) collate utf8_unicode_ci and a.IdProvincia = CONVERT(c.IdProvincia using utf8) collate utf8_unicode_ci and a.IdDistrito = d.IdDistrito");
            $this->db->order_by("e.idcuadrante","asc");
            $result = $this->db->get("cuadrante e, zona a, departamento b, provincia c, distrito d")->result();
            
            return $result;
        }
        
        function modifyCuadrante($id,$cuadrante,$zona){
            $this->db->where("idcuadrante",$id);
            $result = $this->db->update("cuadrante",array("strnombrecuadrante" => $cuadrante, "idzona" => $zona));
            
            return $result;
        }
        
        function deleteCuadrante($cuadrante){
            $this->db->where("idcuadrante",$cuadrante);
            $result = $this->db->delete("cuadrante");
            
            return $result;
        }
        
        function getCuadrantesById($zona){
            $this->db->where("idzona",$zona);
            $result = $this->db->get("cuadrante")->result();
            
            return $result;
        }
        
        function getUrbanizacionesById($cuadrante){
            $this->db->where("idcuadrante",$cuadrante);
            $result = $this->db->get("urbanizacion")->result();
            
            return $result;
        }
        
        function insertUrbanizacion($id,$urbanizacion,$zona,$cuadrante){
            $result = $this->db->insert("urbanizacion",array("idurbanizacion" => $id, "strnombreurbanizacion" => $urbanizacion, "idzona" => $zona, "idcuadrante" => $cuadrante));
            
            return $result;
        }
        
        function getUrbanizaciones(){
            $this->db->select("a.idzona,a.strnombrezona,b.Nombre as region, c.Nombre as provincia, d.Nombre as distrito,e.strnombrecuadrante,e.idcuadrante,f.idurbanizacion,f.strnombreurbanizacion");
            $this->db->where("f.idcuadrante = e.idcuadrante and f.idzona = a.idzona and a.IdDepartamento = CONVERT(b.IdDepartamento using utf8) collate utf8_unicode_ci and a.IdProvincia = CONVERT(c.IdProvincia using utf8) collate utf8_unicode_ci and a.IdDistrito = d.IdDistrito");
            $this->db->order_by("e.idcuadrante","asc");
            $result = $this->db->get("urbanizacion f, cuadrante e, zona a, departamento b, provincia c, distrito d")->result();
            
            return $result;
        }
        
        function deleteUrbanizacion($urbanizacion){
            $this->db->where("idurbanizacion",$urbanizacion);
            $result = $this->db->delete("urbanizacion");
            
            return $result;
        }
        
        function modifyUrbanizacion($id,$urbanizacion,$cuadrante,$zona){
            $this->db->where("idurbanizacion",$id);
            $result = $this->db->update("urbanizacion",array("strnombreurbanizacion" => $urbanizacion, "idcuadrante" =>$cuadrante, "idzona" => $zona));
            
            return $result;
        }
        
        function insertTrabajador($data){
            $result = $this->db->insert("trabajador",$data);
            
            return $result;
        }
        
        function deleteTrabajador($trabajador){
            $this->db->where("idtrabajador",$trabajador);
            $result = $this->db->delete("trabajador");
            
            return $result;
        }
        
        function editTrabajador($data,$trabajador){
            $this->db->where("idtrabajador",$trabajador);
            $result = $this->db->update("trabajador",$data);
            
            return $result;
        }
    }
?>
