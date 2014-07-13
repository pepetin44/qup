<?php
if (!defined('BASEPATH'))
	die("No hay acceso directo a este script");

/*
 * Modelo para manejar datos defaults
 */

class Defaultdata_model extends CI_Model {

	var $tablas = array();

	function __construct() {
		parent::__construct();
		$this -> load -> config('tables', TRUE);
		$this -> tablas = $this -> config -> item('tablas', 'tables');
	}
  

	function getEstados() {
		return $this -> db -> get($this -> tablas['estado']) -> result();
	}
    
    
	
    function getPaises(){
        $this -> db -> order_by('nombrePais', 'asc');
        $query = $this -> db -> get($this-> tablas['pais']);
        if($query -> num_rows() > 0)
            return $query -> result();
        return null;
    }

    function getVisitas(){
    	$query = $this->db->get($this-> tablas['visita']);
    	$visitas = $query->row();
    	return $visita = $visitas->numeroVisitas;
    	
    }

    function registroVisita($data){
    	$this -> db -> where('idVisita', 1);
        $this -> db -> update($this -> tablas['visita'], $data);
        return true;
    }
	
	

}
?>