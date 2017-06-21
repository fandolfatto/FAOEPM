<?php

require "modele/modele.php";

// Affichage de la page d'accueil
function accueil()
{
    require "vue/vue_accueil.php";
}

function logout()
{
    require "vue/vue_logout.php";
}

function login($msg)
{
    echo "dans login dans login dans login dans login dans login dans login";
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])) {
        $resultatsLogin = checkLogin($_POST);
        if (isset($resultatsLogin)) {
            $ligne = $resultatsLogin->fetch();

            if (isset($ligne['idUser'])) {
                echo 'resultat à la requete';
                $resultats = getTypeRecette();
                require "vue/vue_liste_recettes.php";
            } else {

                echo 'pas de resultat à la requete';
                require "vue/vue_accueil.php";
            }
        } else {
            echo 'requete null';
            require "vue/vue_accueil.php";
        }
    } else {
        require "vue/vue_accueil.php";
    }
}

function listePhotos() {
    $resultatsType = getTypeRecette();
    //if (isset($_POST['TypeRecettes'])) {
    if(!empty($_POST['voir'])) {
        $resultatsPhoto = getInfoPhoto($_POST);
    }
    $repStockage = getRepStockage();
    require "vue/vue_liste_photos.php";


}

function listeRecettes()
{

    $resultats = getTypeRecette();
    if(!empty($_POST['rechercher'])) {
        $resultatsRecettes = getRecettes($_POST);
    }
    require "vue/vue_liste_recettes.php";
        //require "vue/vue_login.php";

}

function listeInfoProduit() {
    if (isset($_POST['rechercher'])) {
        $resultatsProduit = getInfoProduit($_POST);
    }
    require "vue/vue_info_produit.php";
    //} else {
    //    require "vue/vue_liste_info_produit.php";
    //}
}

function ouvrirFichierProduits($fichier) {
    $rep = getRepStockage();
    //TO DO POURQUOI PAS de echo sinon le fichier s'ouvre avec un message d'erreir disant que le fichier est corrompu???
    $file=$rep . $fichier;
    if (file_exists($file)) {
        ouvrirFichier($file);
    } else {
        echo "aucun fichier n'existe pour le produit demandé";
        header('Location: index.php?action=vue_info_produit');
    }
}

function listeInfoTheme() {
    if (isset($_POST['rechercher'])) {
        $resultatsThemes = getInfoTheme($_POST);
    }
    require "vue/vue_info_theme.php";

}

function ouvrirFichierThemes($fichier) {
    $rep = getRepStockage();
    //TO DO POURQUOI PAS de echo sinon le fichier s'ouvre avec un message d'erreir disant que le fichier est corrompu???
    $file=$rep . $fichier;
    if (file_exists($file)) {
        ouvrirFichier($file);
    } else {
        echo "aucun fichier n'existe pour le thème demandé";
    }
}

function ouvrirFichierRecettes($fichier) {
    $rep = getRepStockage();
    //TO DO POURQUOI PAS de echo sinon le fichier s'ouvre avec un message d'erreir disant que le fichier est corrompu???
    $file=$rep . $fichier;
    if (file_exists($file)) {
        ouvrirFichier($file);
    } else {
        echo "aucun fichier n'existe pour la recette demandée";
    }
}

function ouvrirFichier($file) {

    //$file="C:\\Temp\\" . $fichier;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);

}

function import_donnees() {
    if (isset($_FILES['file'])) {
        echo 'coucou';
        echo $_FILES['file']['name'];
        $dossier = 'images/';
        $fichier = basename($_FILES['file']['name']);
        if (move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';

        } else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
    }
    if (isset($_POST['Type']) ) {
        if ($_POST['Type'] == "recettes") {
            echo 'recette';
            $resultats = ajoutRecette($_FILES['file']['name']);
            if (isset($_FILES['filePhoto'])) {
                $resultatsPhoto = ajoutPhotoPourRecette($_FILES['filePhoto']['name']);
            }
        } elseif ($_POST['Type'] == "photos") {
            $resultats = ajoutPhoto($_FILES['file']['name']);
        }  elseif ($_POST['Type'] == "thèmes") {
            $resultats = ajoutTheme($_FILES['file']['name']);
        }
    }

    $resultats = getTypeInformation();
    $resultatsType = getTypeRecette();
    require "vue/vue_import_donnees.php";
}

function supprClient($idClient)
{
    if (getNbCmdEnCours($idClient) >0) {
        echo 'suppression pas possible';
        listeClient();
    } else {
        $resultats = supprClientBD($idClient);
        listeClient();
    }
}

function ajoutClient()
{
    if( (isset($_POST['nom'])) && (isset($_POST['prenom'])) && (isset($_POST['adresse'])) && (isset($_POST['ville'])) ) {
        $resultats = ajoutClientBD($_POST);
        listeClient();
    } else {
        require "vue/vue_ajout_client.php";
    }


}

function supprCmd($idCmd)
{
    $resultats = supprCmdBD($idCmd);
    listeClient();
}
