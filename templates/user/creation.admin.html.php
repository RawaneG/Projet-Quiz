<?php    
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."header.html.php");
    if(isset($_SESSION[KEY_ERRORS]))
    {
        $errors = $_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
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
                                <a href="<?=WEBROOT."?controller=user&action=createAdmin"?>" class="active">
                                    <h4>Créer Admin</h4> 
                                    <img src="<?=WEBROOT."img".DIRECTORY_SEPARATOR."ajout_active.png"?>" alt="">
                                </a>
                            </div>                            
                            <div class="liste">
                                <a href="<?=WEBROOT."?controller=user&action=listeJoueur"?>" >
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
                                            <!-- Second Part of the Page -->
                <div class="main">
                <form action="<?=WEBROOT?>" method="post" enctype="multipart/form-data" id="form">
            <input type="hidden" name="controller" value="user">
            <input type="hidden" name="action" value="admin">
            <div class="inscription">
                <div class="up">
                    <div class="text">
                        <h3>S'INSCRIRE</h3>
                        <p>Pour tester votre niveau de culture générale</p>
                    </div>
                </div>
                <div class="down">
                    <div class="input" id="prenom">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenomInput" name="prenom" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['prenom']))
                            {
                                echo $errors['prenom'];
                            }
                        ?>
                    </span>
                    <div class="input" id="nom">
                        <label for="">Nom</label>
                        <input type="text" id="nomInput" name="nom" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['nom']))
                            {
                                echo $errors['nom'];
                            }
                        ?>
                    </span>
                    <div class="input" id="email">
                        <label for="">Login</label>
                        <input type="text" id="emailInput" name="login" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['login']))
                            {
                                echo $errors['login'];
                            }
                        ?>
                    </span>
                    <div class="input" id="mdp">
                        <label for="">Password</label>
                        <input type="password" id="mdpInput" name="password" class="inpute">
                    </div>
                    <span class="message">
                            <?php 
                                if(isset($errors['password']))
                                {
                                    echo $errors['password'];
                                }
                            ?>
                    </span>
                    <div class="input" id="c_mdp">
                        <label for="">Confirmer Password</label>
                        <input type="password" id="c_mdpInput" name="c_password" class="inpute">
                    </div>
                    <span class="message">
                        <?php 
                            if(isset($errors['c_password']))
                            {
                                echo $errors['c_password'];
                            }
                        ?>
                    </span>

                        <span class="message">
                            <?php 
                                if(isset($errors['avatar']))
                                {
                                    echo $errors['avatar'];
                                }
                            ?>
                        </span>
                    <input type="submit" value="Créer un compte" id="submit" onclick="success();">
                </div>
            </div>
            <div class="profil">
                <div class="image_profile">
                        <label for="avatarInput" class="label">
                            <img src=" " alt="" id="img" title="Veuillez entrer une photo de profil">
                        </label>
                        <input type="file" name="avatar" id="avatarInput" value="Choisir un fichier" onchange="load(this)">
                </div>
                <div class="title_avatar">
                    <h4>Avatar du Joueur</h4>
                </div>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=WEBROOT."script".DIRECTORY_SEPARATOR."script2.js";?>"></script>
<?php
    require_once(PATH_VIEWS."include".DIRECTORY_SEPARATOR."footer.html.php");
?>