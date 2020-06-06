<?php

if(!$_SESSION['admin'])
{
header('location :../login.php');
}
$afficheArticle= $db ->query('SELECT * FROM articles ORDER BY date_publication DESC');

 ?>





         <?php
     while ($a=$afficheArticle->fetch()) {

     ?>
      <div class="row">
           <div class="col s12">

               <h4><?= $a['titre'] ;?><?= ($a['status']  == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

               <div class="row">
                   <div class="col s12 m6 l8">
                       <?= substr(nl2br($a['contenu']),0,1200) ?>...
                   </div>
                   <div class="col s12 m6 l4">

                     <img src="../avatar/<?= $a["avatar"] ?>" class="materialboxed responsive-img" alt="<?= $a['titre'] ?>"/>
                       <br/><br/>
                       <a class="btn light-blue waves-effect waves-light" href="index.php?page=posts&id=<?=$a['id_articles'] ?>">Lire l'article complet</a>
                   </div>
               </div>
           </div>
       </div>
       <?php

          }
        ?>
  </body>
</html>
