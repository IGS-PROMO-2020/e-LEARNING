
<?php
include '../functions/main-functions.php';
if (!isset($_SESSION['admin'])) {
header('location:login.php');
}
$pages = scandir('fichiers/');
if(isset($_GET['page']) && !empty($_GET['page'])){
    if(in_array($_GET['page'].'.php',$pages)){
        $page = $_GET['page'];
    }else{
        $page = "error";
    }
}else{
    $page = "edit";
}


?>


<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
    <title>Blog 2.0 | Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>

</head>

<body>

<?php



include "body/topbar.php";
?>
<div class="container">
    <?php
    include 'fichiers/'.$page.'.php';
    ?>
</div>


<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.js"></script>
<script type="text/javascript" src="../js/script.js"></script>


?>

</body>
</html>
