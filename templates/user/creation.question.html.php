<?php    
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
?>
    <div class="user">
            <div class="title">
                <h2>CRÉER ET PARAMÉTRER VOS QUIZZ</h2>
                <a href="<?= WEBROOT."?controller=securite&action=deconnexion"?>">Déconnexion</a>
            </div>
            <div class="content">
                <div class="profile">   
                    <div class="head">
                        <div class="image">
                            <img src="<?= WEBROOT."uploads/".$_SESSION[KEY_USER_CONNECT]['image']['name']?>" alt="">
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
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>" >
                                    <h4>Liste Joueurs</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=creerQuestion"?>" class="active">
                                    <h4>Créer Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout_active.png"?>" alt="">
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
                                            <!-- Second Part of the Page -->
                <div class="main">
                    <div class="title_joueurs">
                        <h2>PARAMÉTREZ VOTRE QUESTION</h2>
                    </div>
                    <form class="question_sections">
                        <div class="first_bloc">
                            <div class="question">
                                <label for="">Questions</label>
                                <textarea name="" id="" rows="4"></textarea>
                            </div>  
                            <div class="points">
                                <label for="">Nbre de points</label>
                                <input type="number">
                            </div>
                            <div class="type_reponse">
                                <label for="">Type de réponse</label>
                                <select name="" id="">
                                    <option value=""></option>
                                </select>
                                <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."ajout_reponse.png  "?>" alt="">
                            </div>
                            <div class="reponse">
                                <label for="">Réponse</label>
                                <input type="text">
                                <input type="checkbox">
                                <input type="radio">
                                <img src="<?= WEBROOT."img".DIRECTORY_SEPARATOR."supprimer.png  "?>" alt="">
                            </div>
                        </div>
                        <div class="button">
                        <button>Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>