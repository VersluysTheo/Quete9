<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="flex-row">
    <input type="text" name="champnom" value="<?php echo $valeur3['champion'] ?>"">
    <label for="champnom">Nom</label>
    </div>
    <div>
    <input type="text" name="champville" value="<?php echo $valeur3['ville'] ?>">
    <label for="champville">Ville</label>
    </div>
    <div>
    <input type="text" name="championtype" value="<?php echo $valeur3['type'] ?>">
    <label for="championtype">Type</label>
    </div>
    <input type="text" name="champbadge" value="<?php echo $valeur3['badge'] ?>">
    <label for="champbadge">Récompense</label>
    <input type="file" id="championupd" name="championupd" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="updatechampion" value="Actualiser"></input>
</form>