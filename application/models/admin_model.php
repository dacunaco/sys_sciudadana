<?php
    if(!defined('BASEPATH'))   exit('No direct script access allowed');
    class Admin_model extends CI_Model{
        function __construct() {
            parent::__construct();
            
        }
        function counter($ip){
            $query_str = 'select ip, TIMEDIFF(NOW(), fecha) as tiempo, fecha, num_visitas from contador where ip= ?';
            $result = $this->db->query($query_str, array($ip));
            
            $tiempo = $result->row(0)-> tiempo; 
            $num_visitas = $result->row(0)-> num_visitas; 
            $horas_t = substr($tiempo,0,2);
            $tiemRes = 5; 
            
            if($result->num_rows() == 0){
                $query = 'insert into contador(ip, num_visitas, fecha) values(?, 1, NOW())';
                $result = $this->db->query($query, array($ip));
            }else if($result->num_rows() > 0 && $horas_t > $tiemRes){
                $query = 'update contador set fecha=NOW(), num_visitas = ? + 1 where ip = ?';
                $result = $this->db->query($query, array($num_visitas,$ip));
            }
            
            if($result){
                $query_final = 'select SUM(num_visitas) as visitas from contador';
                $result = $this->db->query($query_final);
                
                return $result->row(0)->visitas;
            }
        }
        
        function disponibility($string){
            $query = 'select usuario from usuario where usuario = ?';
            $result = $this->db->query($query, array($string));
            
            if($result->num_rows() == 0){
                echo 1;
            }else{
                echo 0;
            }
        }
        function getNumUsers(){
            $query = 'select count(idusuario) as usuarios from usuario';
            $result = $this->db->query($query);
            
            return $result->row(0)->usuarios;
        }
        
        function getUsers($pagination, $segment){
            $this->db->select('u.dni,u.nombres,u.apellidos,pu.perfilusuario,u.idusuario,u.sexo,u.foto, u.usuario');
            $this->db->where('u.idperfilusuario = pu.idperfilusuario');
            $this->db->order_by('u.idusuario', 'asc'); 	
            $this->db->limit($pagination, $segment);
            $query = $this->db->get('usuario u, perfil_usuario pu')->result();
            
            return $query;
        }
        
        function getUsersByName(){
            $this->db->select('u.dni,u.nombres,u.apellidos,pu.perfilusuario,u.idusuario,u.sexo,u.foto, u.usuario, u.estado');
            $this->db->where('u.idperfilusuario = pu.idperfilusuario');
            $query = $this->db->get('usuario u, perfil_usuario pu')->result();
            
            return $query;
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
