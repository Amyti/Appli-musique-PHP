<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artistes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
		$this->load->model('model_playlist');
	}

    public function loadViews($artistes, $genres){
        $this->load->view('layout/header');
		$this->load->view('layout/getter', ['genres' => $genres]);
		$this->load->view('artistes_names',['artistes'=>$artistes]);
		$this->load->view('layout/footer');
    }


	public function index(){
		$playlistId="";
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');
		$artistes = $this->model_music->getArtistes($order, $genre);
		
		$genres = $this->model_playlist->getGenres($playlistId);
        
		if($query = $this->input->get('query')){
            
			$data = $this->model_music->searchArtistes($query);
        	$this->loadViews($data, $genres);
        }else{
			$this->loadViews($artistes, $genres);
		}
	}

}

