<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.connexion.css"?>">
    <title>Connexion</title>
</head>
<body>
    <div class="content">
        <div class="side_image">
            <div class="message_erreur">
                <div class="membre_content">
                    <div class="membre">
                        <p>Vous n'avez pas encore de compte ? Veuillez donc cliquer ci-dessous  </p>
                        <a href="">Inscription</a>
                    </div>
                </div>
                <div class="message_content">
                    <div class="message">
                        <div>

                        </div>
                        <div>   

                        </div>
                        <div>   

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="register_form">
            <div class="title">
                <h1>Connexion</h1>
            </div>
            <div class="form">
            <form action="<?=WEBROOT;?>" method="post">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="connexion">
                <input type="text" name="login" placeholder="Veuillez entrer votre email">
                <input type="password" name="password" placeholder="Veuillez entrer votre mot de passe">
                <input type="submit" value="Soumettre" name="valider">
            </form>
            </div>
        </div>
    </div>
    <script src="<?=WEB_PUBLIC."script".DIRECTORY_SEPARATOR."script.js"?>"></script>
</body>
</html>
