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
                                <a href="<?=WEBROOT."?controller=user&action=listeQuestions"?>" class="active" >
                                    <h4>Liste Questions</h4>
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."liste_active.png"?>" alt="">
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
                <div class="main">
                    <div class="premier_div">
                        <label for="">Nbre de question/Jeu</label>
                        <input type="text" id="compteur">
                        <input type="submit" value="OK">
                    </div>
                    <div class="second_div">
                        <div class="conteneur" id="conteneur">
                            <ol>
                                <?php
                                    foreach ($old_record as $key => $row) 
                                    {
                                        if($key == 'questions')
                                        {
                                            foreach ($row as $value) 
                                            {
                                ?>
                                                <li><?=$value['question'];?></li>
                                <?php
                                                if(isset($value['tdrCheckbox']))
                                                {
                                ?>
                                                    <div class="div_checkbox rep">
                                <?php
                                                    foreach ($value['tdrCheckbox'] as $checkbox) 
                                                    {
                                ?>
                                                        <div class="element_checkbox" id="checkbox">
                                                        <input type="checkbox" class="checkbox"><?=$checkbox;?>
                                                        </div>
                                <?php
                                                    }
                                ?>
                                                    </div>
                                <?php
                                                }
                                                elseif(isset($value['tdrRadio']))
                                                {
                                ?>
                                                    <div class="div_radio rep">
                                <?php
                                                    foreach ($value['tdrRadio'] as $radio) 
                                                    {
                                ?>
                                                    <div class="element_radio" id="radio">
                                                    <input type="radio" name="radio" class="radio"><?=$radio;?>
                                                    </div>
                                <?php
                                                    }
                                ?>
                                                    </div>
                                <?php
                                                }
                                                else
                                                {
                                ?>                  
                                                <div class="rep">
                                                    <input type="text" class="input">
                                                </div>
                                <?php
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </ol>
                        </div>
                    </div>
                    <div class="troisieme_div">
                        <button class="precedent" id="precedent">Précédent</button>
                        <button id="suivant">Suivant</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= WEBROOT."script".DIRECTORY_SEPARATOR."liste.question.js";?>"></script>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>