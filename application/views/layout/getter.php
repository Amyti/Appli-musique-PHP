
<div class="search-filters">
    <form method="GET" id="myCustomForm">

    <div class="filter-group">
            <select id="genre" name="genre" onchange="document.getElementById('myCustomForm').submit();">
                <option value="">Tout les genres </option>
                <?php 
                    foreach($genres as $genre){
                        echo "<option value='{$genre->genreName}'>{$genre->genreName}</option>";
                    }
                ?>
                
            </select>
        </div>

        <div class="filter-group">
            <select id="order" name="order" onchange="document.getElementById('myCustomForm').submit();">
                <option value="">Ordre :</option>
                <option value="asc">Croissant</option>
                <option value="desc">Décroissant</option>
            </select>
        </div>

    </form>
</div>
