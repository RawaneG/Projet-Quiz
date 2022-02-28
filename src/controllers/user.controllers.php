<?php
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        if(isset($_POST['action']) == 'connexion')
        {

        }
    }
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
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
    }
}