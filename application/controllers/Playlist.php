<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_playlist');
		$this->load->library('form_validation');
		$this->load->helper('form');
		if(!($this->session->userdata('logged_in'))){
			redirect('user/auth');
		}
	}
	public function index(){
		
			$playlists = $this->model_playlist->getPlaylists();
			$this->load->view('layout/header');
			$this->load->view('playlist',['playlists'=>$playlists]);
			$this->load->view('layout/footer');
		
		
	}

/*--------------------------------------------- Divers important ---------------------------------------------------------------*/ 

	public function edit($id)
	{


		$playlist = array(
			'playlist_id' => $id
		);
		$this->form_validation->set_rules('name', 'Nom', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->load->view('layout/header');
			$this->load->view('editPlaylist',['playlist' => $playlist]);
			$this->load->view('layout/footer');


		}else{
			$nom = $this->input->post('name');
			$desc = $this->input->post('desc');

			$this->model_playlist->editPlaylist($id, $nom, $desc);
			redirect('playlist');
		}
	}


	public function createRandomPlaylist(){
		$this->form_validation->set_rules('name', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$playlistId="";
		$genres = $this->model_playlist->getGenres($playlistId);
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('createRandomPlaylist', ['genres' => $genres]);
			$this->load->view('layout/footer');
		}else{
			$nom_playlist = $this->input->post('name');
			$description = $this->input->post('description');
			$user_id = $this->session->userdata('user_id');
			$genre = $this->input->post('genre');
			$number = $this->input->post('number');

			$playlist = array(
				"name" => $nom_playlist,
				"description" => $description,
				"user_id" => $user_id,
				"created_at" => date('Y-m-d H:i:s')
			);
			$playlist_id = $this->model_playlist->addPlaylist($playlist);
			
			$playlist_songs = $this->model_playlist->getRandomSongsOfPLaylist($genre, $number);
			

			foreach($playlist_songs as $playlist_song){
				$data = array(
					"playlist_id" => $playlist_id,
					"trackId" => $playlist_song->trackId,
				);
				$this->model_playlist->addToPlaylist($data);
			}

			redirect('playlist');
		}
	}




	public function create(){

		
		$this->form_validation->set_rules('name', 'Nom', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('create_playlist');
			$this->load->view('layout/footer');
		}else{
			$nom_playlist = $this->input->post('name');
			$description = $this->input->post('description');
			$user_id = $this->session->userdata('user_id');

			$playlist = array(
				"name" => $nom_playlist,
				"description" => $description,
				"user_id" => $user_id,
				"created_at" => date('Y-m-d H:i:s')
			);

			

			$this->model_playlist->addPlaylist($playlist);
			redirect('playlist');
		}
	}

	public function duplicatePlaylist($id){
			$playlistAttribut = $this->model_playlist->getAttributPlayliste($id);
			$playlistAttribut = $playlistAttribut[0]; 
			

			$playlist = array(
				"name" => $playlistAttribut->nom_playlist."-copie",
				"description" => $playlistAttribut->description,
				"user_id" => $playlistAttribut->user_id,
				"created_at" => date('Y-m-d H:i:s')
			);

			$idNewPlaylist = $this->model_playlist->addPlaylist($playlist);
			$playlist_songs = $this->model_playlist->getSongsOfPLaylist($id);

			foreach($playlist_songs as $playlist_song){
				$data = array(
					"playlist_id" => $idNewPlaylist,
					"trackId" => $playlist_song->trackId,
				);
		
				$this->model_playlist->addToPlaylist($data);
			}
			redirect('playlist');
	}

/*--------------------------------------------- Adder ---------------------------------------------------------------*/ 

	public function addSong($trackId) {
		$playlists = $this->model_playlist->getPlaylists();
	
		$this->form_validation->set_rules('playlist_id', 'Playlist', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header');
			$this->load->view('addSongPlaylist', ['playlists' => $playlists, 'trackId' => $trackId]); 
			$this->load->view('layout/footer');
		} else {
			$playlist_id = $this->input->post('playlist_id');
	
			$data = array(
				"playlist_id" => $playlist_id,
				"trackId" => $trackId,
			);
	
			$this->model_playlist->addToPlaylist($data);
	
			redirect('playlist/viewPlaylist/'.$playlist_id);
		}
	}

    public function addArtistSongToPlaylist($id){
        $playlists = $this->model_playlist->getPlaylists();
	
		$this->form_validation->set_rules('playlist_id', 'Playlist', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header');
			$this->load->view('addSongPlaylist', ['playlists' => $playlists]); 
			$this->load->view('layout/footer');
		} else {
            $playlist_id = $this->input->post('playlist_id');
            $this->model_playlist->addArtistSongToPlaylist($id, $playlist_id);
            
            redirect('playlist/viewPlaylist/'.$playlist_id);
        }

    }   

	



	public function addAlbum($albumId) {
		$playlists = $this->model_playlist->getPlaylists();
	
		$this->form_validation->set_rules('playlist_id', 'Playlist', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/header');
			$this->load->view('addSongPlaylist', ['playlists' => $playlists, 'albumId' => $albumId]); 
			$this->load->view('layout/footer');
		} else {
			$playlist_id = $this->input->post('playlist_id');

			$this->model_playlist->addAlbumSongToPlaylist($albumId, $playlist_id);
	
			redirect('playlist/viewPlaylist/'.$playlist_id);
		}
	}
/*--------------------------------------------- Viewer ---------------------------------------------------------------*/ 

	public function viewPlaylist($id) {
		$order = $this->input->get('order');
		$genre = $this->input->get('genre');
        $query = $this->input->get('query');

		$albumSongs = $this->model_playlist->getPlaylistAlbumSong($id, $query, $genre, $order);
        $genres = $this->model_playlist->getGenres($id);
        

		$this->load->view('layout/header');
        $this->load->view('layout/getter', ['genres' => $genres]);
		$this->load->view('playlist_song', ['playlist_songs' => $albumSongs, 'playlist_id' => $id]); 
		$this->load->view('layout/footer');
	
	}

/*--------------------------------------------- Deleter ---------------------------------------------------------------*/ 


	public function deletePlaylist($id){
		$this->model_playlist->deletePlaylist($id);
		redirect('playlist');
	}

	public function deleteDePlaylist($id) {
		$playlisId = $this->input->get('playlistId');
		$this->model_playlist->deleteFromPlaylist($id, $playlisId);
		redirect('playlist/viewPlaylist/'.$playlisId);
	}



}