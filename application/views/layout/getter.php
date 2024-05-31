
<div class="search-filters">
    <form method="GET" >

    <div class="filter-group">
            <select id="genre" name="genre">
                <option value="">Genre : </option>
                <?php 
                    foreach($genres as $genre){
                        echo "<option value='{$genre->genreName}'>{$genre->genreName}</option>";
                    }
                ?>
                
            </select>
        </div>

        <div class="filter-group">
            <select id="order" name="order">
                <option value="">Ordre :</option>
                <option value="asc">Croissant</option>
                <option value="desc">Décroissant</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
</div>
