<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>
        <div class="user">
            <div class="title">
                <h2>CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
                <a href="<?= WEBROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a>
            </div>
            <div class="content" id="content">
                <div class="profile">   
                    <div class="head">
                        <div class="image">
                            <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."avatar.jpg"?>" alt="">
                        </div>
                        <h3><?= $_SESSION[KEY_USER_CONNECT]['prenom'];?></h3>
                    </div>
                    <div class="bottom">
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeQestions"?>">
                                    <h4>Liste Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste.png"?>" alt="">
                                </a>
                            </div>
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=createAdmin"?>">
                                    <h4>Créer Admin</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>">
                                    <h4>Liste Joueurs</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=creerQuestion"?>">
                                    <h4>Créer Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout.png"?>" alt="">
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>