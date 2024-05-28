<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_playlist extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


    public function getPlaylists(){

        $this->db->select('name, playlist_id as id, description');
		$this->db->from('playlists');
		
	
		$query = $this->db->get();	
		
	    return $query->result();
    }



}