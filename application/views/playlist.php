<header>
    <h1>Playlists</h1>
    <h3>Bibliothèque <h5><?= anchor("playlist/create", '<i class="fa fa-plus"></i> Nouvelle Playlist');?></h5></h3>
    <br>
    
</header>

<section class="list">
    <?php
    foreach($playlists as $playlist) {
        echo "<div><article>";
        echo "<header class='playlist-header'>";
        echo "<div class='short-text'>";
        echo anchor("playlist/viewPlaylist/$playlist->id", "{$playlist->name}");
        echo "</div>";
        echo "<div class='icon-links ml-auto'>";
        echo anchor("playlist/edit/{$playlist->id}", '<i class="fa fa-edit"></i>');
        echo anchor("playlist/deletePlaylist/{$playlist->id}", '<i class="fa fa-trash-o"></i>');
        echo anchor("playlist/duplicatePLaylist/{$playlist->id}", '<i class="fa fa-clone"></i>');
        echo "</div></header>";
        echo "<div>{$playlist->description}</div></article></div>";
    }
    

    
    ?>
</section>
