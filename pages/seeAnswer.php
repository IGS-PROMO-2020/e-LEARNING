<?php
if (isset($_GET['id']) AND isset($_SESSION['id'])) {
  $sessionid=$_SESSION['id'];
  $getid=$_GET['id'];
  $selectMembre=$db->query("SELECT * FROM membres WHERE id=$sessionid" );
  $afficheMembre=$selectMembre->fetch();
  if(isset($_POST['send_message'])){
  if (!empty($_POST['reponse'])) {
  $reponse=htmlspecialchars($_POST['reponse']);
  $pseudo=htmlspecialchars($afficheMembre['pseudo']);
  $error=[];
  $query=$db->prepare("INSERT INTO reponses(reponse,pseudo,date,id_message)
  VALUES(?,?,NOW(),?)");
  $query->execute(array($reponse,$pseudo,$getid));
  header("Refresh:1;url=index.php?page=seeAnswer&id=$getid");

  }else {
    $errors="veuillez envoyez une reponse";
  }

  }
  }else {
    header("location:index.php?page=login");
  }

$selectMessage=$db->query("SELECT * FROM messages WHERE id_message=$getid AND id_client=$sessionid");
$b=$selectMessage->fetch();

$selectReponse=$db->query("SELECT * FROM reponses WHERE id_message=$getid ORDER BY DATE DESC LIMIT 0,10");
$selectReponseAdmin=$db->query("SELECT * FROM reponses WHERE id_message=$getid AND pseudo='admin' ");

?>
<?php
if($b['id_client']==$sessionid){
 ?>
<div class="card ">

<p><b>SUBJECT:<?= strtoupper($b['subject'])?></b><br><br>
<b> DATE D'ENVOI:<?= $b['date'] ?></b><br></p>
<p><b>MESSAGE:&nbsp</b><?=nl2br($b['message'] )?></p>
<?php

if ($selectReponse->rowCount()>0) {
while ($a=$selectReponse->fetch()) {
if ($a['pseudo']==$afficheMembre['pseudo']) {
  $a['pseudo']="MOI";?>
  <p><b><?= $a['date'] ?> &nbsp <?= $a['pseudo'] ?> : &nbsp </b> <?= nl2br($a["reponse"])  ?></p>
<?php
}else {?>
  <p> <?=  date("d/m/Y", strtotime($a['date'])) ?> &nbsp <?= $a['pseudo'] ?> : &nbsp <?= nl2br($a["reponse"]) ?></p>
<?php
}
?>
<?php
}
}else {
  echo "<br><h4>AUCUNE REPONSE POUR L'INSTANT</h4>";
}
 ?>


 <div class="row">
     <form class="col s12" method="post">
       <div class="row">
         <div class="input-field col s12">
           <textarea id="reponse" class="materialize-textarea" name="reponse"></textarea>
           <label for="textarea1">Nouveau Message</label>
         </div>
       </div>
   </div>
 <div class="row">
     <div class="col m12">
      <p class="Left-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="send_message">Send Message</button></p>
     </div>
 </div>


 </div>
 </form>
<?php
}else {
  header("location:index.php?page=messages");
}
 ?>
