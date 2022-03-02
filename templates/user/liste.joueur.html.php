<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if(!isset($_SESSION[KEY_USER_CONNECT]))
    {
        header("location :".WEBROOT);
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
    <link rel="stylesheet" href="<?=WEB_PUBLIC."css".DIRECTORY_SEPARATOR."style.liste.joueur.css"?>">
    <title>Liste des Joueurs</title>
</head>
<body>
    <div class="nav">
        <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."logo.png"?>" alt="">
        <h2>Le plaisir de jouer</h2>
    </div>
    <div class="mini_container">
    <div class="user">
            <div class="title">
                <h2>CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
                <a href="<?= WEBROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a>
            </div>
            <div class="content">
                <div class="profile">   
                    <div class="head">
                        <div class="image">
                            <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."avatar.jpg"?>" alt="">
                        </div>
                        <h3><?= $_SESSION[KEY_USER_CONNECT]['prenom'];?></h3>
                    </div>
                    <div class="bottom">
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>">
                                    <h4>Liste Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste.png"?>" alt="">
                                </a>
                            </div>
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>">
                                    <h4>Créer Admin</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>" class="active" >
                                    <h4>Liste Joueurs</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste_active.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>">
                                    <h4>Créer Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout.png"?>" alt="">
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="main">
                    <div class="title_joueurs">
                        <h2>LISTE DES JOUEURS PAR SCORE</h2>
                    </div>
                    <div class="joueurs">
                        <div class="joueurs_liste">
                            <div class="titles">
                                <div class="nom">
                                    <h3>Nom</h3>
                                </div>
                                <div class="prenom">
                                    <h3>Prénom</h3>
                                </div>
                                <div class="score">
                                    <h3>Score</h3>  
                                </div>
                            </div>
                            <table> 
                                <?php 
                                    foreach($old_record as $row)
                                    {
                                        foreach($row as $value)
                                        {
                                ?>
                                <tr>
                                    <td><?= $value['nom']; ?></td>
                                    <td><?= $value['prenom'];?></td>
                                    <td><?= $value['score'];?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="next">
                        <button>Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>