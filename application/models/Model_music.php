<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_music extends CI_Model {
	public function __construct(){
		$this->load->database();
	}	

	public function getAlbumDetails($albumId){
        $this->db->select('album.id as albumId, album.name as albumName, artist.name as artistName, cover.jpeg as jpeg, album.year');
        $this->db->from('album');
        $this->db->join('artist', 'album.artistId = artist.id');
        $this->db->join('cover', 'album.coverId = cover.id');
        $this->db->where('album.id', $albumId);
        $query = $this->db->get();
        return $query->row();
    }

    public function getSongsByAlbum($albumId){
        $this->db->select('track.id as trackId, song.id as songId, song.name as songName, artist.name as artistName, cover.jpeg as jpeg');
        $this->db->from('song');
        $this->db->join('track', 'song.id = track.songId');
        $this->db->join('album', 'track.albumId = album.id');
        $this->db->join('artist', 'album.artistId = artist.id');
        $this->db->join('cover', 'album.coverId = cover.id');
        $this->db->where('album.id', $albumId);
        $query = $this->db->get();
        return $query->result();
    }


	public function getAlbums($order, $genre){

		$this->db->select('album.name as albumName,album.id as albumId,year,artist.name as artistName, genre.name as genreName,jpeg');
		$this->db->from('album');
		$this->db->join('artist', 'album.artistid = artist.id');
		$this->db->join('genre', 'genre.id = album.genreid');
		$this->db->join('cover', 'cover.id = album.coverid');
		$this->db->limit(100);
		
		if(!empty($genre)){
			$this->db->where('genre.name', $genre);
		}

		if ($order == 'asc' || $order == 'desc') {
			$this->db->order_by('album.name', $order);
		}
	
		$query = $this->db->get();	
		
	return $query->result();
	}

	

	public function getArtistes($order = 'asc', $genre = '') {

		$this->db->select('cover.jpeg as jpeg, album.name as albumName, artist.name as artistName, artist.id as artistId');
		$this->db->from('artist');
		$this->db->join('album', 'album.artistid = artist.id');
		$this->db->join('genre', 'genre.id = album.genreid');
		$this->db->join('cover', 'album.coverId = cover.id');

		if (!empty($genre)) {
			$this->db->where('genre.name', $genre);
		}

		$this->db->group_by('artist.id');
		

		if ($order == 'asc' || $order == 'desc') {
			$this->db->order_by('artist.name', $order);
		}
	
		$query = $this->db->get();
		return $query->result();
	}

	public function getMusicById($id){
		
		$this->db->select('song.id as songId, track.id as trackId, album.name AS albumName, song.name AS songNames, artist.name AS artistName, cover.jpeg AS jpeg, album.year AS year');
		$this->db->from('track');
		$this->db->join('song', 'song.id = track.songId');
		$this->db->join('album', 'track.albumId = album.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->join('genre', 'genre.id = album.genreid');
		$this->db->where('track.id', $id);
		


		$query = $this->db->get();
		return $query->result();
	}

	

	public function getMusic($order, $genre){
		
		$this->db->select('song.id as songId, track.id as trackId, album.name AS albumName, song.name AS songNames, artist.name AS artistName, cover.jpeg AS jpeg, album.year AS year');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId');
		$this->db->join('album', 'track.albumId = album.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->join('genre', 'genre.id = album.genreid');
		$this->db->limit(100);

		if (!empty($genre)) {
			$this->db->where('genre.name', $genre);
		}

		if ($order == 'asc' || $order == 'desc') {
			$this->db->order_by('song.name', $order);
		}

		$query = $this->db->get();
		return $query->result();
	}

	

	public function searchAlbum($search) {
		$search = $this->db->escape_like_str($search);
	
		$this->db->select('album.name AS albumName, album.id AS albumId, 
						   song.name AS songNames, artist.name AS artistName, 
						   cover.jpeg AS jpeg, album.year AS year');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId');
		$this->db->join('album', 'track.albumId = album.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->like('song.name', $search);
		$this->db->or_like('artist.name', $search);
		$this->db->or_like('album.name', $search);
		$this->db->group_by(array('album.id', 'album.name', 'artist.name', 'cover.jpeg', 'album.year'));
		
		$query = $this->db->get();
	
		return $query->result();
	}
	

	public function searchMusique($search) {
		$search = $this->db->escape_like_str($search);
		

		$this->db->select('song.id as songId, album.name AS albumName, album.id AS albumId, song.name AS songNames, artist.name AS artistName, cover.jpeg AS jpeg, album.year AS year, track.id as trackId');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId');
		$this->db->join('album', 'track.albumId = album.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->like('song.name', $search);
		$this->db->or_like('artist.name', $search);
		$this->db->or_like('album.name', $search);
		$query = $this->db->get();
		return $query->result();
	}

	public function searchArtistes($search) {
		$search = $this->db->escape_like_str($search);
	
		$this->db->select('album.name AS albumName, song.name AS songNames, artist.id as artistId, artist.name AS artistName, cover.jpeg AS jpeg, album.year AS albumYear');
		$this->db->from('song');
		$this->db->join('track', 'song.id = track.songId');
		$this->db->join('album', 'track.albumId = album.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->like('artist.name', $search);
		$this->db->group_by(['album.id', 'album.name', 'artist.name', 'cover.jpeg', 'album.year']);
		

		$this->db->group_by('artist.id');

		$query = $this->db->get();
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
