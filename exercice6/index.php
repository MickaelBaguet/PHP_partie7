<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exercice 6</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Exercice 6 - PHP</h1>
                <h2>Partie 7</h2>
                <p class="lead">Avec le formulaire de l'exercice 5, Si des données sont passées en POST ou en GET, 
                    le formulaire ne doit pas être affiché. Par contre les données transmises doivent l'être. 
                    Dans le cas contraire, c'est l'inverse.
                    Utiliser qu'une seule page.</p>
                <a href="../index.php" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="row justify-content-center">   
            <?php
                // Les messages d'erreurs
                $civiliteErr = $firstnameErr = $lastnameErr = "";
                // Les valeurs des champs
                $civilite = $firstname = $lastname = "";
                if (empty($_POST['civilite']) || empty($_POST['lastname']) || empty($_POST['firstname'])) {
                    // Si le tableau superglobal $_POST n'est pas vide alors le formulaire a été envoyé
                    if(!empty($_POST)){
                        // On test si les valeurs ne sont pas vide
                        if(empty($_POST['civilite'])){
                            $civiliteErr = "Civilité requise !";
                        }
                        if(empty($_POST['lastname'])) {
                            $lastnameErr = "Nom requis";
                        }
                        if(empty($_POST['firstname'])) {
                            $firstnameErr = "Prénom requis";
                        }
                    }
            ?>    
            <!-- le $_SERVER["PHP_SELF"] permet de renvoyer les info sur la même page au lieu de partir sur une autre page -->
            <!-- la fonction htmlspecialchars() permet de convertir et d'utiliser les caractères spéciaux HTML ... -->
            <!-- ... on utilise cette fonction pour se protéger d'éventuels actes de piratage par injection de code -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="d-block col-5">
                <div class="form-group">
                    <label for="civilite">CIVILITE :</label>
                    <input type="radio" name="civilite" value="Madame"> Madame
                    <input type="radio" name="civilite" value="Monsieur"> Monsieur
                    <input type="radio" name="civilite" value="Truc"> Autre
                    <span class="error">* <?= $civiliteErr;?></span>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">NOM : <span class="error">* <?= $lastnameErr;?></span></label>
                    <!--On fait en sorte de garder la valeur en mémoire --> 
                    <input type="text" class="form-control" name="lastname" placeholder="Doe" value="<?=htmlspecialchars($_POST['lastname']);?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">PRENOM : <span class="error">* <?= $firstnameErr;?></span></label>
                    <!--On fait en sorte de garder la valeur en mémoire --> 
                    <input type="text" class="form-control" name="firstname" placeholder="John" value="<?=htmlspecialchars($_POST['firstname']);?>">
                </div>
                <p><input type="submit" value="OK"></p>
            </form>
            <?php
                // Si tout est ok alors on n'affiche pas le formulaire mais on affiche la phrase à la place
                } else {
                    echo 'Bonjour '. $_POST['civilite'] .' ' . $_POST['lastname'] . ' ' . $_POST['firstname'] . ' !';
                }
            ?>
        </div>
  </div>
</body>
</html>