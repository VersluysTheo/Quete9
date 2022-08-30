<?php 
// Requete SQL pour carte unique
    $mysql3 = 'SELECT * FROM `pokemon` WHERE id = :id';
    $BDDpokemon2 = $bdd->prepare($mysql3);
    $BDDpokemon2->execute([
        'id'  => $_GET['id']
    ]);
    $Catchthemall2 = $BDDpokemon2->fetch();
    ?>

<div class="row justify-content-center">
    <div class="card bg-secondary" style="width: 18rem;">
    <img src="<?php echo $Catchthemall2['image']; ?>" class="card-img-top" height="400px" width="450px" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Numero : <?php echo $Catchthemall2['numero'] ?></p>
    <p class="card-text text-white"> Nom : <?php echo $Catchthemall2['first_name'] ?></p>
    <p class="card-text text-white"> Type 1 : <?php echo $Catchthemall2['type1'] ?></p>
    <?php if (!empty($Catchthemall2['type2'])) { ?>

    <p class="card-text text-white"> Type 2 : <?php echo $Catchthemall2['type2'] ?></p> <?php } ?>
    <a class="text-warning" href="index.php?updatepokemon=<?php echo $_GET['id']; ?>">Modifier</a>
    <a class="text-danger" href="index.php?deletepokemon=<?php echo $_GET['id']; ?>"> Supprimer </a>
    </div>
    </div>
</div>