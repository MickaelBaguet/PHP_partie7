<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Exercice 5</title>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Exercice 5 - PHP</h1>
                <h2>Partie 7</h2>
                <p class="lead">Créer un formulaire sur la page index.php avec :
                Une liste déroulante pour la civilité (Mr ou Mme).
                Un champ texte pour le nom.
                Un champ texte pour le prénom.
                Ce formulaire doit rediriger vers la page index.php.
                Vous avez le choix de la méthode.</p>
                <a href="../index.php" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="row justify-content-center">   
            <!-- Le $_SERVER["PHP_SELF"] permet de renvoyer les info sur la même page au lieu de partir sur une autre page -->
            <!-- La fonction htmlspecialchars() permet de convertir et d'utiliser les caractères spéciaux HTML ... -->
            <!-- ... on utilise cette fonction pour se protéger d'éventuels actes de piratage par injection de code -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="d-block col-5">
                <div class="form-group">
                    <label for="civilite">CIVILITE :</label>
                    <select name="civilite" id="">
                        <option value="Mr">Mr.</option>
                        <option value="Mme">Mme.</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">NOM :</label>
                    <input type="text" class="form-control" name="lastname" id="formGroupExampleInput" placeholder="Doe">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">PRENOM :</label>
                    <input type="text" class="form-control" name="firstname" id="formGroupExampleInput2" placeholder="John">
                </div>
                <p><input type="submit" value="OK"></p>
            </form>
            <?php
                // Si le tableau superglobal $_POST existe alors le formulaire a bien été envoyé
                if(!empty($_POST)){
                    echo 'Bonjour '. $_POST['civilite'] .' '. $_POST['lastname'] . ' ' . $_POST['firstname'] . ' !';
                }
            ?>
        </div>
  </div>
</body>
</html>

