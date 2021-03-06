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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.connexion.css"?>">
    <title>Connexion</title>
</head>
<body>
    <div class="nav">
        <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."logo.png"?>" alt="">
        <h2>Le plaisir de jouer</h2>
    </div>
    
    <div class="mini_container">
        <form action="<?= WEBROOT?>" method="post" id="form">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="connexion">
            <div class="login_title">
                <h3>Login Form</h3>
                <button>
                    <i class="fa fa-close" style="font-size:24px"></i>
                </button>
            </div>
            <div class="inputs">
                <div class="login" id="login_input">
                    <input type="text" name="login" placeholder="Login" id="login">
                    <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."login.png";?>" width="24px" alt="photo">
                </div>
                <span class="message" id="loginErr">
                    <?php 
                        if(isset($errors['login']))
                        {
                            echo $errors['login'];
                        }
                    ?>
                </span>
                <div class="password" id="password_input">
                    <input type="password" name="password" placeholder="Password" id="password">
                    <i class="material-icons" style="font-size:28px;color:rgb(190, 190, 190);">lock</i>
                </div>
                <span class="message" id="passwdErr">
                    <?php 
                        if(isset($errors['password']))
                        {
                            echo $errors['password'];
                        }
                        if(isset($errors['connexion']))
                        {
                            echo $errors['connexion'];
                        }
                    ?>
                </span>
            </div>
            <div class="submits_container">
                <div class="submits">
                    <input type="submit" value="Connexion" id="valider">
                    <a href="<?= WEBROOT."?controller=securite&action=register"?>" 
                    class="inscription">S'inscrire pour jouer ?</a>
                </div>
            </div>
        </form>
    </div>
    <script src="<?=WEBROOT."script".DIRECTORY_SEPARATOR."script.js";?>"></script>
</body>
</html>