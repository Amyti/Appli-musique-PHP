<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Music extends CI_Controller {
    
    
    public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
		$this->load->model('model_playlist');
	}

    public function loadViews($musics, $genres){
        $this->load->view('layout/header');
		$this->load->view('layout/getter', ['genres' => $genres]);
		$this->load->view('music',['musics'=>$musics]);
		$this->load->view('layout/footer');
    }


	public function index(){
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');
		$playlistId="";

		$musics = $this->model_music->getMusic($order, $genre);
		$genres = $this->model_playlist->getGenres($playlistId);
        
		if($query = $this->input->get('query')){
            
			$data = $this->model_music->searchMusique($query);
        	$this->loadViews($data, $genres);
        }else{
			$this->loadViews($musics, $genres);
		}
	}

	public function viewMusic($id){

		

		$musics = $this->model_music->getMusicById($id);


		$this->load->view('layout/header');
		$this->load->view('pageMusic', ['music' => $musics[0]]);
	}

}

