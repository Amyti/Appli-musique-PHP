<h5>Albums list</h5>
<?php $this->load->view('layout/getter');?>
<section class="list">
<?php
foreach($albums as $album){
	echo "<div><article>";
	echo "<header class='short-text'>";
	echo anchor("albums/view/{$album->albumId}","{$album->albumName}");
	echo "</header>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($album->jpeg).'" />';
	echo "<footer class='short-text'>{$album->year} - {$album->artistName}</footer>
	  </article></div>";
}
?>
</section>
