<?php

if(!$_SESSION['admin'])
{
  header('location:../login.php');

}
if (isset($_GET['id'])  ){
 $getid=$_GET['id'];
 $requser=$db->prepare('SELECT * FROM membres WHERE id =?');
 $requser->execute(array($getid));
 $userinfo=$requser->fetch();
}

 if (isset($_POST['newemail']) AND !empty($_POST['newemail']) AND $_POST['newemail'] != $userinfo['email']){
   $newemail=htmlspecialchars($_POST['newemail']);
   $insertemail=$db->prepare("UPDATE membres SET email=? where id=?");
   $insertemail->execute(array($newemail,$getid));

   header("Location:index.php?page=listUsers&id=".$getid);


 }
 if (isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userinfo['prenom']){
   $newprenom=htmlspecialchars($_POST['newprenom']);
   $insertprenom=$db->prepare("UPDATE membres SET prenom=? where id=?");
   $insertprenom->execute(array($newprenom,$getid));

   header("Location:index.php?page=listUsers&id=".$getid);


}

 if (isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['pseudo']){
   $newname=htmlspecialchars($_POST['newname']);
   $insertname=$db->prepare("UPDATE membres SET pseudo=? where id=?");
   $insertname->execute(array($newname,$getid));


   header("Location:index.php?page=listUsers&id=".$getid);

 }

  if (isset($_POST['newpassword']) AND !empty($_POST['newpassword']) AND  isset($_POST['newpassword2']) AND !empty($_POST['newpassword2'])){
$newpassword=sha1($_POST['newpassword']);
$newpassword2=sha1($_POST['newpassword2']);

if ($password==$password2) {
 $insertpassword=$db->prepare("UPDATE membresSET password=? where id=?");
 $insertpassword->execute(array($newpassword,$getid));
 header("Location:index.php?page=listUsers&id=".$getid);
}else{
  echo"vos deux mot de passes ne correspondent pas";
  exit();
}
}


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <div class="" align="left">
 <h2>EDITION DU PROFIL</h2>
 <form class="" action="#" method="post" enctype="multipart/form-data">


 <label for="">NOM</label>
 <input type="text" name="newname" placeholder="nom" value="<?php echo $userinfo['pseudo']; ?>"><br><br>
 <label for="">Prenom</label>
 <input type="text" name="newprenom" placeholder="prenom" value="<?php echo $userinfo['prenom']; ?>"><br><br>
 <label for="">EMAIL</label>
 <input type="text" name="newemail" placeholder="email" value="<?php echo $userinfo['email']; ?>"><br><br>
 <label for="">PASSWORD</label>
 <input type="password" name="newpassword" placeholder="password"><br><br>
 <label for="">COMFIRMATION PASSWORD</label>
 <input type="password" name="newpassword2" placeholder="comfirmer password"><br><br>
 <input type="submit" name="" value="mettre a jour mon profil">

 </form>



   </body>
 </html>
