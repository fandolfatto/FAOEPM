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

session_destroy();
?>

    <script>

        $(document).ready(function(){
            $('#mdeconnection').addClass('current');
        });

    </script>

Vous êtes déconnecté.


<?php
$contenu = ob_get_clean();
require "gabarit.php";