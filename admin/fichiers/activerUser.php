<?php
if (isset($_GET['id'])  ){
 $getid=$_GET['id'];
 $requser=$db->prepare('SELECT * FROM membres WHERE id =?');
 $requser->execute(array($getid));
 $userinfo=$requser->fetch();
}
if (isset($_POST['modifier'])) {

   $newpublic = isset($_POST['newpublic']) ? "1" : "0";
    $insertnewtitre=$db->prepare("UPDATE membres SET statut_user=? where id=?");
    $insertnewtitre->execute(array($newpublic,$getid));


}
 ?>

<form class="" action="" method="post">



<div class="col s6">
  <p>
  ACTIVER
  </p>
  <div class="switch">
    <label>Non<input type="checkbox" name="newpublic" <?php echo ($userinfo['statut_user'] == "1")?"checked" : "" ?>/>
      <span class="lever"></span>Oui</label>
  </div>
</div>
<div class="col s6 right-align">
  <input type="submit" name="modifier" value="modifier">
</div>
</form>
