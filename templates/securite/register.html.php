<?php
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
        <form method="post" enctype="multipart/form-data" id="form">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="inscription">
            <div class="inscription">
                <div class="up">
                    <div class="text">
                        <h3>S'INSCRIRE</h3>
                        <p>Pour tester votre niveau de culture générale</p>
                    </div>
                </div>
                <div class="down">
                    <div class="input" id="prenom">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenomInput" name="prenom" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['prenom']))
                            {
                                echo $errors['prenom'];
                            }
                        ?>
                    </span>
                    <div class="input" id="nom">
                        <label for="">Nom</label>
                        <input type="text" id="nomInput" name="nom" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['nom']))
                            {
                                echo $errors['nom'];
                            }
                        ?>
                    </span>
                    <div class="input" id="email">
                        <label for="">Login</label>
                        <input type="text" id="emailInput" name="login" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['login']))
                            {
                                echo $errors['login'];
                            }
                        ?>
                    </span>
                    <div class="input" id="mdp">
                        <label for="">Password</label>
                        <input type="password" id="mdpInput" name="password" class="inpute">
                    </div>
                    <span class="message">
                            <?php 
                                if(isset($errors['password']))
                                {
                                    echo $errors['password'];
                                }
                            ?>
                    </span>
                    <div class="input" id="c_mdp">
                        <label for="">Confirmer Password</label>
                        <input type="password" id="c_mdpInput" name="c_password" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['c_password']))
                            {
                                echo $errors['c_password'];
                            }
                        ?>
                    </span>
                        <span class="message">
                            <?php 
                                if(isset($errors['avatar']))
                                {
                                    echo $errors['avatar'];
                                }
                            ?>
                        </span>
                    <input type="submit" value="Créer un compte" id="submit">
                </div>
            </div>
            <div class="profil">
                <div class="image">
                    <label for="avatarInput" class="label">
                        <img src="" id="img">
                    </label>
                    <input type="file" name="avatar" id="avatarInput" value="Choisir un fichier" onchange="load(this)">
                </div>
                <div class="title">
                    <h4>Avatar du Joueur</h4>
                </div>
            </div>
        </form>
    </div>
    <script src="<?=WEBROOT."script".DIRECTORY_SEPARATOR."script2.js";?>"></script>
</body>
</html>