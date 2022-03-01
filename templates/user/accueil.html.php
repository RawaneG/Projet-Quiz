<?php
    if(!isset($_SESSION[KEY_USER_CONNECT]))
    {
        header('location:'.WEBROOT);
    }
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>
    <header>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Utilisateurs</a></li>
            <li><a href="<?= WEBROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a></li>
        </ul>
    </header>
    <section>

    </section>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>