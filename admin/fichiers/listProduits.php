<?php

if(!$_SESSION['admin'])
{
header('location :../login.php');
}
$afficheArticle= $db ->query('SELECT * FROM produits ORDER BY date_ajout DESC');

 ?>





         <?php
     while ($a=$afficheArticle->fetch()) {

     ?>
      <div class="row">
           <div class="col s12">

               <h4><?= $a['nom_articles'] ;?><?= ($a['statut']  == "0") ? "<i class='material-icons'>lock</i>" : "" ?></h4>

               <div class="row">
                   <div class="col s12 m6 l8">
                       <?= substr(($a['description_articles']),0,1200) ?>...
                   </div>
                   <div class="col s12 m6 l4">

                     <img src="../produits/<?= $a["avatar"] ?>" class="materialboxed responsive-img" alt="<?= $a["nom_articles"] ?>"/>
                       <br/><br/>
                       <a class="btn light-blue waves-effect waves-light" href="index.php?page=articles&id=<?=$a['id'] ?>">Voir le Produit</a>
                   </div>
               </div>
           </div>

       <?php

          }
        ?>
</div>
