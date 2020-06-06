<?php
if(!$_SESSION['admin'])
{
  header('location:../login.php');
}
if (isset($_POST['add'])) {
if (!empty($_POST['nom']) AND !empty($_POST['description']) ) {
  $nom=htmlspecialchars($_POST['nom']);
  $prix=htmlspecialchars($_POST['prix']);
  $posted = isset($_POST['public']) ? "1" : "0";// si $_post est public il vaut 1 sinon il vaut 0 donc sera privée
  $description=htmlspecialchars($_POST['description']);
  $id = $db->lastInsertId();


if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
$taillemax=9097152;
$extensinsValides=array('.jpg','.jpeg','.gif','.png');
$file_name=$_FILES['miniature']['name']; // enregistre dans la variable $file_name le nom du fichier

if($_FILES['miniature']['size']<=$taillemax){
$file_extension= strrchr($file_name,".");// en registre dans la variable $file_extension l'extension du fichier ce qui permettre d'etablier les restrictions par rapport au ty pe dex fichier qu'on veux strrchr permettra d'enregister dans la variablle le type de fichier
$chemin="../produits/".$id.$file_name;
$extensions_autorisees =array('.jpg' , '.JPG'  , '.JPEG');// enregistre dans la variable $extensions_autorisees a partir du tableau array les extensions autoriséelse
if(in_array($file_extension,$extensinsValides))   //
{
  $resultat=move_uploaded_file($_FILES ['miniature']['tmp_name'],"../produits/".$id.$file_name);
$avatar=$id.$file_name;




  $insertArticle = $db ->prepare('INSERT INTO produits (nom_articles,prix_articles,description_articles,statut,date_ajout,avatar)
  VALUES(?,?,?,?,NOW(),?)');
  $insertArticle->execute(array($nom,$prix,$description,$posted,$avatar));
 $message="votre article a bien été enregistrer ";
 header('Refresh:1;url=index.php?page=ajoutArticles');
 echo '<div align="center" class="card green"><div class="card-content white-text">Vous allez etre rediriger vers la page d"affichage des articles</div></div>';

}else {
  $error="erreur lors de l'exportation du fichier";
}
}
}else {
  $error="veuillez ajouter une image";

}
}else {
  $error="veuillez remplir tout les champs";
}
}
 ?>


  <body>
    <div class="container">

    <?php  if (!empty($error)):?>
      <div class="card red">
          <div class="card-content white-text">
            <p>vous n'avez pas rempli le formulaire correctement</p><br>
               <ul>
                  <li><?= $error; ?></li>
              </ul>
        </div>
        </div>
    <?php endif; ?>

    <?php  if (!empty($message)):?>
      <div class="card green">
          <div class="card-content white-text">
            <p>FELICITATIONS</p><br>
               <ul>
                  <li><i class="material-icons">done</i><?= $message; ?></li>
              </ul>
        </div>
        </div>
    <?php endif; ?>
  <h3>AJOUTER UN ARTICLE</h3>
  <form class="" method="post" enctype="multipart/form-data">


  <div class="input-field col s12">


    <label for="nom">NOM PRODUIT</label><br>
  </div>

    <div class="input-field col s12 m6 l8">
    <input type="text" name="nom" value=""><br><br>
    </div>
    <div class="input-field col s12">


      <label for="prix">Prix</label><br>
    </div>

      <div class="input-field col s12 m6 l8">
      <input type="text" name="prix" value=""><br><br>
      </div>
    <label for="contenu">Descrition Produit</label><br>
    <textarea name="description" class="materialize-textarea"></textarea><br><br>

    <div class="col s12">
            <div class="btn col s2">
                <span>Image Produit</span>
                <input type="file" name="miniature" class="col s12"/>


    </div>
    <div class="col s6">
        <p>Public</p>
        <div class="switch">
            <label>
                Non
                <input type="checkbox" name="public"/>
                <span class="lever"></span>
                Oui
            </label>
        </div>
    </div>

  <div class="col s6 right-align">
    <input type="submit" name="add" value="ajouter">


    </div>

  </form>




  </div>
  </body>
</html>
