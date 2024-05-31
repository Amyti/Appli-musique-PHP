<title>Ajouter une chanson à une playlist</title>

<div class="trie">
    <h5>Playlists</h5>
    <?php $this->load->view('layout/getter');?>
</div>

<section class="list">
    
    <form method="post">
        <?php foreach ($playlists as $playlist): ?>
            <div class="playlist-option">
                <label>
                    <input type="radio" name="playlist_id" value="<?= $playlist->id ?>">
                    <?= htmlspecialchars($playlist->name) ?>
                </label>
            </div>
        <?php endforeach; ?>
        <div class="submit-button">
            <button type="submit" class="btn btn-primary">Ajouter à la playlist</button>
        </div>
    </form>
</section>

</body>
</html>
