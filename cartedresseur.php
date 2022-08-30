<?php 
// SQL Champion Unique
    $mysql4 = 'SELECT * FROM `champion` WHERE champion = :champion';
    $BDDchampion2 = $bdd->prepare($mysql4);
    $BDDchampion2->execute([
        'champion' => $_GET['champion']
    ]);
    $Badges2 = $BDDchampion2->fetch();
?>

<div class="row justify-content-center">
    <div class="card bg-secondary" style="width: 18rem;">
    <img src="<?php echo $Badges2['image']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Nom : <?php echo $Badges2['champion'] ?></p>
    <p class="card-text text-white"> Ville : <?php echo $Badges2['ville'] ?></p>
    <p class="card-text text-white"> Type : <?php echo $Badges2['type'] ?></p>
    <p class="card-text text-white"> Récompense : <?php echo $Badges2['badge'] ?></p> 
    <a class="text-warning" href="index.php?updatechampion=<?php echo $_GET['champion']; ?>">Modifier</a>
    <a class="text-danger" href="index.php?deletechampion=<?php echo $_GET['champion']; ?>"> Supprimer </a>
    </div>
    </div>
</div>