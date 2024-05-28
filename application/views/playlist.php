        <header>
            <h1>Playlists</h1>
        </header>
<style>
    
    .btnnew{
        text-decoration: none;
        color: white;
        border: 2px solid turquoise;
        border-radius: 8px;
        padding: 10px; 
        display: inline-block;
    }
</style>
        <section>
        <h3>Bibliothèque</h3>
            <div class="grid">
            
                <?php if (!empty($playlists)): ?>
                    <?php foreach ($playlists as $playlist): ?>
                        <article>
                            <header>
                                <h2><?=htmlspecialchars($playlist->name);?></h2>
                            </header>
                            <p><?=htmlspecialchars($playlist->description);?></p>
                            <footer>
                                <?=anchor('playlist/view/'.$playlist->id, 'Voir la playlsit');?>
                            </footer>
                        </article>
                    <?php endforeach; ?>
                <?php endif; ?>
                
            </div>
            <ul class="btnnew">
                
                    <?= anchor("playlist/create", 'Nouvelle Playlist'); ?>
                
            </ul>
            
        </section>
    </main>
</body>
</html>
