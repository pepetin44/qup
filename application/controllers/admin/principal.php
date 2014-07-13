<?php
if (!defined('BASEPATH'))
        die();

class Principal extends CI_Controller {
    
    

        public function __construct(){
        parent::__construct();
        if(!is_logged()){
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            $redir = str_replace('/', '-', uri_string().$query);
            redirect('principal');
        } // checamos si existe una sesión activa
            
       
        $this->load->helper(array('form', 'url'));
        $this->load->model('defaultdata_model');
        $this->load->library('googlemaps');
        $this->load->model('admin_model');

        //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)
        if (!is_authorized(array(0), 4, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
                $this->session->set_flashdata('error', 'userNotAutorized');
                redirect('principal');
        }

        }

        
    
    
    public function index() {
       $data['SYS_metaTitle']           = '';
        $data['SYS_metaKeyWords']       = '';
        $data['SYS_metaDescription']    = '';  
        $data['estados']    = $this->defaultdata_model->getEstados();
        $data['paises']     = $this->defaultdata_model->getPaises();
        $visitas = $this->defaultdata_model->getVisitas();
        $data['visitas'] = $visitas;
        $data['mapaSegundo'] = 'mapa_view';
        $data['usuariosT'] = count($this->defaultdata_model->getUsers());
        $data['anunciosT'] = count($this->defaultdata_model->getAnnounces());
        
        
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
        //var_dump($this->session->userdata('nivel'),$this->session->userdata('tipoUsuario'),is_logged());
        $this->load->view('admin/index_view', $data);
    }


    function getAdminP(){
         $data['zonageografica'] = $this->admin_model->getZonasG();
         $this->load->view('admin/adminIndex_view', $data);

    }

    
        

    



    

   

}