<form action="" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="flex-row">
    <input type="hidden" name="pkid" value="<?php echo $valeur2['id']; ?>"></input>
    </div>
    <div>
    <input type="number" name="pknumero" value="<?php echo $valeur2['numero'] ?>"">
    <label for="numero">Numero</label>
    </div>
    <div>
    <input type="text" name="pknom" value="<?php echo $valeur2['first_name'] ?>">
    <label for="nom">Nom</label>
    </div>
    <div>
    <input type="text" name="pktype1" value="<?php echo $valeur2['type1'] ?>">
    <label for="type1">Type 1</label>
    </div>
    <input type="text" name="pktype2" value="<?php echo $valeur2['type2'] ?>">
    <label for="type2">Type 2</label>
    <input type="file" id="pokemonupd" name="pokemonupd" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="updatepokemon" value="Actualiser"></input>
</form>