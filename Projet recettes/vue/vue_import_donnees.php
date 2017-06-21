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



    <?php if (isset($_SESSION['login'])) { ?>


        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                    Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                    if they get too long. You can also remove the <p> entirely if you don't
                    need a subtitle.
                -->
                <h2>Import des données</h2>

            </header>
<!-- indispensable de mettre le enctype -->
            <form method="post" enctype="multipart/form-data" action="index.php?action=vue_import_donnees" >

                <div><label>Type de données : </label></div>
                <div>
                    <select name="Type" id="Type">
                        <option value="">  </option>
                        <?php
                        $i = 1;
                        foreach ($resultats as $resultat) :

                            //attention case sensitive!!! ?>
                            <option value="<?= $resultat['nom']; ?>"> <?php echo $resultat['nom']; ?> </option>
                            i++;
                        <?php endforeach ?>
                    </select>
                </div>
                <br/>

                <div id="fichier"><label>Fichier : </label>
                        <div >
                            <input type="file" size="40" name="file" id="file"/>
                        </div>

                        <br/>
                </div>

                <div id ="fichierphoto"><label>Fichier photo : </label>
                        <div>
                            <input type="file" size="40" name="filePhoto" id="filePhoto"/>
                        </div>

                        <br/>
                </div>

                        <script>

                            $('select[name="Type"]').change(function(){
                                // Je créer l'id du div qui va être affiché
                                //alert($('#Type option:selected').val());
                                if ($('#Type option:selected').val() == 'recettes') {
                                    $('#recette').show();
                                    $('#titre').attr('required', 'required');
                                    $('#TypeRecettes').attr('required', 'required');
                                    $('#fichier').show();
                                    $('#file').attr('required', 'required');
                                    $('#fichierphoto').show();
                                    $('#photo').hide();
                                    $('#theme').hide();
                                }
                                else if ($('#Type option:selected').val() == 'photos') {
                                    $('#photo').show();
                                    $('#fichierphoto').show();
                                    $('#filePhoto').attr('required', 'required');
                                    $('#fichier').hide()
                                    $('#recette').hide();
                                    $('#theme').hide();
                                }
                                else if ($('#Type option:selected').val() == 'thèmes') {

                                    $('#fichier').show();
                                    $('#file').attr('required', 'required');
                                    $('#fichierphoto').hide();
                                    $('#recette').hide();
                                    $('#photo').hide();
                                    $('#theme').show();
                                    $('#nom').attr('required', 'required');
                                } else {
                                    $('#fichier').hide();
                                    $('#fichierphoto').hide();
                                    $('#recette').hide();
                                    $('#photo').hide();
                                    $('#theme').hide();
                                }

                            });

                            $('document').ready(function() {
                                $('#fichier').hide();
                                $('#fichierphoto').hide();
                                $('#recette').hide();
                                $('#photo').hide();
                                $('#theme').hide();


                                $('#mimport').addClass('current');

                            })

                        </script>



                        <div id="recette"  >

                            <div><label>Titre : </label></div>
                            <div>
                                <input type="text" name="titre" size="40" id="titre"/>
                            </div>
                            <br/>

                            <div>
                                <label>Type de recettes : </label>
                            </div>
                            <div>
                                <select name="TypeRecettes" id="TypeRecettes">
                                    <option value="">  </option>
                                    <?php
                                    foreach ($resultatsType as $resultat) :

                                        //attention case sensitive!!! ?>
                                        <option id="<?= $resultat['nom']; ?>" value="<?= $resultat['nom']; ?>"> <?php echo $resultat['nom']; ?> </option>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <br/>
                        </div>

                        <div id="theme" class="mes_divs" >

                            <div><label>Nom : </label></div>
                            <div>
                                <input type="text" name="nom" size="40" id="nom" />
                            </div>
                            <br/>

                        </div>


                        <div>
                            <input type="submit" name="importer" value="Importer"></input>
                        </div>
            </form>


        </article>

        <?php

    } else {
        $message = "Vous devez vous connecter pour accéder au menu 'Information thème'";
        header('Location: index.php?action=vue_accueil&msg=$message');
    }


$contenu = ob_get_clean();
require "gabarit.php";