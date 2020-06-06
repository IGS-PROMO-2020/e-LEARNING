<?php


if(!$_SESSION['mdp'])
{
header('location :../admin.php');
}
if (isset($_GET['id'])) {
  $getid=$_GET['id'];
  $afficheArticle = $db ->prepare('SELECT * FROM articles WHERE id_articles=?');
  $afficheArticle->execute(array($getid));
}

 ?>



     <?php
 while ($a=$afficheArticle->fetch()) {

 ?>
 <h1 class="alert alert-success">ARTICLE <?= $a['id_articles'] ;?> PUBLIE LE <?= $a['date_publication'] ;?></h1>

<ul>
  <h3>TITRE</h3>
<li><?= $a['titre']; ?></li><br>
<h3>CONTENU</h3>
<li><?= $a['contenu']; ?></li><br>
<br>
<img src="../titre/avatar/<?php echo  $a['avatar']; ?>" width="150"><br><br>
<a href="modifierArticles.php.?id=<?= $a['id_articles']  ?>">cliquez ici pour le modifier</a><br>
<a href="supprimerArticles.php.?id=<?=$a['id_articles']  ?>" onclick=" return confirm('voulez vous vraiment supprimer cet articles');">cliquez ici pour le supprimer</a>

</ul>
<a href="../blog.php.?id=<?= $a['id_articles']  ?>">cliquez ici pour l'envoyer sur le blog</a><br>


 <?php

 }
      ?>
        </table>
