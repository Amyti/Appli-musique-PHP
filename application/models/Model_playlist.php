<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_playlist extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


    public function getPlaylists(){
        $user_id = $this->session->userdata('user_id');

        $this->db->select('name, playlist_id as id, description');
		$this->db->from('playlists');
        $this->db->where('user_id', $user_id);
		
	
		$query = $this->db->get();	
		
	    return $query->result();
    }

    public function addPlaylist($playlists){
        $this->db->insert('playlists', $playlists);
		return $this->db->insert_id();
	}



}