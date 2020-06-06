<?php


if(!$_SESSION['admin'])
{
header('location :../login.php');

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style/style2.css">
    <title></title>
  </head>
  <body>
    <div class="container">


    <div class="h">


<h1>LISTES DES UTILISATEURS</h1>
  </div>
   <table class="table table-striped table-hover" border="1" cellpadding="10" cellspacing="1" width="100%">
       <tr>
           <th>ID</th>
           <th>NOM ET PRENOMS</th>
           <th>PRENOM</th>
           <th>EMAIL</th>
         <th>DATE D'INSCRIPTION</th>
         <th>EDITION</th>


       </tr>
       <?php
       $selectUser=$db->query('SELECT * FROM membres');
       if ($selectUser->rowCount()>0) {
       while ($m =$selectUser->fetch()) {
$getid=$m['id'];





        ?>
       <tr>
         <td><?=$m['id'] ?> </td>
         <td><?=$m['pseudo'] ?> </td>

         <td><?=$m['prenom'] ?></td>
         <td><?=$m['email'] ?></td>
         <td><?=$m['date'] ?></td>
<td>  <a href="index.php?page=modifierUsers&id=<?= $getid;?>">MODIFIER</a> &nbsp <a href="index.php?page=activerUser&id=<?= $getid;?>">ACTIVER</a> </td>
     <?php  } }?>


    </div>
  </body>
</html>
