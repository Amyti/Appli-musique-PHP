<?php
if($this->session->userdata('logged_in')){
    $user = $this->session->userdata('pseudo'); 
    echo "<h5>Recherche de <u>$user</u> :</h5>";
}

 ?>
<section class="list">

<?php

if(empty($albums)){
    echo "Aucun resultat trouvé...";
}else{
    foreach($albums as $album){
        echo "<div><article>";
        echo "<header class='short-text'>";
        echo anchor("albums/view/{$album->id}","{$album->name}");
        echo "</header>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($album->jpeg).'" />';
        echo "<footer class='short-text'>{$album->year} - {$album->artistName}</footer>
          </article></div>";
    }
}


?>
</section>
