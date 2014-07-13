<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('defaultdata_model');
		$this->load->library('googlemaps');

		if(is_logged()&&$this->session->userdata('tipoUsuario')==1){
                redirect('usuario/cuenta/activado');
                } 
                if(is_logged()&&$this->session->userdata('tipoUsuario')==2) {
                    redirect('negocio');
                }
                if(is_logged()&&$this->session->userdata('tipoUsuario')==3) {
                    redirect('asociacion');
                }
                if(is_logged()&&$this->session->userdata('tipoUsuario')==0) {
                    redirect('admin');
        		}

    }
	function index() {
		
		$data['SYS_metaTitle'] 			= '';
		$data['SYS_metaKeyWords'] 		= '';
		$data['SYS_metaDescription'] 	= '';  
		$data['estados'] 	= $this->defaultdata_model->getEstados();
		$data['paises'] 	= $this->defaultdata_model->getPaises();
		$visitas = $this->defaultdata_model->getVisitas();
		$contador = $visitas + 1;		
		$this->defaultdata_model->registroVisita($data = array('numeroVisitas' => $contador));
		$data['mapaSegundo'] = 'mapa_view';
		
		// mapa
		

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		//var_dump($data['map']);

		
		

		// mapa

		
		
        
		$this->load->view('index_view', $data);
	}

	

	function iniciado(){
		$this->load->view('sesion_correcta_view');
	}


	function mapa(){

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map'] = $this->googlemaps->create_map();
		//var_dump($data['map']);

		
		
		// MAPA DOS
		$this->load->view('mapa_view', $data);

	}

	function mapa2(){

		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map2';
		$config['map_div_id'] = 'map_canvas2';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker = array();
		$marker['draggable'] = true;
		$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$data['map2'] = $this->googlemaps->create_map();
		//var_dump($data['map']);



		$config = array();
		$config['center'] = 'auto';
		$config['zoom'] = 'auto';
		$config['onboundschanged'] = 'if (!centreGot) {
				var mapCentre = map.getCenter();
				marker_0.setOptions({
				position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
		});
		} 
		centreGot = true;';
		$config['map_name'] = 'map';
		$config['map_div_id'] = 'map_canvas';
		$this->googlemaps->initialize($config);
   
		// set up the marker ready for positioning 
		// once we know the users location
		$marker1 = array();
		$marker1['draggable'] = true;
		$marker1['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
		//$marker['ondragend'] = 'alert(\'You just dropped me at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
		$this->googlemaps->add_marker($marker1);
		$data['map'] = $this->googlemaps->create_map();
		//var_dump($data['map']);



		$this->load->view('mapa2_view', $data);

	}


	function meh(){
		$this->load->view('meh_view');
	}
	
	
}