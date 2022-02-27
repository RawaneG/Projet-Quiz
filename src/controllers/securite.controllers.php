<?php
/**
* Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['action']))
    {
        echo "Traiter le formulaire";
    }
}
/**
* Traitement des Requetes GET
*/
if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset($_GET['action']))
    {
        echo "Charger la page de connexion";
    }
    else
    {
        echo "Charger la page de connexion par défaut";
    }
}