<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Albums extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
		$this->load->model('model_playlist');
	}
	public function loadViews($albums, $genres){
		$this->load->view('layout/header');
		$this->load->view('layout/getter', ['genres' => $genres]);
		$this->load->view('albums_list', ['albums' => $albums]);
		$this->load->view('layout/footer');
	}


	public function index(){
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');
		$playlistId="";
		$genres = $this->model_playlist->getGenres($playlistId);

		$albums = $this->model_music->getAlbums($order, $genre);
        
		if($query = $this->input->get('query')){
            
			$data = $this->model_music->searchAlbum($query);
        	$this->loadViews($data, $genres);

        }else{
			$this->loadViews($albums, $genres);
		}
	}

	public function viewAlbumSongs($albumId){
		$songsAlbum = $this->model_music->getSongsByAlbum($albumId);
		$detailsAlbum =  $this->model_music->getAlbumDetails($albumId);

		$this->load->view('layout/header');
		$this->load->view('viewAlbumSong',['albumSongs'=>$songsAlbum, 'albumDetails' => $detailsAlbum]);

	}

	

}

