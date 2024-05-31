<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');                                             

class Model_playlist extends CI_Model {
	public function __construct(){
		$this->load->database();
	}


	public function editPlaylist($id, $nom, $desc) {
		$user_id = $this->session->userdata('user_id');
	
		$nom = $this->db->escape($nom);
		$desc = $this->db->escape($desc);
		
	
		if (!empty($desc)) {
			$sql = "UPDATE playlists SET name = ?, description = ? WHERE playlist_id = ? AND user_id = ?";
			$this->db->query($sql, array($nom, $desc, $id, $user_id));
		} else {
			$sql = "UPDATE playlists SET name = ? WHERE playlist_id = ? AND user_id = ?";
			$this->db->query($sql, array($nom, $id, $user_id));
		}
	}
	
	


	public function getPlaylist($id){
        $user_id = $this->session->userdata('user_id');

        $this->db->select('name, playlist_id , description');
		$this->db->from('playlists');
        $this->db->where('user_id', $user_id);
		$this->db->where('playlist_id', $id);
		
	
		$query = $this->db->get();	
		
	    return $query->result();
    }

    public function getPlaylists(){
        $user_id = $this->session->userdata('user_id');

        $this->db->select('name, playlist_id as id, description');
		$this->db->from('playlists');
        $this->db->where('user_id', $user_id);
		
	
		$query = $this->db->get();	
		
	    return $query->result();
    }
	
	

	

	public function getPlaylistAlbumSong($id, $query, $genre = '', $order = 'asc') {
		$this->db->select('song.id as song_id, song.name as song_name, playlist_songs.playlist_id as id, artist.name as artistName, album.name as albumName, cover.jpeg as jpeg, track.id as trackId');
		$this->db->from('track');
		$this->db->join('song', 'track.songId = song.id');
		$this->db->join('album', 'album.id = track.albumId');
		$this->db->join('playlist_songs', 'playlist_songs.trackId = track.id');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->join('cover', 'album.coverId = cover.id');
		$this->db->join('genre', 'album.genreId = genre.id');
		$this->db->where('playlist_songs.playlist_id', $id);
	
		if (!empty($genre)) {
			$this->db->where('genre.name', $genre);
		}

		if (!empty($query)) {
			$this->db->where('song.name', $query);
		}
	
		if ($order == 'asc' || $order == 'desc') {
			$this->db->order_by('song.name', $order);
		}


	
		$query = $this->db->get();
		return $query->result();
	}



	

	public function getGenres($playlistId){
		$this->db->select('genre.name as genreName');
		$this->db->from('genre');

		if($playlistId != ""){
			$this->db->join('album', 'album.genreId = genre.id');
			$this->db->join('track', 'track.albumId = album.id');
			$this->db->join('playlist_songs', 'playlist_songs.trackId = track.id');
			$this->db->where('playlist_songs.playlist_id', $playlistId);
		}
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result();
	}

	public function getAttributPlayliste($playlist_id){

		$this->db->select('name as nom_playlist, description, user_id');
		$this->db->from('playlists');
		$this->db->where('playlist_id', $playlist_id);

		$query = $this->db->get();
		return $query->result();
	}


	public function getSongsOfPLaylist($id){
		$this->db->select('playlist_id, trackId');
		$this->db->from('playlist_songs');
		$this->db->where('playlist_id', $id);

		$query = $this->db->get();
		return $query->result();
	}
	

	public function deleteFromPlaylist($id, $playlisId){
		$this->db->where('trackId', $id);
		$this->db->where('playlist_id', $playlisId);
		$this->db->delete('playlist_songs');

		
	}

	public function deletePlaylist($playlisId){
		$this->db->where('playlist_id', $playlisId);
		$this->db->delete('playlists');
	}
	
	


    public function addPlaylist($playlists){
        $this->db->insert('playlists', $playlists);
		return $this->db->insert_id();
	}

	public function addToPlaylist($playlist_songs){
		$this->db->insert('playlist_songs', $playlist_songs);
		return $this->db->insert_id();
	}

	public function addAlbumSongToPlaylist($albumId, $playlistId){

		$this->db->select('id as songId');
		$this->db->from('track');
		$this->db->where('albumId', $albumId);
		$albumSongs = $this->db->get()->result();

		foreach ($albumSongs as $track) {
			$playlistSongData = array(
				'playlist_id' => $playlistId,
				'trackId' => $track->songId
			);
			$this->db->insert('playlist_songs', $playlistSongData);
		}

		return $this->db->insert_id();
	}

	public function addArtistSongToPlaylist($artistId, $playlistId){

		$this->db->select('track.id as songId');
		$this->db->from('track');
		$this->db->join('album','album.id = track.albumId');
		$this->db->join('artist', 'album.artistId = artist.id');
		$this->db->where('artist.id', $artistId);
		$albumSongs = $this->db->get()->result();

		foreach ($albumSongs as $track) {
			$playlistSongData = array(
				'playlist_id' => $playlistId,
				'trackId' => $track->songId
			);
			$this->db->insert('playlist_songs', $playlistSongData);
		}

		return $this->db->insert_id();
	}
	
	



}