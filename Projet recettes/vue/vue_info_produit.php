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
?>

<script>

$(document).ready(function(){
    $('#mproduit').addClass('current');
});

</script>


<?php    if (isset($_SESSION['login'])) { ?>
        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2><a href="#">Information produits</a></h2>

            </header>
        </article>

            <!--on répète le code ici, pas super!!!!!!!-->

            <form method="post" action="index.php?action=vue_info_produit">
               <div>
                            <label>Nom du produit : </label>
               </div>
                <br/>
                <div>
                            <input type="text" size="40" name="Nom" required/>
                </div>
                    <br/>

                    <div>
                            <input type="submit" name="rechercher" value="Rechercher"></input>
                    </div>
            </form>

            <?php if(!empty($_POST['rechercher'])) { ?>

            <br/>

            <div >
                <div>
                    <span class='titre'>Nom produit</span>
                </div>

                <br/>

                <?php
                foreach ($resultatsProduit as $resultat) : ?>

                    <span class="contenu2"><a href="index.php?action=vue_open_file_produit&fichier=<?= $resultat['cheminFichierProduit']; ?>"><?= $resultat['nomProduit']; ?></a></span>



                    <br/>



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