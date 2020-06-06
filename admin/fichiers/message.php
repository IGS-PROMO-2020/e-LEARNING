<?php
if(isset($_SESSION['admin'])){
$id=$_GET['id'];

$selectMessage=$db->query("SELECT * FROM messages WHERE id_message=$id");
$a=$selectMessage->fetch();
$idclient=$a['id_client'];
$selectReponse=$db->query("SELECT * FROM reponses WHERE id_message=$id ORDER BY DATE ASC");

$selectNameUser=$db->query("SELECT messages.id_client, membres.id ,membres.nom,membres.avatar, membres.prenom, membres.pseudo FROM messages JOIN membres
ON messages.id_client=membres.id ");
$d=$selectNameUser->fetch();

$selectMembre=$db->query("SELECT * FROM  membres where id=$idclient");
$c=$selectMembre->fetch();



}else {
  header('location:index.php?page=login');
}



if(isset($_POST['send_message'])){
if (!empty($_POST['reponse'])) {
$reponse=htmlspecialchars($_POST['reponse']);
$pseudo=htmlspecialchars(trim($_SESSION['admin']));
$error=[];
$query=$db->prepare("INSERT INTO reponses(reponse,pseudo,date,id_message)
VALUES(?,?,NOW(),?)");
$query->execute(array($reponse,$pseudo,$id));
header("Refresh:5;url=index.php?page=message&id=$id");

echo '<div align="center" class="card green"><div class="card-content white-text">Message envoyé</div></div>';

}else {
  $errors="veuillez envoyez une reponse";
}

}
 ?>
 <?php  if (!empty($errors)):?>
   <div class="card red">
       <div class="card-content white-text">
         <p>vous n'avez pas rempli le formulaire correctement</p><br>
            <ul>
               <li><?= $errors; ?></li>
           </ul>
     </div>
   </div>
   </div>
 <?php endif; ?>
<?php



 ?>
     <div class="row">
       <div class="">
         <img src="../avatar/<?= $c['avatar'] ?>" class="circle responsive-img" alt="avatar" align="left" width="80"/>
       </div><br><br><br>
         <p><B>DATE:</B> &nbsp <?= strtoupper( $a['date']) ?><br>
         <br><b>EXPEDITEUR: </b> &nbsp <?= strtoupper($c['nom']) ?> <?=strtoupper( $c['prenom'])?><br>
         <br> <b>SUJET:</b> <?= strtoupper($a ['subject']) ?> &nbsp <br>
         <br><b>MESSAGE:</b> &nbsp <?= strtoupper(nl2br($a["message"])) ?></p>
<hr>
     <?php while ($d=$selectReponse->fetch()) {
       if ($d['pseudo']=="admin") {
         $d['pseudo']="MOI";
       }
       ?>
       <p><b><?= $d['date'] ?> &nbsp <?= $d['pseudo'] ?> :</b>  &nbsp <?= strtoupper($d["reponse"]) ?></p>
     <?php
     } ?>
     </div>
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


 </div>
</form>
