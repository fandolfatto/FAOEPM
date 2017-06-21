<?php
//session_destroy();
session_set_cookie_params(1200); // durée de vie de session à 20 min si > destruction automatique
session_start();

require 'controleur/controleur.php';

try
{
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch ($action)
        {
            case 'vue_accueil' :
                if (isset($_GET['msg'])) {
                    $message=$_GET['msg'];
                } else {
                    $message="";
                }
                login($message);
                break;

            case 'vue_photo' :
                listePhotos();
                break;
            case 'vue_info_produit' :
                listeInfoProduit();
                break;
            case 'vue_open_file_produit' :
                $fichier = $_GET['fichier'];
                ouvrirFichierProduits($fichier);
                break;
            case 'vue_open_file_theme' :
                $fichier = $_GET['fichier'];
                ouvrirFichierThemes($fichier);
                break;
            case 'vue_open_file_recette' :
                $fichier = $_GET['fichier'];
                ouvrirFichierRecettes($fichier);
                break;
            case 'vue_info_theme' :
                listeInfoTheme();
                break;
            case 'vue_recherche_recettes' :
                listeRecettes();
                break;
            case 'vue_import_donnees' :
                import_donnees();
                break;
            case 'vue_logout' :
                logout();
                break;
            default :
                throw new Exception("action non valide");
        }
    }
    else
        login("");  // Si aucune action n’est envoyée dans l’URL

}
catch (Exception $e)
{
    echo $e->getMessage();
}
