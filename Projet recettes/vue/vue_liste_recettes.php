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

    <script>

        $(document).ready(function(){
            $('#mrecette').addClass('current');
        });

    </script>

        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2><a href="#">Consultation de recettes</a></h2>

            </header>
        </article>




        <?php

        if (isset($ligne['login']) && isset($ligne['idUser'])) {
            $_SESSION['login'] = $ligne['login'];
            $_SESSION['id'] = $ligne['idUser'];
        }

        /*else
        {
            // détruit la session de la personne connectée après appuyé sur Logout
            if (isset($_SESSION['login']))
            {
                session_destroy();
                header ("location:index.php");
            }*/



    if (isset($_SESSION['login'])) { ?>


    <!--on répète le code ici, pas super!!!!!!!-->

            <form method="post" action="index.php?action=vue_recherche_recettes">
                <div>
                            <label>Titre : </label>
                </div>
                <div>
                    <input type="text" size="40" name="titre" required/>
                </div>
                <br/>

                <div>
                    <label>Type : </label>
                </div>

                <div>
                    <select name="Type" required>
                        <option value="">  </option>
                        <?php
                        foreach ($resultats as $resultat) :

                            //attention case sensitive!!! ?>
                            <option value="<?= $resultat['nom']; ?>"> <?php echo $resultat['nom']; ?> </option>

                        <?php endforeach ?>


                    </select>
                </div>

                <br/>
                <div>
                    <input type="submit" name="rechercher" value="Rechercher"></input>
                    <input type="reset" value="Réinitialiser"></input>
                </div>
            </form>

            <?php if(!empty($_POST['rechercher'])) { ?>

                    <br/>
                    <div >
                        <div>
                            <span class='titre'>Nom</span>
                            <span class='titre'>Type</span>
                        </div>

                        <div>
                            <?php
                            foreach ($resultatsRecettes as $resultat) : ?>
                                <span class="contenu1">
                                    <a href="index.php?action=vue_open_file_recette&fichier=<?= $resultat['cheminFichierRecette']; ?>"> <?= $resultat['nom']; ?> </a>
                                </span>
                                <span class="contenu2">
                                    <?= $resultat['type']; ?>
                                </span>
                                <br/>
                            <?php endforeach ?>

                        </div>
                    </div>
            <?php }


    } else {
        $message = "Vous devez vous connecter pour accéder au menu 'Information thème'";
        header('Location: index.php?action=vue_accueil&msg=$message');
    }
?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";