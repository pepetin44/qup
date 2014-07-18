<?php
if (!defined('BASEPATH'))
        die();

class Cuenta extends CI_Controller {
    
  
    var $idUsuario="";

        public function __construct(){
        parent::__construct();
        if(!is_logged()&&$this->session->userdata('tipoUsuario')!=1){
            $query = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
            $redir = str_replace('/', '-', uri_string().$query);
            redirect('principal');
        } // checamos si existe una sesión activa           
       
        $this->load->model('defaultdata_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('googlemaps');
        $this->load->library('cart');
        

        if (!is_authorized(array(1), 1, $this->session->userdata('nivel'), $this->session->userdata('rol'))) {
                $this->session->set_flashdata('error', 'userNotAutorized');
                redirect('principal');
        }

        }

        //is_authorized($nivelesReq, $idPermiso, $nivelUsuario, $rolUsuario)
        
    
    
    public function index() {
        $data['SYS_metaTitle']          = '';
        $data['SYS_metaKeyWords']       = '';
        $data['SYS_metaDescription']    = '';  
        $data['estados']    = $this->defaultdata_model->getEstados();
        $data['paises']     = $this->defaultdata_model->getPaises();
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
        var_dump($this->session->userdata('tipoUsuario'));

        $this->load->view('index_view', $data);
    }


    function activado() {
        $data['SYS_metaTitle']          = '';
        $data['SYS_metaKeyWords']       = '';
        $data['SYS_metaDescription']    = '';  
        $data['estados']    = $this->defaultdata_model->getEstados();
        $data['paises']     = $this->defaultdata_model->getPaises();
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

        $this->load->view('usuario/indexActivado_view', $data);
    }

    function carrito(){
        var_dump($_POST);
        
       $data = array(
            'id' => $this->input->post('productoID'),
            'qty' => 4,//$this->input->post(),
            'price' => $this->input->post('precio'),
            'name' => 'Shampoo', //$this->input->post(),
            'options' => array('Size' => $this->input->post('talle'), 'Color' => $this->input->post('color'))
         );


        $rowID = $this->cart->insert($data);

        var_dump($rowID);
    }

    function carritoDetalle() {
        $this->load->view('carrito_view');
    }

    function carritoUpdate(){
        $data = array(
            'rowid' => $this->input->post('rowID'),
            'qty' => $this->input->post('qty')
        );
        $e = $this->cart->update($data);
        $data['e'] = $e;
        $data['response'] = "true";
        echo json_encode($data);
    }

    function carritoDetalleTest() {
        $this->load->view('carritoTest_view');
    }

    function carritoBae(){
        $e = $this->cart->destroy();
        var_dump($e);
    }
   

}