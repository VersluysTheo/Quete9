<p> Voulez-vous Supprimer ce pokemon ?</p>
<form action="index.php" method="POST">
    <input type="submit" value="Oui" name="deletepokemon">
    <input type="hidden" name="deletepokemonvalue" value="<?php echo $_GET['deletepokemon']; ?>">
    <input type="submit" name="non" value="Non">
</form>