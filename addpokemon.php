<!-- Formulaire pour ajouter un pokemon -->
<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="flex-row justify-content-center text-white">
        <input type="number" name="numero" placeholder="Numéro">
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="nom" placeholder="Nom"> 
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="type1" placeholder="Type1" required> 
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="type2" placeholder="Type2"> &nbsp;( Optionnel )
    </div>
    <div class="flex-row justify-content-center text-white">
    <input type="file" id="pokemon" name="pokemon" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="submit" value="Envoyez"></input>
    </div>
</form>