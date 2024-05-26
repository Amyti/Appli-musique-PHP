<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_music extends CI_Model {
	public function __construct(){
		$this->load->database();
	}

	public function getAlbums(){
		$query = $this->db->query(
			"SELECT album.name,album.id,year,artist.name as artistName, genre.name as genreName,jpeg 
			FROM album 
			JOIN artist ON album.artistid = artist.id
			JOIN genre ON genre.id = album.genreid
			JOIN cover ON cover.id = album.coverid
			ORDER BY year
			"
		);
	return $query->result();
	}

	public function getArtistes(){
		$query = $this->db->query(
			"SELECT name, id  
			FROM artist
			"
		);
	return $query->result();
	}

	public function searchAlbum($search){
		
		$query = $this->db->query(
			"SELECT album.name,album.id,year,artist.name as artistName, genre.name as genreName,jpeg 
			FROM album 
			JOIN artist ON album.artistid = artist.id
			JOIN genre ON genre.id = album.genreid
			JOIN cover ON cover.id = album.coverid
			WHERE album.name = '$search'
			"
		);

		return $query->result();
	}


	public function addAccount($account)
	{
		$this->db->insert('users', $account);
		return $this->db->insert_id();
	}

	public function getAttribute($email){
		$this->db->select('email, password_hash, nom, prenom, user_id, pseudo');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();

		if($query->num_rows() > 0){
			return $query->row();
		}
		return false;
	}

	
}
