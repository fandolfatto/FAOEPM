<!DOCTYPE HTML>
<!--
	Striped by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Striped by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/css/tableau-res.css">
    <script src="assets/js/jquery.min.js"></script>
</head>
<body>

<script>

    $(document).ready(function(){
        if ($('#mrecette').hasClass('current')) {
            $('#mrecette').removeClass('current');
        }
        if ($('#mproduit').hasClass('current')) {
            $('#mproduit').removeClass('current');
        }
        if ($('#mtheme').hasClass('current')) {
            $('#mtheme').removeClass('current');
        }
        if ($('#mdeconnection').hasClass('current')) {
            $('#mdeconnection').removeClass('current');
        }
        if ($('#mimport').hasClass('current')) {
            $('#mimport').removeClass('current');
        }
        if ($('#mphoto').hasClass('current')) {
            $('#mphoto').removeClass('current');
        }
    });

</script>

<!-- Content -->
<div id="content">
    <div class="inner">

       <?=$contenu ?>

    </div>
</div>


<!-- Sidebar -->
<div id="sidebar">

    <!-- Logo -->
    <h1 id="logo"><a href="#">MENU</a></h1>

    <nav id="nav">
        <ul>
            <li id="mrecette"><a href="index.php?action=vue_recherche_recettes">Consultation des recettes</a></li>
            <li id="mphoto"><a href="index.php?action=vue_photo">Photos culinaires</a></li>
            <li id="mproduit"><a href="index.php?action=vue_info_produit">Information produits</a></li>
            <li id="mtheme"><a href="index.php?action=vue_info_theme">Information thèmes</a></li>
            <li id="mimport"><a href="index.php?action=vue_import_donnees">Import des recettes, photos, thèmes</a></li>
            <li id="mdeconnection"><a href="index.php?action=vue_logout">Déconnection</a></li>
        </ul>
    </nav>

    <!-- Copyright -->
    <ul id="copyright">
        <li>&copy; Untitled.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
    </ul>

</div>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>