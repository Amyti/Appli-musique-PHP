<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_music');
	}

    public function loadViews($data){
        $this->load->view('layout/header');
		$this->load->view('search',['albums'=>$data]);
		$this->load->view('layout/footer');
    }

    public function index(){
        $query = $this->input->get('query');

        if(empty($query)){
            echo 'Aucun résultat trouvé.';
            return;
        }

        $data = $this->model_music->searchAlbum($query);


        $this->loadViews($data);
    }

}