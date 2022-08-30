<?php
// Include de la BDD  
    include 'bdd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">
    <title>Quete9</title>
    <link rel="icon" href="./image/iconpokemon.png">

</head>
<body class="bg-dark">
    <!-- Navbar -->
    <?php include 'navbar.php' ?>
    <!-- Jumbotron -->
    <?php include 'jumbotron.php' ?>
<!-- Preparation de SQL -->
<?php 
    $mysql = 'SELECT * FROM `pokemon`';
    $BDDpokemon = $bdd->prepare($mysql);
    $BDDpokemon->execute();
    $Catchthemall = $BDDpokemon->FETCHALL();
?>
<?php 
    $mysql2 = 'SELECT * FROM `champion`';
    $BDDchampion = $bdd->prepare($mysql2);
    $BDDchampion->execute();
    $Badges = $BDDchampion->FETCHALL();
?>

<!-- GET Pokemon -->
<?php 
    if (isset($_GET['Pokemon'])){
        include 'Pokemon.php';
    } ?>
    <?php if (isset($_GET['id'])){
        include 'cartepokemon.php';
    } ?>

<!-- GET Dresseur -->
<?php
    if (isset($_GET['Champion'])){
        include'Champion.php';
    }
?>
<?php if (isset($_GET['champion'])){
    include 'cartedresseur.php';
}
?>
<!-- Add Pokemon -->
<?php
    if (isset($_GET['addpokemon'])){
        include'addpokemon.php';
    }
    if (isset($_POST['submit'])){
       $Add = 'INSERT INTO `pokemon`(`numero`,`first_name`,`type1`,`type2`,`image`) VALUES (:numero,:first_name,:type1,:type2,:image)';
       $Ajouter= $bdd->prepare($Add);
       $Ajouter->execute([
        'numero' => $_POST['numero'],
        'first_name' => $_POST['nom'],
        'type1' => $_POST['type1'],
        'type2' => $_POST['type2'],
        'image' => 'image/' . $_FILES['pokemon']["name"]
       ]
       );

$target_dir = "image/";
$target_file = $target_dir . basename($_FILES["pokemon"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérification si le fichier est une image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["pokemon"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}

// vérification si le fichier existe déjà
if (file_exists($target_file)) {
  echo "Le fichier existe déjà.";
  $uploadOk = 0;
}

// Vérification de la taille du fichier
if ($_FILES["pokemon"]["size"] > 500000) {
  echo "La taille du fichier est trop importante.";
  $uploadOk = 0;
}

// Autorisation seulement de certain format de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
  $uploadOk = 0;
}

// Vérification si $upload n'est pas à 0 (envoie message d'erreur)
if ($uploadOk == 0) {
  echo " Le fichier n'a pas été envoyé.";
// Si tout est ok, alors le fichier est uploadé dans le bon dossier
} else {
  if (move_uploaded_file($_FILES["pokemon"]["tmp_name"], $target_file)) {
    echo print_r($target_file);
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["pokemon"]["name"])). " a été envoyé.";
  } else {
    echo " Erreur lors de l'envoi du fichier";
  }
}

    }
?>

<!-- Add Champion -->
<?php 
  if (isset($_GET['addchampion'])){
    include 'addchampion.php';
  }
  if (isset($_POST['submit2'])){
    $Add2 = 'INSERT INTO `champion`(`ville`,`champion`,`type`,`badge`,`image`) VALUES (:ville,:champion,:type,:badge,:image)';
    $Ajouter2 =$bdd->prepare($Add2);
    $Ajouter2->execute([
      'ville' => $_POST['ville'],
      'champion' => $_POST['nom2'],
      'type' => $_POST['typebis'],
      'badge' => $_POST['badge'],
      'image' => 'image2/' . $_FILES['champion']["name"]
    ]
    );

    $target_dir = "image2/";
    $target_file = $target_dir . basename($_FILES["champion"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Vérification si le fichier est une image
    if(isset($_POST["submit2"])) {
      $check = getimagesize($_FILES["champion"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
      }
    }
    
    // vérification si le fichier existe déjà
    if (file_exists($target_file)) {
      echo "Le fichier existe déjà.";
      $uploadOk = 0;
    }
    
    // Vérification de la taille du fichier
    if ($_FILES["champion"]["size"] > 500000) {
      echo "La taille du fichier est trop importante.";
      $uploadOk = 0;
    }
    
    // Autorisation seulement de certain format de fichier
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
      echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
      $uploadOk = 0;
    }
    
    // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
    if ($uploadOk == 0) {
      echo " Le fichier n'a pas été envoyé.";
    // Si tout est ok, alors le fichier est uploadé dans le bon dossier
    } else {
      if (move_uploaded_file($_FILES["champion"]["tmp_name"], $target_file)) {
        echo print_r($target_file);
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["champion"]["name"])). " a été envoyé.";
      } else {
        echo " Erreur lors de l'envoi du fichier";
      }
    }
    }
?>

<!-- DeletePokemon -->
<?php
  if (isset($_GET['deletepokemon'])){
    include 'deletepokemon.php';
  }
  if (isset($_POST['deletepokemon'])){
    $Deletepokemon = 'DELETE FROM `pokemon` WHERE id = :id';
    $Deletedpokemon = $bdd->prepare($Deletepokemon);
    $Deletedpokemon->execute([
      'id' => $_POST ['deletepokemonvalue']
    ]);
  }
?>


<!-- DeleteChampion -->
<?php 
  if (isset($_GET['deletechampion'])){
    include 'deletechampion.php' ;
  }
  if (isset($_POST['deletechampion'])){
    $Deletechampion = 'DELETE FROM `champion` WHERE champion = :champion';
    $Deletedchampion = $bdd->prepare($Deletechampion);
    $Deletedchampion->execute([
      'champion' => $_POST ['deletechampionvalue']
    ]);
  }
?>

<!-- Update Pokemon -->
<?php
if (isset($_GET['updatepokemon'])){
  $mysql = 'SELECT * FROM `pokemon` WHERE id = :id';
  $BDDpokemon = $bdd->prepare($mysql);
  $BDDpokemon->execute([
    'id' => $_GET['updatepokemon']
  ]);
  $Catchthemall = $BDDpokemon->FETCHALL();
  foreach ($Catchthemall as $valeur2){
    include 'updatepokemon.php';
  }

if (isset($_POST['updatepokemon'])){
  
  $Updatepokemon = 'UPDATE `pokemon` SET numero = :numero , first_name = :first_name , type1 = :type1 , type2 = :type2 , image = :image WHERE id = :id';
  $Updatedpokemon = $bdd->prepare($Updatepokemon);
  $Updatedpokemon->execute([
    'numero' => $_POST['pknumero'],
    'first_name' => $_POST['pknom'],
    'type1' => $_POST['pktype1'],
    'type2' => $_POST['pktype2'],
    'image' => 'image/' . $_FILES['pokemonupd']["name"],
    'id' => $_GET['updatepokemon']
  ]
  );
  
  $target_dir = "image/";
  $target_file = $target_dir . basename($_FILES["pokemonupd"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Vérification si le fichier est une image
  if(isset($_POST["updatepokemon"])) {
    $check = getimagesize($_FILES["pokemonupd"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Le fichier n'est pas une image.";
      $uploadOk = 0;
    }
  }
  
  // vérification si le fichier existe déjà
  if (file_exists($target_file)) {
    echo "Le fichier existe déjà.";
    $uploadOk = 0;
  }
  
  // Vérification de la taille du fichier
  if ($_FILES["pokemonupd"]["size"] > 500000) {
    echo "La taille du fichier est trop importante.";
    $uploadOk = 0;
  }
  
  // Autorisation seulement de certain format de fichier
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
    $uploadOk = 0;
  }
  
  // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
  if ($uploadOk == 0) {
    echo " Le fichier n'a pas été envoyé.";
  // Si tout est ok, alors le fichier est uploadé dans le bon dossier
  } else {
    if (move_uploaded_file($_FILES["pokemonupd"]["tmp_name"], $target_file)) {
      echo print_r($target_file);
      echo "Le fichier ". htmlspecialchars( basename( $_FILES["pokemonupd"]["name"])). " a été envoyé.";
    } else {
      echo " Erreur lors de l'envoi du fichier";
    }
  }
}
}
?>

<!-- Update Champion -->
<?php
if (isset($_GET['updatechampion'])){
  $mysql2 = 'SELECT * FROM `champion` WHERE champion = :champion';
  $BDDchampion = $bdd->prepare($mysql2);
  $BDDchampion->execute([
    'champion' => $_GET['updatechampion']
  ]);
  $Badges = $BDDchampion->FETCHALL();
  foreach ($Badges as $valeur3){
    include 'updatechampion.php';
  }

if (isset($_POST['updatechampion'])){
  
  $Updatechampion = 'UPDATE `champion` SET champion = :champion , ville = :ville , type = :type , badge = :badge , image = :image WHERE champion = :champion2';
  $Updatedchampion = $bdd->prepare($Updatechampion);
  $Updatedchampion->execute([
    'champion' => $_POST['champnom'],
    'ville' => $_POST['champville'],
    'type' => $_POST['championtype'],
    'badge' => $_POST['champbadge'],
    'image' => 'image2/' . $_FILES['championupd']["name"],
    'champion2' => $_GET['updatechampion']

  ]
  );
  
  $target_dir = "image2/";
  $target_file = $target_dir . basename($_FILES["championupd"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  // Vérification si le fichier est une image
  if(isset($_POST["updatechampion"])) {
    $check = getimagesize($_FILES["championupd"]["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      echo "Le fichier n'est pas une image.";
      $uploadOk = 0;
    }
  }
  
  // vérification si le fichier existe déjà
  if (file_exists($target_file)) {
    echo "Le fichier existe déjà.";
    $uploadOk = 0;
  }
  
  // Vérification de la taille du fichier
  if ($_FILES["championupd"]["size"] > 500000) {
    echo "La taille du fichier est trop importante.";
    $uploadOk = 0;
  }
  
  // Autorisation seulement de certain format de fichier
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
    $uploadOk = 0;
  }
  
  // Vérification si $upload n'est pas à 0 (envoie message d'erreur)
  if ($uploadOk == 0) {
    echo " Le fichier n'a pas été envoyé.";
  // Si tout est ok, alors le fichier est uploadé dans le bon dossier
  } else {
    if (move_uploaded_file($_FILES["championupd"]["tmp_name"], $target_file)) {
      echo print_r($target_file);
      echo "Le fichier ". htmlspecialchars( basename( $_FILES["championupd"]["name"])). " a été envoyé.";
    } else {
      echo " Erreur lors de l'envoi du fichier";
    }
  }
}
}
?>

<!-- Barre de Recherche Pokemon-->
<div class="container">
  <div class="row justify-content-center">
  <?php if (isset($_GET['searchpok'])){
  $mysql42 = 'SELECT * FROM `pokemon` WHERE first_name LIKE :first_name';
  $Search = $bdd->prepare($mysql42);
  $Search->execute([
    'first_name' => '%' . $_GET['searchpok'] . '%'
  ]);
  $Recherchepk = $Search->FETCHALL();
  foreach ($Recherchepk as $valeur4){ ?>
  <a href="index.php?id=<?php echo $valeur4['id']; ?>">
    <div class="card mx-2 bg-secondary" style="width: 18rem;">
    <img src="<?php echo $valeur4['image']; ?>" class="card-img-top" height="400px" width="450px" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Numero : <?php echo $valeur4['numero'] ?></p>
    <p class="card-text text-white"> Nom : <?php echo $valeur4['first_name'] ?></p>
    </div>
    </div>
    <br>
    </a>
  
  
<?php } } ?>
  </div>
</div>

<!-- Barre de Recherche Pokemon-->
<div class="container">
  <div class="row justify-content-center">
  <?php if (isset($_GET['searchpok'])){
  $mysql43 = 'SELECT * FROM `champion` WHERE champion LIKE :champion';
  $Search2 = $bdd->prepare($mysql43);
  $Search2->execute([
    'champion' => '%' . $_GET['searchpok'] . '%'
  ]);
  $Recherchecham = $Search2->FETCHALL();
  foreach ($Recherchecham as $valeur5){ ?>
  <a href="index.php?champion=<?php echo $valeur5['champion']; ?>">  
    <div class="card bg-secondary" style="width: 18rem;">
    <img src="<?php echo $valeur5['image']; ?>" class="card-img-top" height="500px" alt="...">
    <div class="card-body">
    <p class="card-text text-white"> Nom : <?php echo $valeur5['champion'] ?></p>
    <p class="card-text text-white"> Ville : <?php echo $valeur5['ville'] ?></p>
    </div>
    </div>
    <br>
    </a>
  
  
<?php } } ?>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
<footer>
    <?php include 'footer.php' ?>
</footer>
</html>