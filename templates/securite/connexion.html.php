<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
    if(isset($_SESSION[KEY_ERRORS]))
    {
        $errors = $_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>
    <div class="nav">
        <h2>Le plaisir de jouer</h2>
    </div>
    <div class="mini_container">
        <form action="<?= WEBROOT?>" method="post">
            <input type="hidden" name="controller" value="securite">
            <input type="hidden" name="action" value="connexion">
            <div class="login_title">
                <h3>Login Form</h3>
                <button>
                    <i class="fa fa-close" style="font-size:24px"></i>
                </button>
            </div>
            <div class="inputs">
                <div class="login">
                    <input type="text" name="login" placeholder="Login">
                    <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."login.png";?>" width="24px" alt="photo">
                </div>
                <span class="message">
                    <?php 
                        if(isset($errors['connexion']))
                        {
                            echo $errors['connexion'];
                        }
                        if(isset($errors['login']))
                        {
                            echo $errors['login'];
                        }
                    ?>
                </span>
                <div class="password">
                    <input type="password" name="password" placeholder="Password">
                    <i class="material-icons" style="font-size:28px;color:rgb(190, 190, 190);">lock</i>
                </div>
                <span class="message">
                    <?php 
                        if(isset($errors['password']))
                        {
                            echo $errors['password'];
                        }
                    ?>
                </span>
            </div>
            <div class="submits_container">
                <div class="submits">
                    <input type="submit" value="Connexion">
                    <a href="#" class="inscription">S'inscrire pour jouer ?</a>
                </div>
            </div>
        </form>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>