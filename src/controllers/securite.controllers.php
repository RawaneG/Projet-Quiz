<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
/**
* Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        if(isset($_POST['action']) == 'connexion')
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            connexion($login,$password);
        }
    }
}
else
{
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
}
/**
* Traitement des Requetes GET
*/
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset($_GET['action']))
    {
        if(isset($_GET['action']) == 'connexion')
        {
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
            $login = $_GET['login'];
            $password = $_GET['password'];
            connexion($login,$password);
        }
    }
}
else
{
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
}


function connexion(string $login, string $connexion) : void
{
    $errors = [];

    champ_obligatoire('login',$login,$errors);
    champ_obligatoire('password',$password,$errors);

    if(count($errors) == 0)
    {
        valid_email('login',$login,$errors);
    }
    if(count($errors) == 0)
    {
        $user = find_user_login_password($login,$password);
        if(count($user) != 0)
        {
            $_SESSION[KEY_USER_CONNECT] = $user;
            header('location:'.WEBROOT."?controller=user&action=accueil");
            exit();
        }
        else
        {
            $errors['connexion'] = 'Login ou Mot de passe incorrect';
            $_SESSION[KEY_ERRORS] = $errors;
            header('location:'.WEBROOT);
            exit();
        }
    }
    else
    {
        $_SESSION[KEY_ERRORS] = $errors;
        header('location:'.WEBROOT);
        exit();
    }
}
