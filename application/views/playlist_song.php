<div class="trie">
	<h5>Musiques</h5>	
</div>
<section class="list">
  
<?php
foreach($playlist_songs as $playlist_song){
	echo "<div><article>";
	echo "<header class='short-text d-flex justify-content-between'>";
    echo anchor("music/viewMusic/{$playlist_song->trackId}", "{$playlist_song->song_name}");
    echo anchor("playlist/deleteDePlaylist/{$playlist_song->trackId}?playlistId={$playlist_song->id}", '<i class="fa fa-trash-o"></i>');
    echo "</header>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($playlist_song->jpeg).'" />';
	echo "<footer class='short-text'> {$playlist_song->artistName} - {$playlist_song->albumName}</footer></article></div>";
}
?>
</section>
