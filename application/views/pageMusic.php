<br>
<br>
<br>

<body class="page_music">
  <div class="container_music">
  <div class="wrapper">
    <div class="top-bar">
      <i class="material-icons">expand_more</i>
      <span>En cours d'écoute</span>
      <i class="material-icons">more_horiz</i>
    </div>
    <div class="img-area">
            <?php if (!empty($music->jpeg)): ?>
                <img src="data:image/jpeg;base64,<?= base64_encode($music->jpeg); ?>" alt="Album Cover">
            <?php endif; ?>
        </div>
    <div class="song-details">
      <?php 
      echo "<p class='name'>{$music->songNames}</p>";
      echo "<p class='artist'>{$music->artistName}</p>";
      ?>
    </div>
    <div class="progress-area">
      <div class="progress-bar">
       
      </div>
      <div class="song-timer">
        <span class="current-time">0:00</span>
        <span class="max-duration">0:00</span>
      </div>
    </div>
    <div class="controls">
      <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
      <i id="prev" class="material-icons">skip_previous</i>
      <div class="play-pause">
        <i class="material-icons play">play_arrow</i>
      </div>
      <i id="next" class="material-icons">skip_next</i>
      <i id="more-music" class="material-icons">queue_music</i>
    </div>
    <div class="music-list">
      <div class="header">
        <div class="row">
          <i class= "list material-icons">queue_music</i>
          <span>Music list</span>
        </div>
        <i id="close" class="material-icons">close</i>
      </div>
      <ul>
      </ul>
    </div>
  </div>

  
</div>
</body>
</html>