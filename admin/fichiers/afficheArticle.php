<?php
session_start();
include("../includes/db.php");

if(!$_SESSION['admin'])
{
header('location :../admin.php');
}
$afficheArticle= $db ->query('SELECT * FROM articles ORDER BY date_publication');

 ?>




  <body>
<div class="container">

<div class="">


    <h1>TITRES DES ARTICLES</h1>
    <p>CLIQUEZ SUR LE TITRE POUR AFFICHER SON CONTENU</p>
    <table border="1" cellpadding="10" cellspacing="1" width="30%">
      <tr>
      <th>TITRE</th>
      <th>DATE DE PUBLICATION</th>
    </tr>
    <?php
while ($a=$afficheArticle->fetch()) {
?>
<tr>

<td><a href="afficheArticle1.php.?id=<?= ($a['id_articles'])  ?>">  <?= $a['titre']; ?></a></td>
<td> <?= $a['date_publication']; ?></td>
</tr>
<?php

}
     ?>
       </table>
       </div>
       </div>
  </body>
</html>
