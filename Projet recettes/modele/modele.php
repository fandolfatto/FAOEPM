<?php

function getBD() {
    // connexion au serveur MySQL et à la BD
    $connexion = new PDO('mysql:host=localhost;dbname=recettes;charset=utf8', 'root', '');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;

}

function checkLogin($post)
{
    $connexion = getBD();
    extract($post);
    $requete = "SELECT idUser, login FROM Rights WHERE login='" . $login . "' and pwd = '" . $pwd . "'";
    echo $requete;
    $resultats = $connexion->query($requete);
    return $resultats;
    //return $resultats->rowCount();
}

function getTypeRecette()
{
    $connexion = getBD();
    $requete = "SELECT nom FROM type";
    $resultats = $connexion->query($requete);
    return $resultats;
}



function getRecettes($post)
{
    $connexion = getBD();
    extract($post);
    $requete = "SELECT r.nom as nom, t.nom as type, r.cheminFichierRecette FROM recettes r, type t WHERE t.idType = r.fkType and r.nom like '%" . addslashes($titre) . "%' and t.nom = '" . addslashes($Type) . "'" ;
    $resultats = $connexion->query($requete);
    return $resultats;
}

function getTypeInformation() {
    $connexion = getBD();
    $requete = "SELECT nom FROM typeInformations" ;
    $resultats = $connexion->query($requete);
    return $resultats;
}

function getInfoProduit($post) {
    $connexion = getBD();
    extract($post);
    $requete = "SELECT nomProduit, cheminFichierProduit FROM produits where nomProduit like '%" . addslashes($Nom). "%'" ;
    echo $requete;
    $resultats = $connexion->query($requete);
    return $resultats;
}
function getInfoTheme($post) {
    $connexion = getBD();
    extract($post);
    $requete = "SELECT nomTheme, cheminFichierTheme FROM themes where nomTheme like '%" . addslashes($Nom) . "%'" ;
    echo $requete;
    $resultats = $connexion->query($requete);
    return $resultats;
}
function getInfoPhoto($post) {
    $connexion = getBD();
    extract($post);
    $requete = "SELECT cheminFichierPhoto FROM recettes r, photos p, type t where p.fkRecettes = r.idRecettes and r.fkType = t.idType and t.nom = '" . addslashes($TypeRecettes) . "'";
    echo $requete;
    $resultats = $connexion->query($requete);
    return $resultats;
}

function getRepStockage() {
    $connexion = getBD();
    $requete = "SELECT nomRepertoire FROM repertoirestockage";
    $resultats = $connexion->query($requete);
    foreach  ($resultats as $row) {
        return $row['nomRepertoire'];
    }
    return "";
}

function getTypeRecettes($typeRecettes) {
    $connexion = getBD();
    $requete = "SELECT idType FROM type where nom = '" . addslashes($typeRecettes) . "'" ;
    echo $requete;
    foreach  ($connexion->query($requete) as $row) {
        return $row['idType'];
    }
    return "";
}


function ajoutRecette($recetteFileName) {
    $connexion = getBD();
    if ($_POST['Type'] == "recettes") {
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $typeRecette = $_POST['TypeRecettes'];
        $resultat = getTypeRecettes($typeRecette);
        $sql = "insert into recettes (nom, fktype,cheminFichierRecette) values ('" . addslashes($_POST['titre']) . "'," . addslashes($resultat) . ", '" . addslashes($recetteFileName) . "')";
        //$sql = "insert into recettes (nom) values ('sgsgsg')";
        echo $sql;        // use exec() because no results are returned
        $connexion->exec($sql);


    }
}

function ajoutPhotoPourRecette($photoRecetteFileName) {
    $connexion = getBD();
    //on récupère l'id de la recette
    $idRecette = 0;
    $requete = "SELECT idRecettes FROM recettes where nom = '" . addslashes($_POST['titre']) . "'";
    echo $requete;
    foreach ($connexion->query($requete) as $row) {
        $idRecette = $row['idRecettes'];
    }

    if ($idRecette != 0) {
        $sqlphoto = "insert into photos (cheminFichierPhoto, fkRecettes) values ('" . $photoRecetteFileName . "'," . $idRecette . ")";
        echo $sqlphoto;        // use exec() because no results are returned
        $connexion->exec($sqlphoto);
    }
    echo "New record created successfully";
}


function ajoutPhoto($photoFileName)
{
    $connexion = getBD();
    $sql = "insert into photos (cheminFichierPhoto) values ('" . $photoFileName . "')";
    $connexion->exec($sql);
    echo "New record created successfully";
}

function ajoutTheme($themeFileName)
{
    $connexion = getBD();
    $sql = "insert into themes (cheminFichierTheme, nomTheme) values ('" . $themeFileName . "', '" . addslashes($_POST['nom']) . "')";
    $connexion->exec($sql);
    echo "New record created successfully";
}