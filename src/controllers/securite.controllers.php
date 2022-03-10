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
        else if($_POST['action'] == 'inscription')
        {
            $name = correct($_POST['nom']);
            $prename = correct($_POST['prenom']);
            $login = correct($_POST['login']);
            $password = correct($_POST['password']);
            $c_password = correct($_POST['c_password']);
            $avatar = $_FILES['avatar'];  
            $avatar['name'] = $login;
            inscription($name,$prename,$login,$password,$c_password,$avatar);
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


function inscription(string $name, string $prename,string $login, string $password, string $c_password,
string | array $avatar):void
{

    $errors = [];

    champ_obligatoire("nom",$name,$errors,"Le nom est requis"); 
    champ_obligatoire("prenom",$prename,$errors,"Le prénom est requis");
    champ_obligatoire("login",$login,$errors,"L'email est requis");
    champ_obligatoire("password",$password,$errors,"Le mot de passe est requis");
    champ_obligatoire("c_password",$c_password,$errors,"La confirmation est requise");
    champ_obligatoire("avatar",$avatar,$errors,"Veuillez rentrer une image");

    if(!isset($errors['login']))
    {
        valid_email("login",$login,$errors);
    }
    champ_obligatoire("password",$password,$errors);

    if(!isset($errors['password']))
    {
        valid_password("password",$password,$errors);
    }
    
    if($password != $c_password)
    {
        $errors['password'] = "Les mots de passe ne sont pas identiques";
        $_SESSION[KEY_ERRORS] = $errors; 
        header('location:'.WEBROOT.'?controller=securite&action=register');
        exit();
    }
    if(count($errors) == 0)
    {

        $userConnect = find_user_login($login);
        
        if(count($userConnect) != 0)
        {
            $errors['login'] = "Cet email existe déjà, Veuillez vous connecter";
            $_SESSION[KEY_ERRORS] = $errors;
            header('location:'.WEBROOT.'?controller=securite&action=register');
            exit();
        }
        else
        {
            if(file_exists(PATH_DB))  
            {  
                $current_data = file_get_contents(PATH_DB); 
                $array_data = json_decode($current_data, true); 
                $extra = 
                [                      
                    'prenom' => $prename,  
                    'nom' => $name,  
                    'login' => $login ,
                    'password' => $password,
                    'image' => $avatar,
                    'role' => "ROLE_JOUEUR",
                    'score' => 0
                ];
                upload($avatar);
                $array_data['users'][] = $extra;  
                $final_data = json_encode($array_data,JSON_PRETTY_PRINT);    
                file_put_contents(PATH_DB, $final_data,true);  
                header('location:'.WEBROOT);
            }  
        }
    }
    else
    {

        $userConnect = find_user_login($login);
        if(count($userConnect) != 0)
        {
            $errors['login'] = "Cet email existe déjà, Veuillez vous connecter";
            $_SESSION[KEY_ERRORS] = $errors;
            header('location:'.WEBROOT.'?controller=securite&action=register');
            exit();
        }
        $_SESSION[KEY_ERRORS] = $errors;
        header("location:".WEBROOT."?controller=securite&action=register");
        exit();
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

    if(!isset($errors['password']))
    {
        valid_password("password",$password,$errors);
    }
    if(count($errors) == 0)
    {

        $userConnect = find_user_login_password($login , $password);
        if(count($userConnect) != 0)
        {
            $_SESSION[KEY_USER_CONNECT] = $userConnect;
            if(!is_joueur())
            {
                header("location:".WEBROOT."?controller=user&action=accueil");
                exit();
            }
            else
            {
                header("location:".WEBROOT."?controller=user&action=joueurAccueil");
                exit();
            }
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