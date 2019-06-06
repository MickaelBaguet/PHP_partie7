<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Exercice 3</title>
</head>
<body>
  <div class="container-fluid text-center">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-3">Exercice 3 - PHP</h1>
        <h2>Partie 7</h2>
        <p class="lead">Avec le formulaire de l'exercice 1, afficher dans la page user.php les données du formulaire transmis.</p>
        <a href="../index.php" class="btn btn-primary">Retour</a>
      </div>
    </div>
    <div class="row justify-content-center">    
        <p>Bonjour, <?= $_GET['lastname']; ?> <?= $_GET['firstname'];?>, comment vas-tu ?</p>
    </div>

  </div>
</body>
</html>