<?php
if(!defined('BASEPATH'))
	die();

class Thumbnails extends CI_Controller{
	
	 public function __construct() {
       parent::__construct();
       $this->load->library('image_lib');
    }

    public function thumbnailer($width, $height, $carpeta, $img) {
        $config['source_image'] = 'docs/' . $carpeta . '/' . $img;
        $config['width'] = $width;
        $config['height'] = $height;
        $config['dynamic_output'] = true;

        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }	
}
?>