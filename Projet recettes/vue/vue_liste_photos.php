<?php
$titre ='Liste photos';

// vue_liste_photos.php
// Date de création : 20.06.2017
// Date de modification :
// Auteur : FAO
// Fonction : vue pour l'affichage et la recherche des photos de recettes
// _______________________________

// Tampon de flux stocké en mémoire
ob_start();

if (isset($_SESSION['login'])) { ?>


    <script>

        $(document).ready(function(){
            $('#mphoto').addClass('current');
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
                <h2><a href="#">Photos</a></h2>

            </header>
        </article>

            <form method="post" action="index.php?action=vue_photo">
                <div>
                    <label>Type de recettes : </label>
                </div>
                <br/>
                <div>
                    <select name="TypeRecettes">
                        <option value="">  </option>
                        <?php
                        foreach ($resultatsType as $resultat) :

                            //attention case sensitive!!! ?>
                            <option id="<?= $resultat['nom']; ?>" value="<?= $resultat['nom']; ?>"> <?php echo $resultat['nom']; ?> </option>

                        <?php endforeach ?>
                    </select>
                </div>
                <br/>

                <div>
                    <input type="submit" name="voir" value="Voir"></input>
                </div>
                <br/>
            </form>

        <?php if(!empty($_POST['voir'])) { ?>

            <div>
                <?php
                $i = 0;
                foreach ($resultatsPhoto as $resultat) :
                    ?>
                    <div>
                        <div>
                            images/<?= $resultat['cheminFichierPhoto']; ?>';
                            <span><img class="image" src="images/<?= $resultat['cheminFichierPhoto']; ?>"/></span>
                        <?php if ($i % 3 == 0) { ?>

                            </div>
                            <div>
                        <?php $i++;  } ?>
                        </div>
                    </div>


                <?php endforeach ?>
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