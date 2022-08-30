<section>
        <!-- Pokemons Affichés -->
        <div class="container">
        <div class="row justify-content-around">
<?php foreach ($Catchthemall as $valeur){ ?>
<a href="index.php?id=<?php echo $valeur['id']; ?>">
    <div class="card bg-secondary" style="width: 18rem;">
    <img src="<?php echo $valeur['image']; ?>" class="card-img-top" height="400px" width="450px" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Numero : <?php echo $valeur['numero'] ?></p>
    <p class="card-text text-white"> Nom : <?php echo $valeur['first_name'] ?></p>
    </div>
    </div>
    <br>
    </a>
    <?php } ?>
        </div>
        </div>
    </section>