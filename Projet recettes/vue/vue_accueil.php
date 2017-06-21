<?php
$titre ='Rent A Snow - Accueil';

// vue_accueil.php
// Date de création : 23/11/16
// Date de modification :
// Auteur : PBA
// Fonction : vue pour l'affichage page d'accueil
// _______________________________

// Tampon de flux stocké en mémoire
ob_start();
?>
        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2><a href="#">Ce site est réservé pour la classe de 4ème de l'EPM</a></h2>
                <p>Veuillez vous connecter pour avoir accès au site.</p>
            </header>

            <?php  if(!empty($_POST['connecter'])) {

                echo 'Vous avez entré un mauvais login ou mot de passe.';
                echo '<br/>';
                echo '<br/>';
                if (isset($msg)) {
                    echo $msg;
                }
            }

            ?>

                <form method="post" action="index.php?action=vue_accueil">
                    <div>
                        <label>Login : </label>
                    </div>
                    <div>
                        <input type="text" size="40" name="login" required/>
                    </div>
                    <br/>
                    <div>
                        <label>Mot de passe : </label>
                    </div>
                    <div>
                         <input type="password" size="40" name="pwd" required/>
                    </div>
                    <br/>

                    <div>
                         <input type="submit" name="connecter" value="Se connecter"></input>
                         <input type="reset" value="Réinitialiser"></input>
                    </div>

                </form>


        </article>



<?php
$contenu = ob_get_clean();
require "gabarit.php";