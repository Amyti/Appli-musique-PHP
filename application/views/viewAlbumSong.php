<title>Album Details</title>

<body>
    <header>
        <h1><?= htmlspecialchars($albumDetails->albumName); ?></h1>
        <p><?= htmlspecialchars($albumDetails->artistName); ?> - <?= htmlspecialchars($albumDetails->year); ?></p>
        <img src="data:image/jpeg;base64,<?= base64_encode($albumDetails->jpeg); ?>" class="album-cover" alt="Album Cover"/>
    </header>
    <br>
    <h2 class="add-to-playlist-btn"><?= anchor("playlist/addAlbum/{$albumDetails->albumId}", '<i class="fa fa-plus"></i> Ajouter cet album à la playlist'); ?></h2>
    <br>
    <br>
    <section>
        
        <h2>Musiques de l'album</h2>
        <div class="list">
            <?php foreach ($albumSongs as $song): ?>
                <div>
                    <article>
                        <header class="short-text">
                            <?= anchor("music/viewMusic/{$song->trackId}", htmlspecialchars($song->songName)); ?>
                            <?= anchor("playlist/addSong/{$song->trackId}", '<i class="fa fa-plus"></i>'); ?>
                        </header>
                        <img src="data:image/jpeg;base64,<?= base64_encode($song->jpeg); ?>" alt="Cover" class="album-cover"/>
                        <footer class="short-text">
                            <?= htmlspecialchars($song->artistName); ?>
                        </footer>
                    </article>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
