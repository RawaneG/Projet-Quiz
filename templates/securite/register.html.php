<?php
    // require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
    if(isset($_SESSION[KEY_ERRORS]))
    {
        $errors = $_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.register.css";?>">
    <title>Inscription</title>
</head>
<body>
    <div class="nav">
        <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."logo.png"?>" alt="">
        <h2>Le plaisir de jouer</h2>
    </div>
    <div class="mini_container">
        <form action="<?=WEBROOT?>" method="post">
            <div class="inscription">
                <div class="up">
                    <div class="text">
                        <h3>S'INSCRIRE</h3>
                        <p>Pour tester votre niveau de culture générale</p>
                    </div>
                </div>
                <div class="down">
                    <div class="input">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom">
                    </div>
                    <div class="input">
                        <label for="">Nom</label>
                        <input type="text" id="nom">
                    </div>
                    <div class="input">
                        <label for="">Login</label>
                        <input type="text" id="login">
                    </div>
                    <div class="input">
                        <label for="">Password</label>
                        <input type="password" id="password">
                    </div>
                    <div class="input">
                        <label for="">Confirmer Password</label>
                        <input type="password" id="c_password">
                    </div>
                    <div class="avatar">
                        <h4>Avatar</h4>
                        <input type="submit" value="Choisir un fichier">
                    </div>
                    <input type="submit" value="Créer un compte">
                </div>
            </div>
            <div class="profil">
                <div class="image">
                    <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."avatar.jpg"?>" alt="">
                </div>
                <div class="title">
                    <h4>Avatar du Joueur</h4>
                </div>
            </div>
        </form>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>