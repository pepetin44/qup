<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sesion extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('auth_model');
	}

	function login($redir, $failredir) {
		$query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
		$redir = str_replace('-', '/', $redir);
		// $redir = str_replace('/admin-login','',$redir);	
		$failredir = str_replace('-', '/', $failredir);
		//var_dump($redir);
		//var_dump($failredir);
		$this->form_validation->set_rules('correo', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contrasena', 'Contrase&ntilde;a', 'trim|required|xss_clean');
		$this->form_validation->set_message('required', 'El campo "%s" es requerido');
		$this->form_validation->set_message('xss_clean', 'El campo "%s" contiene un posible ataque XSS');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');

		// Ejecuto la validacion de campos de lado del servidor
		if (!$this->form_validation->run()) {
			//$this->session->set_flashdata('error', 'error_4');
			redirect('registro/meh');
			return false;
		} else {						
			
			$correo = $this->input->post('correo');
			$contrasena = $this->input->post('contrasena');
			$recordarme = '';
			
			switch($this->auth_model->login($correo, $contrasena, $recordarme)) {
				case 1:
					if($query!=""){
						$redirect = $redir.$query;
						$redirect = substr($redirect, 0,(strlen($redirect)-12));
					}
					else{
						if($this->session->userdata('tipoUsuario')==1){
                			redirect('usuario/cuenta/activado');
                		} 
                		if ($this->session->userdata('tipoUsuario')==2) {
                		    redirect('negocio');
                		}
               			if ($this->session->userdata('tipoUsuario')==3) {
                		    redirect('asociacion');
                		}
                		if ($this->session->userdata('tipoUsuario')==0) {
                		    redirect('admin');
						}
						redirect($redirect);
					}
					
					
				break;
				case 9 :
					$this->session->set_flashdata('error', 'infoIncorrect');					
					redirect($failredir);
				break;
				case 0 :
					$this->session->set_flashdata('error', 'inactiveUser');
					redirect($failredir);
				break;
				case -2 :
					$this->session->set_flashdata('error', 'bannedUser');
					redirect($failredir);
				break;

				case 3 :
					if($query!=""){
						$redirect = $redir.$query;
						$redirect = substr($redirect, 0,(strlen($redirect)-12));
					}
					else{
						$redirect = $redir;
					}
				break;
			}
		}
	}

	function logout($redir, $error = null) {
		// $this->auth_model->setAuthKey($this->session->userdata('emailUsuario'));
		//generamos un nuevo authkey antes de salir
		$this->session->sess_destroy();
		//adiós sesión
		$this->auth_model->deleteCookies();
		//borramos cookies
		if($error!=null){
			$this->session->sess_create();
			$this->session->set_flashdata('error', $error);
		}
		redirect($redir);
		//have a nice day
	}

}
?>