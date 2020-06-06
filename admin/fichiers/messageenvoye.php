<?php
if(isset($_GET["id"]) AND isset($_GET['pseudo']) ){
$getid=$_GET['id'];
$getpseudo=$_GET['pseudo'];
$selectMessageRecu=$db->query("SELECT * FROM sms WHERE id_sms=$getid ORDER BY date ASC" );
$selectMessageTitle=$db->query("SELECT * FROM sms WHERE id=$getid ORDER BY date ASC" );
$afficheMessageTitle=$selectMessageTitle->fetch();
$c=$afficheMessageTitle;
if(isset($_POST['send_message'])){
if (!empty($_POST['reponse'])) {
$reponse=htmlspecialchars($_POST['reponse']);
$pseudo=htmlspecialchars("admin");
$error=[];
$query=$db->prepare("INSERT INTO sms(pseudo,message,date,destinataire,id_sms)
VALUES(?,?,NOW(),?,?)");
$query->execute(array($pseudo,$reponse,$getpseudo,$getid));
header("Refresh:1;url=index.php?page=messageenvoye&id=$getid&pseudo=$getpseudo");

echo '<div align="center" class="card green"><div class="card-content white-text">Message envoyé</div></div>';

}else {
  $errors="veuillez envoyez une reponse";
}

}
}else {
  header("location:index.php?page=messagesenvoyes");
}
 ?>
 <div class="card">
 <p align="center"><b>SUBJECT:<?= strtoupper($c['subject'])?></b><br><br>
 <b> DATE D'ENVOI:<?= $c['date'] ?></b><br></p>
 </div>
 <div class="" id="mr">

<?php while ($a=$selectMessageRecu->fetch()) {
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
