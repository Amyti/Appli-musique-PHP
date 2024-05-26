<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artistes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
	}

    public function loadViews($artistes){
        $this->load->view('layout/header');
		$this->load->view('artistes_names',['artistes'=>$artistes]);
		$this->load->view('layout/footer');
    }


	public function index(){
		$artistes = $this->model_music->getArtistes();
        
		$this->loadViews($artistes);
	}

}

