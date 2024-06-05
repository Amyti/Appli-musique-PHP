<header>
    <h1>Playlists</h1>
    <h3>Bibliothèque </h3>
    <div class="links-playlist-create">
        <h5><?= anchor("playlist/create", '<i class="fa fa-plus"></i> Nouvelle Playlist');?></h5>
        <h5><?= anchor("playlist/createRandomPlaylist", '<i class="fa fa-random"></i> Generer une playlist aléatoirement');?></h5>
    </div>
    
    
    <br>
    
</header>

<section class="list">
    <?php foreach ($playlists as $playlist) : ?>
        <div class="playlist-item">
            <article>
                <header class="playlist-header">
                    <div class="short-text">
                        <?php echo anchor("playlist/viewPlaylist/$playlist->id", "{$playlist->name}"); ?>
                    </div>
                    <div class="icon-links">
                        <?php 
                        echo anchor("playlist/edit/{$playlist->id}", '<i class="fa fa-edit"></i>');
                        echo anchor("playlist/deletePlaylist/{$playlist->id}", '<i class="fa fa-trash-o"></i>');
                        echo anchor("playlist/duplicatePLaylist/{$playlist->id}", '<i class="fa fa-clone"></i>'); 
                        ?>
                    </div>
                </header>
                <div><?php echo $playlist->description; ?></div>
            </article>
        </div>
    <?php endforeach; ?>
</section>


