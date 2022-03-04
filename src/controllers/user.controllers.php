<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        
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
    }
    else
    {
        echo "Qu'est-ce que vous faites là ?";
    }
}
