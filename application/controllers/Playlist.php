<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Playlist extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_playlist');
		$this->load->library('form_validation');
	}
	public function index(){
		$playlists = $this->model_playlist->getPlaylists();
		$this->load->view('layout/header');
		$this->load->view('playlist',['playlists'=>$playlists]);
		$this->load->view('layout/footer');
	}

	public function create(){

		
		$this->form_validation->set_rules('name', 'Nom', 'required');
		$this->form_validation->set_rules('desciption', 'Description', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('layout/header');
			$this->load->view('create_playlist');
			$this->load->view('layout/footer');
		}else{
			$nom_playlist = $this->input->post('name');
			$description = $this->input->post('description');
		
		}

	}

}

