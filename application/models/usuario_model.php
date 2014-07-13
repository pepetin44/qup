<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Usuario_model extends CI_Model {

	var $tablas = array();

	function __construct() {
		parent::__construct();
		$this->load->config('tables', TRUE);
		$this->tablas = $this->config->item('tablas', 'tables');
		$this->load->model('auth_model');
	}

	function getNewConfirmationCode($emailUsuario) {
		//obtiene un nuevo código de confirmación, para cambiar contraseña o para activar
		return substr(strtoupper(sha1(substr(md5(uniqid(rand(), true)), 0, 35) . md5($emailUsuario))), 0, 25);
	}
	
	function insertNewConfirmationCode($identificador, $code){
		$this->db->where('idUsuario', $identificador);
		$this->db->or_where('usuario', $identificador);
		$this->db->or_where('emailUsuario', $identificador);
		$this->db->update($this->tablas['usuario'], array('confirmationCode'=>$code));
		return true;
	}

	function registrarUsuario($data) {
		//registra un usuario
		$data['authKey'] = $this->auth_model->getNewAuthKey($data['correo'], 20);
		$data['contrasena'] = $this->auth_model->hashPassword($data['contrasena'], null);
		$this->db->insert($this->tablas['usuario'], $data);
		return $this->db->insert_id();
	}

	function registrarDato($data,$tabla) {
		//registra un usuario Negocio o AC
		$this->db->insert($this->tablas[$tabla], $data);
		return $this->db->insert_id();
	}

	
	
	function is_there_activation_code($activationCode){
		$this->db->where('codigoConfirmacion', $activationCode);
		$query = $this->db->get($this->tablas['usuario']);
		if ($query->num_rows == 1)
			return $query;
		return null;
	}

	function activar($activationCode) {
		//activa un usuario, devuelve 1: activado, 0:usuario ya activado, -1: codigo no existe
		//si el usuario ya esta activo y se intenta activar nuevamente, cambia el confirmation code nuevamente
		$activacion = $this->is_there_activation_code($activationCode);
		if($activacion!=null) {
			$row = $activacion->row();
			if ($row->status == '1'){
				return 0;
			} else {
			$this->db->where('idUsuario', $row->idUsuario);
			$this->db->update($this->tablas['usuario'], array('status' => 1, 'codigoConfirmacion' => $this->getNewConfirmationCode($row->correo))); ;
			$this->load->model('auth_model');
			$this->auth_model->iniciarsesion($row, null);
			return 1;
			}
		} else {
			return -1;
		}
	}
    
    
	/*
	 * Información de la cuenta
	 * */

	function getMyInfo($idUsuario) {
		$this->db->select('*');
		$this->db->where('idUsuario', $idUsuario);
		$query = $this->db->get($this->tablas['usuario']);
		if ($query->num_rows() == 1)
			return $query;
		return null;
	}

	
	
	function getMyConfirmationCode($usuario){
		$this->db->select('idUsuario, usuario, correo, nombre, codigoConfirmacion');
		$this->db->where('usuario', $usuario);
		$this->db->or_where('correo', $usuario);
		$query = $this->db->get($this->tablas['usuario']);
		if($query->num_rows()==1)
			return $query;
		return null;
	}
	
	/*
	 * Modificar información de la cuenta
	 * */

	 function passRecover($password, $idUsuario){
	 	$password = $this->auth_model->hashPassword($password, null);
	 	$this->db->where('idUsuario',$idUsuario);
		$this->db->update($this->tablas['usuario'], array('contrasena'=>$password));
		return true;
	 }
	 
	function cambiarContrasena($contrasenaActual, $contrasenaUsuario, $idUsuario, $admin) {		
		/*CHECAMOS EL NIVEL DE USUARIO / ROL*/
		if (!$admin) {
			$this->load->model('auth_model');
			$this->db->select('contrasena');
			$this->db->where('idUsuario', $idUsuario);
			$query = $this->db->get($this->tablas['usuario']);
			if ($query->num_rows() == 1) {
				$row = $query->row();
				if ($this->auth_model->hashPassword($contrasenaActual, substr($row->contrasenaUsuario, 0, 10)) == $row->contrasenaUsuario) {
					$arrNewPass = array('contrasena' => $this->auth_model->hashPassword($contrasenaUsuario));
					$this->db->where('idUsuario', $idUsuario);
					$this->db->update($this->tablas['usuario'], $arrNewPass);
					return true;
					// die('cambio');
				} else {
					return false;
					// die('no coincide pass');
				}
			} else {
				return false;
				// die('no usuario');
			}
		} else {
			/*SI NO ES ADMINISTRADOR ENTONCES...*/
			$this->load->model('auth_model');
			$this->db->select('contrasena');
			$this->db->where('idUsuario', $idUsuario);
			$query = $this->db->get($this->tablas['usuario']);
			if ($query->num_rows() == 1) {
				$row = $query->row();
				$arrNewPass = array('contrasena' => $this->auth_model->hashPassword($contrasenaUsuario));
				$this->db->where('idUsuario', $idUsuario);
				$this->db->update($this->tablas['usuario'], $arrNewPass);
				return true;
				// die('cambio');
			} else {
				return false;
				// die('no usuario');
			}
		}
	}

	

	function updateData($idUsuario,$arrUpdate){
		$this->db->where('idUsuario',$idUsuario);
		return $this->db->update($this->tablas['usuario'],$arrUpdate);
	}

	function cambiar_email($idUsuario, $emailUsuario) {
		if(!$this->is_there_emailUsuario($emailUsuario['correo'])){
			$this->db->where('idUsuario', $idUsuario);
			$this->db->update($this->tablas['usuario'], $emailUsuario);
			return true;
		}
		else{
			return false;
		}
	}
    
    function pendingActivation($idUsuario){
        $this->db->where('idUsuario = '.$idUsuario.' and tmp_email != ""');
        $query = $this->db->get($this->tablas['usuario']);        
        if($query->num_rows() != 0)
            return true;
        return false;
    }
    
    function get_tmp_email($idUsuario){
    	/*OBTENEMOS EL EMAIL QUE SE ENCUENTRA EN TEMPORAL*/
        $query = $this->db->get_where($this->tablas['usuario'], array('idUsuario' => $idUsuario));
        if($query->num_rows() > 0)
            return $query->row();
        return false;       
    }
    
    function cancel_tmp_email($idUsuario, $arrUpdate){
    	/*CANCELACION DE CAMBIO DE CORREO*/
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update($this->tablas['usuario'], $arrUpdate);
        return true;        
    }
    
    function email_is_empty($newWmail){
    	/*EL EMAIL NO SE ENCUENTRA PREVIAMENTE REGISTRADO EN LA DB*/        
        $this->db->where('correo', $newWmail);
        $this->db->or_where('tmp_email', $newWmail);
        $query = $this->db->get($this->tablas['usuario']); 
        if($query->num_rows() > 0)
            return false;
        return true;
    }
    
    function do_tmp_email($idUsuario, $arrUpdate){
    	/*GUARDAMOS EL NUEVO CORREO ELECTRONICO DE LA CUENTA COMO TEMPORAL HASTA QUE LO ACTIVE*/
        $this->db->where('idUsuario', $idUsuario);
        $this->db->update($this->tablas['usuario'], $arrUpdate);
        return true;
    }
	
	
	

	function is_there_emailUsuario($emailUsuario) {
		//verifica si un email ya existe antes de registrarlo
		$this->db->where('correo', $emailUsuario);
		$query = $this->db->get($this->tablas['usuario']);
		// $query = $this->db->get('usuario');
		if ($query->num_rows() >= 1){
			return true;
		}else{
			return false;
		}
	}

	

	function deleteUser($idUsuario) {
		$this->db->where('idUsuario', $idUsuario);
		$this->db->delete($this->tablas['usuario']);
		return true;
	}

	
	function banearUser($idUsuario, $currentStatus) {
		/*
		* EXISTEN 3 'STATUS' DE USUARUIO:
		* '0' -> USUARIO PENDIENTE DE ACTIVACION
		* '1' -> USUARIO ACTIVADO
		* '2' -> USUARIO BANEADO		
		*/
		$status = '';
		$this->db->where('idUsuario', $idUsuario);
		if($currentStatus == 1) {
			$this->db->update($this->tablas['usuario'], array('status' => 2));
			$status = 'bannedOK';			
		}
			
		else if($currentStatus == 2){
			$this->db->update($this->tablas['usuario'], array('status' => 1));
			$status = 'unblockedUser';		
		}
		return $status;
	}

	function myID($idUsuario){
		
		$this->db->select($this->tablas['usuario'].'.*,'.$this->tablas['usuariodato'].'.*');
		$this->db->join($this->tablas['usuariodato'],$this->tablas['usuariodato'].'.idUsuario = '.$this->tablas['usuario'].'.idUsuario','left');
		$this->db->where($this->tablas['usuario'].'.idUsuario', $idUsuario);
		$query = $this->db->get($this->tablas['usuario']);
		if ($query->num_rows() == 1){
			return $query->row();
		} else {
		return null;
	    }
	}

	function myInfo($idUsuario){
		
		$this->db->select($this->tablas['usuario'].'.*,'.$this->tablas['usuariodato'].'.*,'.$this->tablas['usuariodetalle'].'.*');
		$this->db->join($this->tablas['usuariodato'],$this->tablas['usuariodato'].'.idUsuario = '.$this->tablas['usuario'].'.idUsuario','left');
		$this->db->join($this->tablas['usuariodetalle'],$this->tablas['usuariodetalle'].'.idUsuario = '.$this->tablas['usuario'].'.idUsuario','left');
		$this->db->where($this->tablas['usuario'].'.idUsuario', $idUsuario);
		$query = $this->db->get($this->tablas['usuario']);
		if ($query->num_rows() == 1){
			return $query->row();
		} else {
		return null;
	    }
	}


	function zonaGeografica($idEstado){
		$this->db->where('estadoID',$idEstado);
		$query = $this->db->get($this->tablas['zonageograficaestado']);
		if ($query->num_rows() == 1){
			return $query->row();
		} else {
		return null;
	    }
	}

	function miUbicacion($idUsuarioDato){
		$this->db->select($this->tablas['ubicacionusuario'].'.*',$this->tablas['zonageograficaestado'].'.zonageograficaID',$this->tablas['zonageograficaestado'].'.nombre',$this->tablas['estado'].'.nombreEstado');
		$this->db->join($this->tablas['zonageograficaestado'],$this->tablas['zonageograficaestado'].'.estadoID = '.$this->tablas['ubicacionusuario'].'.estadoID');
		$this->db->join($this->tablas['estado'],$this->tablas['estado'].'.estadoID = '.$this->tablas['ubicacionusuario'].'.estadoID');
		$this->db->where('idUsuarioDato',$idUsuarioDato);
		$query = $this->db->get($this->tablas['ubicacionusuario']);
		if ($query->num_rows() == 1){
			return $query->row();
		} else {
		return null;
	    }
	}
	

}
