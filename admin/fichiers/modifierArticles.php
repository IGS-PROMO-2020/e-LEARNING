<?php
if(!$_SESSION['admin'])
{
  header('location:../login.php');
}
if (isset($_GET['id'])) {
  $getid=$_GET['id'];
$reqmodif=$db->prepare('SELECT * FROM articles WHERE id_articles=?');
$reqmodif->execute(array($getid));
$userinfo=$reqmodif->fetch();


}
if (isset($_POST['modifier'])) {

   $newpublic = isset($_POST['newpublic']) ? "1" : "0";
    $insertnewtitre=$db->prepare("UPDATE articles SET status=? where id_articles=?");
    $insertnewtitre->execute(array($newpublic,$getid));


    header("Location:index.php?page=posts&id=$getid");




  if (isset($_POST['newsubtilte']) AND !empty($_POST['newsubtilte']) AND $_POST['newsubtitle'] != $userinfo['subtitle']){
    $subtitle=htmlspecialchars($_POST['newsubtilte']);
    $insertnewtitre=$db->prepare("UPDATE articles SET subtitle=? where id_articles=?");
    $insertnewtitre->execute(array($subtitle,$getid));


    header("Location:index.php?page=posts&id=$getid");


  }

if (isset($_POST['newtitre']) AND !empty($_POST['newtitre']) AND $_POST['newtitre'] != $userinfo['titre']){
  $newtitre=htmlspecialchars($_POST['newtitre']);
  $insertnewtitre=$db->prepare("UPDATE articles SET titre=? where id_articles=?");
  $insertnewtitre->execute(array($newtitre,$getid));


  header("Location:index.php?page=posts&id=$getid");


}

if (isset($_POST['newcontenu']) AND !empty($_POST['newcontenu']) AND $_POST['contenu'] != $userinfo['contenu']){
  $newcontenu=htmlspecialchars($_POST['newcontenu']);
  $insertnewcontenu=$db->prepare("UPDATE articles SET contenu=? where id_articles=?");
  $insertnewcontenu->execute(array($newcontenu,$getid));

  header("Location:index.php?page=posts&id=$getid");
}

if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
$taillemax=9097152;
$extensinsValides=array('.jpg','.jpeg','.gif','.png');
$file_name=$_FILES['miniature']['name']; // enregistre dans la variable $file_name le nom du fichier

if($_FILES['miniature']['size']<=$taillemax){
$file_extension= strrchr($file_name,".");// en registre dans la variable $file_extension l'extension du fichier ce qui permettre d'etablier les restrictions par rapport au ty pe dex fichier qu'on veux strrchr permettra d'enregister dans la variablle le type de fichier
$chemin="avatar/".$titre.$file_name."." .$file_extension;
$extensions_autorisees =array('.jpg' , '.JPG'  , '.JPEG');// enregistre dans la variable $extensions_autorisees a partir du tableau array les extensions autoriséelse
if(in_array($file_extension,$extensinsValides))   //
{
  $resultat=move_uploaded_file($_FILES ['miniature']['tmp_name'],"../avatar/".$getid.$file_name."." .$file_extension);
$avatar=$titre.$file_name."." .$file_extension;



$insertArticle = $db ->prepare('UPDATE articles SET avatar = :avatar WHERE id_articles =:id');
$insertArticle->  execute(array('avatar'=>$getid.$file_name.".".$file_extension,'id'=> $getid));

header("Location:index.php?page=posts&id=$getid");


}else {
  $error="Erreur lors de l'upload de l'image Reessayer /Si le problème persiste contactez L'admin";

}
}else {
  $error="Taille de l'image trop volumineuse";

}
}else {
  $error="Veuillez selectionner une image";
}


}
 ?>


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

           <h3>MODIFIER ARTICLE</h3>
       <form class="" method="post" enctype="multipart/form-data">
       	<div class="input-field col s12">
       		<label for="titre">TITRE DE L'ARTICLE</label>
       		<br>
       	</div>

        <div class="input-field col s12 m6 l8">
       		<input type="text" name="newtitre" value="<?=$userinfo['titre'] ?>">
       		<br>
       		<br>
       	</div>

        <div class="input-field col s12">
       		<label for="titre">SUBTITLE</label>
       		<br>
       	</div>
       	<div class="input-field col s12 m6 l8">
       		<input type="text" name="newsubtitle" value="<?=$userinfo['subtitle'] ?>">
       		<br>
       		<br>
       	</div>
       	<label for="contenu">CONTENU DE L'ARTICLE</label>
       	<br>
       	<textarea name="newcontenu" class="materialize-textarea" value=""><?=$userinfo['contenu'] ?></textarea>
       	<br>
       	<br>
       	<div class="col s12">
       		<div class="btn col s2">
       			<span>Image de l'article</span>
       			<input type="file" name="miniature" class="col s12"/>
       		</div>
       		<div class="col s6">
       			<p>
       				Public
       			</p>
       			<div class="switch">
       				<label>Non<input type="checkbox" name="newpublic" <?php echo ($userinfo['status'] == "1")?"checked" : "" ?>/>
                <span class="lever"></span>Oui</label>
       			</div>
       		</div>
       		<div class="col s6 right-align">
       			<input type="submit" name="modifier" value="modifier">
       		</div>
       	</form>
       </div>
