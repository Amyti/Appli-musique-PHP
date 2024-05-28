<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
	}
	public function loadViews($albums){
        $this->load->view('layout/header');
		$this->load->view('albums_list',['albums'=>$albums]);
		$this->load->view('layout/footer');
    }


	public function index(){
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');

		$albums = $this->model_music->getAlbums($order, $genre);
        
		if($query = $this->input->get('query')){
            
			$data = $this->model_music->searchAlbum($query);
        	$this->loadViews($data);
        }else{
			$this->loadViews($albums);
		}
	}

	

}

