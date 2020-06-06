<?php
if(!$_SESSION['admin'])
{
  header('location:../login.php');
}
$selectClasse=$db->query("SELECT * FROM classes");
$b=$selectClasse->fetch();
if (isset($_POST['add'])) {
  $matiere=htmlspecialchars($_POST['matiere']);
  $classe=htmlspecialchars($_POST['classe']);
  $posted = isset($_POST['public']) ? "1" : "0";// si $_post est public il vaut 1 sinon il vaut 0 donc sera privée
  $formateur=htmlspecialchars($_POST['formateur']);
  $id = $db->lastInsertId();
  $programme=htmlspecialchars($_POST['contenu']);


if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
$taillemax=9097152;
$extensinsValides=array('.jpg','.jpeg','.gif','.png');
$file_name=$_FILES['miniature']['name']; // enregistre dans la variable $file_name le nom du fichier

if($_FILES['miniature']['size']<=$taillemax){
$file_extension= strrchr($file_name,".");// en registre dans la variable $file_extension l'extension du fichier ce qui permettre d'etablier les restrictions par rapport au ty pe dex fichier qu'on veux strrchr permettra d'enregister dans la variablle le type de fichier
$chemin="../images/".$id.$file_name."." .$file_extension;
$extensions_autorisees =array('.jpg' , '.JPG'  , '.JPEG');// enregistre dans la variable $extensions_autorisees a partir du tableau array les extensions autoriséelse
if(in_array($file_extension,$extensinsValides))   //
{
  $resultat=move_uploaded_file($_FILES ['miniature']['tmp_name'],"../images/".$id.$file_name.$file_extension);
$avatar=$id.$file_name.$file_extension;




  $insertArticle = $db ->prepare('INSERT INTO cours (matiere,classe,formateur,programme,image,statut,date)
  VALUES(?,?,?,?,?,?,NOW())');
  $insertArticle->execute(array($matiere,$classe,$formateur,$programme,$avatar,$posted));
 $message="COURS A BIEN ETE ENREGISTRER";

}else {
  $error="erreur lors de l'exportation du fichier";
}
}
}else {
  $error="veuillez ajouter une image";

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
  <h3>AJOUTER LES COURS DISPONIBLES PAR CLASSE</h3>
  <form class="" method="post" enctype="multipart/form-data">


  <div class="input-field col s12">
    <label for="titre">MATIERE</label><br>
    <div class="input-field col s12 m6 l8">
    <input type="text" name="matiere" value=""><br><br>
    </div>
  </div><br><br>
  <div class="input-field col s12">
     <select name="classe">
       <option value="" disabled selected>SELECT</option>
       <?php while ($b=$selectClasse->fetch()) {?>
       <option value="<?=$b['id'] ?>"><?= $b['classe']?></option>
       <?php
     }
     ?>
     </select>

   </div>

    <div class="input-field col s12 m6 l8">
    <input type="text" name="formateur" value=""><br><br>
    </div>
    <div class="input-field col s12">


      <label for="titre">FORMATEUR</label><br>
    </div>

      <div class="input-field col s12 m6 l8">
      <input type="text" name="programme" value=""><br><br>
      </div>
    <label for="contenu">PROGRAMME</label><br>
    <textarea name="contenu" class="materialize-textarea"></textarea><br><br>

    <div class="col s12">
            <div class="btn col s2">
              <i class="material-icons">add_a_photo</i>
                <span>Image du Cours</span>
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
