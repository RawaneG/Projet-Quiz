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
                                <a href="<?=WEBROOT."?controller=user&action=listeQuestions"?>">
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
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>" class="active" >
                                    <h4>Liste Joueurs</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste_active.png"?>" alt="">
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
                <div class="main">
                    <div class="title_joueurs">
                        <h2>LISTE DES JOUEURS PAR SCORE</h2>
                    </div>
                    <div class="joueurs" id="joueur">
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
                            <table id="table"> 
                                <?php 
                                    foreach($old_record as $key=>$row)
                                    {
                                        if ($key == 'users') 
                                        {
                                            foreach($row as $value)
                                            {
                                                if($value['role'] == 'ROLE_ADMIN')
                                                {
                                                    continue;
                                                }
                                ?>
                                <tr>
                                    <td><?= $value['nom'];?></td>
                                    <td><?= $value['prenom'];?></td>
                                    <td><?= $value['score'];?></td>
                                </tr>
                                <?php
                                            }
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="next">
                        <button id="precedent" class="precedent">Précédent</button>
                        <button id="suivant">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= WEBROOT."script".DIRECTORY_SEPARATOR."liste.joueur.js";?>"></script>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>