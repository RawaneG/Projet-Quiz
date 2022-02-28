<?php
/**
* Chemin sur dossier racine du projet
*/
define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));
/**
* Chemin sur dossier src qui contient les controllers et les modeles
*/
define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);
/**
* Chemin sur dossier templates du projet
*/
define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);
/**
* Chemin sur data qui contient le fichier Json db.json
*/
define("PATH_DB",ROOT."data/db.json");
/**
* Chemin sur le dossier public , pour inclusion des images,css et js
*/
define("WEB_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
/**
* Chemin sur l'action des formulaires
*/
define("WEBROOT","http://localhost:81/Quiz-MVC/public/");

define("KEY_ERRORS","errors");

define("KEY_USER_CONNECT","user-connect");