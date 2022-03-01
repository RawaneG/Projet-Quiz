<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
/**
* Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        if($_POST['action'] == 'connexion')
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            connexion($login,$password);
        }
    }
    else
    {
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}
/**
* Traitement des Requetes GET
*/
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'connexion')
        {
            $login = $_GET['login'];
            $password = $_GET['password'];
            connexion($login,$password);
        }
        elseif($_GET['action'] == 'register')
        {
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."register.html.php");
        }
        elseif($_GET['action'] == 'deconnexion')
        {
            logout();
        }
    }
    else
    {
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}



 function connexion(string $login,string $password):void 
 {
    $errors = [];

    champ_obligatoire("login",$login,$errors);

    if(!isset($errors['login']))
    {
        valid_email("login",$login,$errors);
    }
    champ_obligatoire("password",$password,$errors);

    if(!isset($errors['login']))
    {
        valid_password("password",$password,$errors);
    }
    if(count($errors) == 0)
    {
        $userConnect = find_user_login_password($login , $password);
        if(count($userConnect)!= 0)
        {
            $_SESSION[KEY_USER_CONNECT] = $userConnect;
            header("location:".WEBROOT."?controller=user&action=accueil");
            exit();
        }
        else
        {
            $errors['connexion'] = "Login ou Mot de passe incorrect";
            $_SESSION[KEY_ERRORS] = $errors;
            header("location:".WEBROOT);
            exit();
        }
    }
    else
    {
        $_SESSION[KEY_ERRORS] = $errors;
        header("location:".WEBROOT);
        exit();
    }
}
function logout():void
{
    $_SESSION[KEY_USER_CONNECT] = array();
    unset($_SESSION[KEY_USER_CONNECT]);
    session_destroy();
    header("location:".WEBROOT);
    exit();
};