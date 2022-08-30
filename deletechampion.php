<p> Voulez-vous Supprimer ce champion ?</p>
<form action="index.php" method="POST">
    <input type="submit" value="Oui" name="deletechampion">
    <input type="hidden" name="deletechampionvalue" value="<?php echo $_GET['deletechampion']; ?>">
    <input type="submit" name="non" value="Non">
</form>