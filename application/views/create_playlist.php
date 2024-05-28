
<?=form_open('playlist/create')?>

<div class="grid">

	<label for="name">
	Nom de la playlist : 
	<input type="text" id="name" name="name" placeholder="Hala Madrid" value="<?=set_value('name')?>"required>
	</label>


	<label for="nom">
	 Description : 
	 <input type="text" id="description" name="description" placeholder="Ma superbe playlist !" value="<?=set_value('description')?>" required>
	</label>
  </div>

</div>

<br><br>
  <button type="submit">Submit</button>

</form>
