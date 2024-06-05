
<?=form_open('playlist/createRandomPlaylist')?>

<div class="grid">
<form method="POST" >

	<label for="name">
	Nom de la playlist : 
	<input type="text" id="name" name="name" placeholder="Hala Madrid" value="<?=set_value('name')?>"required>
	</label>


	<label for="nom">
	 Description : 
	 <input type="text" id="description" name="description" placeholder="Ma superbe playlist !" value="<?=set_value('description')?>" required>
	</label>

    
  </div>
  
  <label for="number">
        Nombre de musique dans la playlist : 
        <input type="number" name="number"/>
	</label>

    <select id="genre" name="genre">
        <option value="">(Pas obligatoire) Genre : </option>
        <?php 
            foreach($genres as $genre){
                echo "<option value='{$genre->genreName}'>{$genre->genreName}</option>";
            }
        ?>
    </select>
</div>

<br><br>
  <button type="submit">Submit</button>
  </form>
</form>
