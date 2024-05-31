
<?=validation_errors(); ?>
<?=form_open('user/create')?>
  <!-- Grid -->
  <div class="grid">

	<label for="prenom">
	Prénom
	<input type="text" id="prenom" name="prenom" placeholder="Prénom" value="<?=set_value('prenom')?>"required>
	</label>

	<label for="nom">
	 Nom 
	 <input type="text" id="nom" name="nom" placeholder="nom" value="<?=set_value('nom')?>" required>
	</label>

	<label for="nom">
	 Pseudo 
	 <input type="text" id="pseudo" name="pseudo" placeholder="pseudo" value="<?=set_value('pseudo')?>" required>
	</label>
  </div>
  
  <label for="email">Adresse mail</label>
  <input type="email" id="email" name="email" placeholder="Email" value="<?=set_value('email')?>" required>
<div class="grid">
	<label for="password">Password
	<input type="password" id="password" name="password" placeholder="Password" value="<?=set_value('password')?>" required>
</label>
<label for="password">Confirmation password
<input type="password" id="cpassword" name="cpassword" placeholder="Password" value="<?=set_value('cpassword')?>" required>
</label>

</div>

<?php
echo anchor("user/auth", 'Déjà un compte ?');
?>
<br><br>
  <button type="submit">Submit</button>

</form>
