<?php
if(isset($_SESSION['id'])){
$sessionid=$_SESSION['id'];

$selectInfoUser=$db->query("SELECT * FROM membres WHERE id=$sessionid");
$userinfo=$selectInfoUser->fetch();
if (isset($_POST['modifier'])) {



  if (isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $userinfo['nom']){
    $newname=htmlspecialchars(trim($_POST['newname']));
    $insertnewname=$db->prepare("UPDATE membres SET nom=? where id=?");
    $insertnewname->execute(array($newname,$sessionid));


    header("Location:index.php?page=edit");


  }

  if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo']){
    $newpseudo=htmlspecialchars(trim($_POST['newpseudo']));
    $insertnewpseudo=$db->prepare("UPDATE membres SET pseudo=? where id=?");
    $insertnewpseudo->execute(array($newpseudo,$sessionid));


    header("Location:index.php?page=edit");


  }
  if (isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $userinfo['email']){
    $newemail=htmlspecialchars(trim($_POST['newemail']));
    $insertnewtitre=$db->prepare("UPDATE membres SET email=? where id=?");
    $insertnewtitre->execute(array($newemail,$sessionid));


    header("Location:index.php?page=edit");


  }
  if (isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND $_POST['newpassword'] != $userinfo['password']){
    $newpasswort=(sha1($_POST['newpassword']));
    $insertnewtitre=$db->prepare("UPDATE membres SET password=? where id=?");
    $insertnewtitre->execute(array($newpassword,$sessionid));


    header("Location:index.php?page=edit");


  }
if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
$taillemax=9097152;
$extensinsValides=array('.jpg','.jpeg','.gif','.png');
$file_name=$_FILES['miniature']['name']; // enregistre dans la variable $file_name le nom du fichier

if($_FILES['miniature']['size']<=$taillemax){
$file_extension= strrchr($file_name,".");// en registre dans la variable $file_extension l'extension du fichier ce qui permettre d'etablier les restrictions par rapport au ty pe dex fichier qu'on veux strrchr permettra d'enregister dans la variablle le type de fichier
$chemin="avatar/".$sessionid.$file_name.$file_extension;
$extensions_autorisees =array('.jpg' , '.JPG'  , '.JPEG');// enregistre dans la variable $extensions_autorisees a partir du tableau array les extensions autoriséelse
if(in_array($file_extension,$extensinsValides))   //
{
  $resultat=move_uploaded_file($_FILES ['miniature']['tmp_name'],"images/".$sessionid.$file_name.$file_extension);
$avatar=$sessionid.$file_name."." .$file_extension;



$insertArticle = $db ->prepare('UPDATE membres SET avatar = :avatar WHERE id =:id');
$insertArticle->  execute(array('avatar'=>$sessionid.$file_name.$file_extension,'id'=> $sessionid));

header("Location:index.php?page=edit");


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

           <div class="container" >
             <div class="head">
               <h1>bonjour <?= $userinfo['nom'] ?></h1>
               <h5>modifier vos informations en les remplacants</h5>
            </div>

       <form class="" action="#" method="post" enctype="multipart/form-data">
<div class="avatar">


         <div class="row valign-wrapper">
           <div class="col s4 center">
             <img src="images/<?= $userinfo['avatar'] ?>" class="circle responsive-img" alt="avatar" align="center"/>
           </div>
</div>
       </div>
       <i class="material-icons right">edit</i>
       <label for="">NOM</label>
       <input type="text" name="newname" placeholder="nom" value="<?php echo $userinfo['nom']; ?>"><br><br>
       <i class="material-icons right">edit</i>
       <label for="">Pseudo</label>
       <input type="text" name="newpseudo" placeholder="pseudo" value="<?php echo $userinfo['pseudo']; ?>"><br><br>
       <i class="material-icons right">edit</i>
       <label for="">EMAIL</label>
       <input type="text" name="newemail" placeholder="email" value="<?php echo $userinfo['email']; ?>"><br><br>
       <i class="material-icons right">edit</i>
       <label for="">PASSWORD</label>
       <input type="password" name="newpassword" placeholder="password"><br><br>
       <i class="material-icons right">edit</i>
       <label for="">COMFIRMATION PASSWORD</label>
       <input type="password" name="newpassword2" placeholder="comfirmer password"><br><br>

      <input type="file" name="miniature" class="col s12"/>


      <p> <input type="submit" name="modifier" value="mettre a jour mon profil"></p>

       </form>
