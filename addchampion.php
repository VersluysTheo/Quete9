<!-- Formulaire pour ajouter un Champion -->
<form action="index.php" method="POST" enctype="multipart/form-data">
    <div class="container">
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="ville" placeholder="Ville">
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="nom2" placeholder="Champion">
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="typebis" placeholder="Type"> 
    </div>
    <div class="flex-row justify-content-center text-white">
        <input type="text" name="badge" placeholder="Badge"> 
    </div>
    <div class="flex-row justify-content-center text-white">
    <input type="file" id="champion" name="champion" accept="image/png, image/jpeg">
    </div>
    <input type="submit" name="submit2" value="Envoyez"></input>
    </div>
</form>