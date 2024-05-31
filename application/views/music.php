

<div class="trie">
	<h5>Musiques</h5>
	
</div>
<section class="list">
<?php
foreach($musics as $music){
	echo "<div><article>";
	echo "<header class='short-text'>";
	echo anchor("music/viewMusic/{$music->trackId}","{$music->songNames}");
	echo anchor("playlist/addSong/{$music->trackId}", '<i class="fa fa-plus"></i>');
	echo "</header>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($music->jpeg).'" />';
	
	
	echo "<footer class='short-text'> {$music->artistName} - {$music->albumName} </footer></article></div>";
}
?>
</section>
