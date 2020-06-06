<?php

include 'functions/main-functions.php';// on charge la base de donéée

/*le but ici sera d'appeler toutes les pages appeler par l'user dans l'url sur index.php.
la fonction scandir nous permettra donc de pouvoir appeler nos differentes pages depuis leur dossier mères sur la page index.php  */
    $pages = scandir('pages/');                                                                                           /*la fonction scandir nous permettre de scanner le dossier pages et stocker les fichier dans un tableau*/
    if(isset($_GET['page']) && !empty($_GET['page'])){// si tu trouve dans l'url  'page' et que page='quelquechose' n'est pas vide
        if(in_array($_GET['page'].'.php',$pages)){// si dans le tableau de scandir qui est stocké dans $pages tu trouve la page appeler par l'utilisateur url?page=home.php
            $page = $_GET['page']; //si la condition en haut est validé alors $page va stocké la valeur de $_get['page'] ici qui est home
        }else{
            $page = "error";//si tu ne trouve pas la valeur stocké dans $_GET['page']dans le dossier pages $page va stcocké error
        }
    }else{
        $page = "home";//sinon si tu ne get pas page dans l'url ce qui voudra dire que l'utilisateur n'a pas taper  page dans l'url alors $page va stocker home
    }




?>


<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/css4.css"  media="screen,projection"/>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>
        <title>Blog 2.0</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body>

        <?php
            include "body/topbar.php";
            include 'pages/'.$page.'.php';// ce script va concerner l'affichage donc on va inclure le fichier qui se trouve dans pages/la valeur stocker dans $page.php
        ?>


        <!--Import jQuery before materialize.js-->

        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.js"></script>
        <script type="text/javascript" src="js/script.js"></script><?php // ce script permettra de gerer le menu burger du menu de navigation en responsive?>

    </body>

</html>
