        <header>
            <h1>Playlists</h1>
        </header>

        <section>
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
                <?php else: ?>
                    <p>Aucune playlist trouvée.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
</html>
