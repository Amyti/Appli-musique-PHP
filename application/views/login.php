
<?=validation_errors(); ?>
<?=form_open('user/auth')?>

  
  <label for="email">Adresse mail</label>
  <input type="email" id="email" name="email" placeholder="Email" value="<?=set_value('email')?>" required>
<div class="grid">
	<label for="password">Password
	<input type="password" id="password" name="password" placeholder="Password" value="<?=set_value('password')?>" required>
</label>


</div>
<?php
echo anchor("user/create", 'Pas de compte ?');
?>
<br><br>
<?php if ($this->session->flashdata('error')): ?>
		<div class="alert-danger">
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>
  <br>
  <br>
  <!-- Button -->
  <button type="submit">Se Connecter</button>

</form>
