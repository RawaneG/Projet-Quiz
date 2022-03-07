<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if(!isset($_SESSION[KEY_USER_CONNECT]))
    {
        header('location:'.WEBROOT);
    }
    $jsonFile = file_get_contents((PATH_DB),true);
    $old_record = json_decode($jsonFile,true); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.accueil.css"?>">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.accueil.joueur.css"?>">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.liste.joueur.css"?>">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.createQuestion.css"?>">
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.createAdmin.css"?>">

    <title></title>
</head>
<body>
<div class="nav">
        <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."logo.png"?>" alt="">
        <h2>Le plaisir de jouer</h2>
    </div>
    <div class="mini_container" id="mini_container">