<?php
if (!defined('BASEPATH'))
	die("No hay acceso directo a este script");

/*
 * Modelo para manejar datos defaults
 */

class Admin_model extends CI_Model {

	var $tablas = array();

	function __construct() {
		parent::__construct();
		$this -> load -> config('tables', TRUE);
		$this -> tablas = $this -> config -> item('tablas', 'tables');
	}
  

	function getZonasG(){
        return $this -> db -> get($this -> tablas['zonageografica']) -> result();
    }

    function insertBanner($data){
    	$this -> db -> insert($this -> tablas['banner'], $data);
        $bannerID = $this -> db -> insert_id();               
                return $bannerID;
    }

    function getBannerC($seccionID,$zonaID){
    	$this->db->where('seccionID', $seccionID);
    	$this->db->where('zonaID', $zonaID);
    	//$this->db->where('posicion', $posicion);
    	$query = $this->db->get($this -> tablas['banner']);
    	if($query -> num_rows() > 0)
            return $query -> result();
        return null;
	}

	function getBanner(){
    	$query = $this->db->get($this -> tablas['banner']);
    	if($query -> num_rows() > 0)
            return $query -> result();
        return null;
	}

    function deleteContent($idContent,$idZona, $idSeccion,$posicion){
        if($idContent != 0){
           $this -> db -> where('bannerID', $idContent);
           $this -> db -> delete($this -> tablas['banner']);
        } else {
          $this -> db -> where('zonaID', $idZona);
          $this -> db -> where('seccionID', $idSeccion);
          $this -> db -> where('posicion', $posicion);
          $this -> db -> delete($this -> tablas['banner']);
        }

        
    }

    function updateBannerText($bannerID,$data){
        $this -> db -> where('bannerID',$bannerID);
        $this -> db -> update($this -> tablas['banner'], $data);
        return true;
    }
}
?>