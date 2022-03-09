<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        if($_POST['action'] == 'admin')
        {
            $name = $_POST['nom'];
            $prename = $_POST['prenom'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $c_password = $_POST['c_password'];
            $avatar = $_FILES['avatar'];
            inscription($name,$prename,$login,$password,$c_password,$avatar);
        }
    }
}

function inscription(string $name, string $prename,string $login, string $password, string $c_password, string | array $avatar):void
{    

    $errors = [];
    champ_obligatoire("nom",$name,$errors,"Le nom est requis"); 
    champ_obligatoire("prenom",$prename,$errors,"Le prénom est requis");
    champ_obligatoire("login",$login,$errors,"L'email est requis");
    champ_obligatoire("password",$password,$errors,"Le mot de passe est requis");
    champ_obligatoire("c_password",$c_password,$errors,"La confirmation est requise");

    if($password != $c_password)
    {
        $errors['password'] = "Les mots de passe ne sont pas identiques";
        $_SESSION[KEY_ERRORS] = $errors; 
        header('location:'.WEBROOT.'?controller=user&action=createAdmin');
        exit();
    }

    if(count($errors) == 0)
    {
        $userConnect = find_user_login($login);

        if(count($userConnect) != 0)
        {
            $errors['login'] = "Cet utilisateur existe déjà";
            $_SESSION[KEY_ERRORS] = $errors;
            header('location:'.WEBROOT.'?controller=user&action=createAdmin');
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
                    'role' => "ROLE_ADMIN",
                    'score' => 0
                ];
                $folder = ROOT."public/uploads/".$avatar['name'];
                move_uploaded_file($avatar['tmp_name'], $folder);
                $array_data['users'][] = $extra;  
                $final_data = json_encode($array_data,JSON_PRETTY_PRINT);    
                file_put_contents(PATH_DB, $final_data,true);  
                header('location:'.WEBROOT.'?controller=user&action=createAdmin');
                exit();
            }  
        }
    }
    else
    {
        $userConnect = find_user_login($login);
        if(count($userConnect) != 0)
        {
            $errors['login'] = "Cet utilisateur existe déjà";
            $_SESSION[KEY_ERRORS] = $errors;
            header('location:'.WEBROOT.'?controller=user&action=createAdmin');
            exit();
        }
        $_SESSION[KEY_ERRORS] = $errors;
        header("location:".WEBROOT."?controller=user&action=createAdmin");
        exit();
    }

}
/**
* Traitement des Requetes GET
*/
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset($_GET['action']))
    {
        if($_GET['action'] == 'accueil')
        {   
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
        else if(($_GET['action']) == 'listeJoueur')
        {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.joueur.html.php");
        }
        else if(($_GET['action']) == 'joueurAccueil')
        {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.joueur.html.php");
        }
        else if(($_GET['action']) == 'creerQuestion')
        {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."creation.question.html.php");
        }
        else if(($_GET['action']) == 'createAdmin')
        {
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."creation.admin.html.php");
        }
    }
    else
    {
        echo "Qu'est-ce que vous faites là ?";
    }
}
