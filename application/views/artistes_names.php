<h5>Artistes list</h5>
<?php $this->load->view('layout/getter');?>

<section class="list">
<?php
foreach($artistes as $artistes){
	echo "<div><article>";
	echo "<header class='short-text'>";
	echo anchor("artistes/view/{$artistes->artistId}","{$artistes->artistName}");
	echo "</header>";
	echo "</article></div>";
}
?>
</section>
