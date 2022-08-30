<section>
        <!-- Dresseurs Affichés -->
        <div class="container">
        <div class="row justify-content-around">
<?php foreach ($Badges as $valeur){ ?>
<a href="index.php?champion=<?php echo $valeur['champion']; ?>">
    <div class="card bg-secondary" style="width: 18rem;">
    <img src="<?php echo $valeur['image']; ?>" class="card-img-top" height="500px" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Nom : <?php echo $valeur['champion'] ?></p>
    <p class="card-text text-white"> Ville : <?php echo $valeur['ville'] ?></p>
    </div>
    </div>
    <br>
    </a>
    <?php } ?>
        </div>
        </div>
    </section>