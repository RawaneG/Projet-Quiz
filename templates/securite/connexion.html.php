<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
    if(isset($_SESSION[KEY_ERRORS]))
    {
        $errors = $_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>
    <div class="content">
        <div class="side_image">
            <div class="message_erreur">
                <div class="membre_content">
                    <div class="membre">
                        <p>Vous n'avez pas encore de compte ? Veuillez donc cliquer ci-dessous  </p>
                        <a href="#">Inscription</a>
                    </div>
                </div>
                <div class="message_content">
                    <div class="message">
                        <div>
                            <?php 
                                if(isset($errors['connexion']))
                                {
                                    echo $errors['connexion'];
                                }
                            ?>
                        </div>
                        <div>   
                            <?php 
                                if(isset($errors['login']))
                                {
                                    echo $errors['login'];
                                }
                            ?>  
                        </div>
                        <div>   
                            <?php 
                                if(isset($errors['password']))
                                {
                                    echo $errors['password'];
                                }
                            ?>
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
            <form action="<?= WEBROOT?>" method="POST">
                <input type="hidden" name="controller" value="securite">
                <input type="hidden" name="action" value="connexion">
                <input type="text" name="login" placeholder="Veuillez entrer votre email">
                <input type="password" name="password" placeholder="Veuillez entrer votre mot de passe">
                <input type="submit" value="Soumettre" name="valider">
            </form>
            </div>
        </div>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>
