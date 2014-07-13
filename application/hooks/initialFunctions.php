<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class initialFunctions{
	var $CI;
	public function iniRoutine() {
		$this->CI =& get_instance();
    	// AQUI corro rutinas que quiera ejecutar siempre antes que cualquier cosa.
    	// $this->isThatMyToken();
	}
	
	function isThatMyToken(){
		$token = md5(uniqid(mt_rand(), true));
		$CI = &get_instance();
		if(isset($_POST['token'])&&$CI->input->post('token')!=''){
			if($CI->session->userdata('token')==$CI->input->post('token')){
				$CI->session->set_userdata('token', $token);
				return true;
			}
			else{
				$CI->load->model('auth_model');
				if($CI->session->userdata('idUsuario')!=''){
					$CI->auth_model->logAttack(2, $CI->session->userdata('idUsuario'));
				}
				elseif (isset($_POST['emailUsuario'])&&$CI->input->post('emailUsuario')!='') {
					$CI->auth_model->logAttack(2, $CI->input->post('emailUsuario'));
				}
				else{
					$CI->auth_model->logAttack(2, null);
				}
				redirect(base_url().'sesion/logout/index/invalidToken');
				return false;
			}
		}
		else{
			$CI->session->set_userdata('token', $token);
			return true;
		}
	}
}
?>