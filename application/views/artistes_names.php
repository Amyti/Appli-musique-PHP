<h5>Artistes list</h5>
<section class="list">
<?php
foreach($artistes as $artistes){
	echo "<div><article>";
	echo "<header class='short-text'>";
	echo anchor("artistes/view/{$artistes->id}","{$artistes->name}");
	echo "</header>";
	echo "</article></div>";
}
?>
</section>
