<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Exercice 7</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <div class="container-fluid text-center">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Exercice 7 - PHP</h1>
                <h2>Partie 7</h2>
                <p class="lead">Au formulaire de l'exercice 5, ajouter un champ d'envoi de fichier. 
                    Afficher en plus de ce qui est demandé à l'exercice 6, le nom et l'extension du fichier.</p>
                <a href="../index.php" class="btn btn-primary">Retour</a>
            </div>
        </div>
        <div class="row justify-content-center">   
            <?php
                // Les messages d'erreurs
                $civiliteErr = $firstnameErr = $lastnameErr = $fileErr = "";
                // Les valeurs des champs
                $civilite = $firstname = $lastname = $file = "";
                if (empty($_GET['civilite']) || empty($_GET['lastname']) || empty($_GET['firstname'])) {
                    // Si le tableau superglobal $_GET n'est pas vide alors le formulaire a été envoyé
                    if(!empty($_GET)){
                        // On test si les valeurs ne sont pas vide
                        if(empty($_GET['civilite'])){
                            $civiliteErr = "Civilité requise !";
                        }
                        if(empty($_GET['lastname'])) {
                            $lastnameErr = "Nom requis !";
                        }
                        if(empty($_GET['firstname'])) {
                            $firstnameErr = "Prénom requis !";
                        }
                        if(empty($_GET['file'])) {
                            $fileErr = "Document requis !";
                        }
                    }
            ?>    
            <!-- le $_SERVER["PHP_SELF"] permet de renvoyer les info sur la même page au lieu de partir sur une autre page -->
            <!-- la fonction htmlspecialchars() permet de convertir et d'utiliser les caractères spéciaux HTML ... -->
            <!-- ... on utilise cette fonction pour se protéger d'éventuels actes de piratage par injection de code -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get" class="d-block col-5">
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
                    <input type="text" class="form-control" name="lastname" placeholder="Doe" value="<?=htmlspecialchars($_GET['lastname']);?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">PRENOM : <span class="error">* <?= $firstnameErr;?></span></label>
                    <!--On fait en sorte de garder la valeur en mémoire --> 
                    <input type="text" class="form-control" name="firstname" placeholder="John" value="<?=htmlspecialchars($_GET['firstname']);?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Document : <span class="error">* <?= $fileErr;?></span></label>
                    <!--On fait en sorte de garder la valeur en mémoire --> 
                    <input type="file" name="file">
                </div>
                <p><input type="submit" value="OK"></p>
            </form>
            <?php
                // Si tout est ok alors on n'affiche pas le formulaire mais on affiche la phrase à la place
                } else {
                    // On récupère le chemin du fichier avec le pathinfo()
                    $path = pathinfo($_GET['file']);
                    // On filtre pour n'avoir que l'extension
                    $extension = $path['extension'];
                    // Et on filtre aussi pour n'avoir que le nom du fichier
                    $filename = $path['filename'];
            ?>
            <div class='d-block'>
                <p>Bonjour <?= $_GET['civilite']. ' ' . $_GET['lastname'] . ' ' . $_GET['firstname']?>.</p>
                <p>Nom du fichier envoyé : <?= $filename?>.</p>
                <p>Extention du fichier envoyé : <?= $extension ?>.</p> 
            </div>
            <?php
                }
            ?>
        </div>
  </div>
</body>
</html>