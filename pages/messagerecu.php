<?php
if (isset($_SESSION['id']) AND isset($_GET['id'])) {
$sessionid=$_SESSION['id'];
$getid=$_GET['id'];

$selectMembre=$db->query("SELECT * FROM membres where id=$sessionid");
$afficheMembre=$selectMembre->fetch();
$selectIdUser=$db->query("SELECT destinataire FROM sms WHERE id=$getid ORDER BY DATE DESC");
$a=$selectIdUser->fetch();

$selectSms=$db->query("SELECT * FROM sms WHERE id=$getid ORDER BY DATE DESC");
$b=$selectSms->fetch();

$selectSmsRecu=$db->query("SELECT * FROM sms WHERE id_sms=$getid ORDER BY DATE DESC");

if(isset($_POST['send_message'])){
if (!empty($_POST['reponse'])) {
$reponse=htmlspecialchars($_POST['reponse']);
$pseudo=htmlspecialchars($afficheMembre['pseudo']);
$destinataire=htmlspecialchars("admin");
$error=[];
$query=$db->prepare("INSERT INTO sms(pseudo,message,date,destinataire,id_sms)
VALUES(?,?,NOW(),?,?)");
$query->execute(array($pseudo,$reponse,$destinataire,$getid));
header("Refresh:1;url=index.php?page=messagerecu&id=$getid");

echo '<div align="center" class="card green"><div class="card-content white-text">Message envoyé</div></div>';

}else {
  $errors="veuillez envoyez une reponse";
}

}




}else {
  header("location:index.php?page=login");
}

 ?>
<?php
if ($sessionid==$a['destinataire']) {
  if ($afficheMembre==$sessionid) {
    $afficheMembre['pseudo']=="Moi";
  }
?>
<div class="card">
<p align="center"><b>SUBJECT:<?= strtoupper($b['subject'])?></b><br><br>
<b> DATE D'ENVOI:<?= $b['date'] ?></b><br><br>

</div>
<b> Message: &nbsp <?=$b['message'] ?> </p></b>

<div class="" id="mr">
<?php while ($a=$selectSmsRecu->fetch()) {
  if ($a['pseudo']==$afficheMembre['pseudo']) {
  $j="MOI";
  $a['pseudo']=$j;

}
?>

<p><?= $a['date'] ?> &nbsp <?=$a['pseudo'] ?>: &nbsp <?=$a['message'] ?> </p>

<?php

}
?>


<div class="row">
   <form class="col s12" method="post">
     <div class="row">
       <div class="input-field col s12">
         <textarea id="reponse" class="materialize-textarea" name="reponse"></textarea>
         <label for="textarea1">Repondre</label>
       </div>
     </div>
 </div>
<div class="divider"></div>
<div class="row">
   <div class="col m12">
    <p class="Left-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="send_message">Send Message</button></p>
   </div>
</div>



</form>
</div>







<?php
}else {
header("location:index.php?page=messagesrecus");
}
 ?>
