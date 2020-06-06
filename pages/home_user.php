<?php
if (isset($_SESSION['id']) AND isset($_SESSION['classe'])) {
$sessionid=$_SESSION['id'];
$sessionclasse=$_SESSION['classe'];
$selectMatieres=$db->query("SELECT * FROM cours WHERE classe=$sessionclasse");




}





 ?>
<h1 align='center'> LES COURS DISPONIBLES</h1>
<?php while ($a=$selectMatieres->fetch()) {?>


<div class="row">
    <div class="col s12 m6 l3"><h4><?= $a['matiere'] ?></h4>

      <div class="card">

          <div class="card-content">
          </div>
          <div class="card-image waves-effect waves-block waves-light">
              <img src="images/<?= $a['image'] ?>" class="activator" alt=""/>
          </div>
          <div class="card-content">
              <span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span><?php // cette class dans span permettra d'afficher un apercu de l'image quand on cliquera sur l'image grce a activator //i class permettra d'afficher une icone pour voir plus  ?>
              <p><a href="index.php?page=terminale_d_francais">VOIR LE PROGRAMME</a></p>
          </div>
          <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"> <i class="material-icons right">close</i></span><?php // cest grace a la classe card-reveal qu'on pourra reveler le activator pour l'apercu ?>
              <p><?= substr(nl2br($a['programme']),0,1000); //on ajoute l'apercu du contenu du 0au 1000 caractère?>...</p>


    </div>    </div>    </div>
<?php
}
 ?>
