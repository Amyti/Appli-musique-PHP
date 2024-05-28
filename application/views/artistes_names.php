<h5>Artistes list</h5>
<?php $this->load->view('layout/getter');?>

<section class="list">
<?php
foreach($artistes as $artistes){

	echo "<div><article>";
	echo "<header class='short-text'>";
	echo anchor("music","{$artistes->artistName}");
	echo "</header>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($artistes->jpeg).'" />';
	echo "</article></div>";
}
?>
</section>
