<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {
    
    
    public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
	}

    public function loadViews($musics){
        $this->load->view('layout/header');
		$this->load->view('music',['musics'=>$musics]);
		$this->load->view('layout/footer');
    }


	public function index(){
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');

		$musics = $this->model_music->getMusic($order, $genre);
        
		if($query = $this->input->get('query')){
            
			$data = $this->model_music->searchMusique($query);
        	$this->loadViews($data);
        }else{
			$this->loadViews($musics);
		}
	}

}

