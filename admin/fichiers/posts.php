<?php

if (isset($_GET['id'])) {
$getid=$_GET['id'];
$reps=$db->prepare('SELECT * from articles WHERE id_articles=?   ');
$reps->execute(array($getid));





}else {
  header('location:index.php?page=home');
}


 ?><?php
 while ($a=$reps->fetch()) {?>
 <form method="post">

<div class="col s12">
  <div class="card">

  <div class="row">
  
  <div class="card green">
    <div class="col s12 center-align">
        <img src="../avatar/<?php echo  $a['avatar']; ?>" width="350"><br><br>
    </div>

  <h5>ARTICLE <?= $a['id_articles'] ?><br> TITRE (<?= $a['titre'] ?>)<br> POSTER LE(<?= $a['date_publication'] ?>)</h5>
  </div>
       <div class="row">
           <div class="col s12 m6 l12">
               <?= (nl2br($a['contenu'])) ?>...
           </div>
           </div>

         <div class="col s12 center-align">
             <br/><br/>

    <i class="material-icons">edit</i>  <a href="index.php?page=modifierArticles&id=<?= $a['id_articles']  ?>">cliquez ici pour modifier l'article</a><br>
    <i class="material-icons">delete</i>  <a href="index.php?page=supprimerArticles&id=<?= $a['id_articles']  ?>" onclick=" return confirm('voulez vous vraiment supprimer cet utilisisateur');">cliquez ici pour supprimer l'article</a><br>

         </div>


     </div>



 </form>
<?php } ?>
