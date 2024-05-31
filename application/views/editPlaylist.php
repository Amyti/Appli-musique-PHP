<article>
<?php echo form_open("/playlist/edit/{$playlist['playlist_id']}");?>
<form action="<?php echo base_url("playlist/edit/{$playlist['playlist_id']}"); ?>" method="POST">

<label for="names">Nouveau nom de la playlist :
<input type="text"  name="name" required>
<label for="descrr">Nouvelle description :
<input type="text"  name="desc">
</label>

  <button type="submit">Envoyer</button>

</form>
</article>
