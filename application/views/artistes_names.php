<h5>Artistes list</h5>

<section class="list">
<?php
foreach($artistes as $artistes){

	echo "<div><article>";
	echo "<header class='short-text d-flex justify-content-between'>";
	echo anchor("albums?query={$artistes->artistName}","{$artistes->artistName}");
	echo anchor("playlist/addArtistSongToPlaylist/{$artistes->artistId}", '<i title="Ajouter toutes les musiques de cet artiste a votre playlist" class="fa fa-plus"></i>');
	echo "</header>";
	
	echo "</article></div>";
}
?>
</section>
