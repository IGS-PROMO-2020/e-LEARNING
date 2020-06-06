<?php
if (isset($_SESSION['id'])) {
$sessionid=$_SESSION['id'];
$selectInfoUser=$db->query("SELECT * FROM membres WHERE id=$sessionid");
$afficheUser=$selectInfoUser->fetch();


$select=$db->query("SELECT * FROM acteurs");

if(isset($_POST['send_message'])){
if(!empty($_POST['subject']) AND !empty($_POST['message'])){
$message=htmlspecialchars(trim($_POST['message']));
$subject=htmlspecialchars(trim($_POST['subject']));

$errors=[];
$validate=[];
$query=$db->prepare("INSERT INTO messages (subject,message,date,id_client)
VALUES(?,?,NOW(),?)") ;
$query->execute(array($subject,$message,$sessionid));
header('Refresh:5;url=index.php?page=messages');

echo '<div align="center" class="card green"><div class="card-content white-text">Message envoyé</div></div>';


}else {
  $errors="Veuillez remplir tout les champs";
}
}
}else {
  header("location:index.php?page=login");
}

 ?>
<script type="text/javascript">
$(document).ready(function(){
    $('#send').hide();

    $('#new').click(function(){
    $('#send').fadeIn();
    $('#messageEnvoyes').fadeOut();

});
      $('#new').dblclick(function(){
        $('#send').fadeOut();
        $('#messageEnvoyes').fadeIn();

});
$('#envoi').click(function(){
  $('#messageEnvoyes').fadeIn();
  $('#send').fadeOut();

});
});
</script>
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

<?php  if (!empty($validate)):?>
  <div class="card green">
      <div class="card-content white-text">
           <ul>
              <li><?= $validate; ?></li>
          </ul>
    </div>
  </div>
  </div>
<?php endif; ?>
 <a class="waves-effect waves-light btn" id="envoi"><i class="material-icons left" id="envoi">email</i>boite d'envoi</a>
<a class="waves-effect waves-light btn" href="index.php?page=messagesrecus"><i class="material-icons left" id="reception">message</i>boite de reception</a>
<a class="btn-floating btn-large waves-effect waves-light red" id="new"><i class="material-icons" id="new">add</i></a>
<div class="container">
    <div class="row">
        <div class="col m10 offset-m1 s12">
            <div class="row">
                <form class="col m8 offset-m2 s12" method="post" id="send" >
                  <h2 class="center-align">NEW MESSAGE</h2>

                    <div class="row">

                        <div class="input-field col s12">
                            <input id="email" type="text" name=subject class="form-input">
                            <label for="email">Subject</label>
                        </div>
                        <div class="row">

                        <div class="input-field col s12">
                          <textarea id="message" class="materialize-textarea" name='message'></textarea>
                          <label for="message">Message</label>
                        </div>
                    </div>

                    <div class="divider"></div>
                    <div class="row">
                        <div class="col m12">
                         <p class="right-align"><button class="btn btn-large waves-effect waves-light" type="submit" name="send_message">Send Message</button></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="" id="messageEnvoyes">
<h5>MESSAGES ENVOYES</h5>
<table class="centered">
        <thead>
          <tr>
             <th>Date</th>
              <th>Subject</th>
              <th>Message</th>
              <th>Reponse</th>

          </tr>
        </thead>
<?php
$selectMessage=$db->query("SELECT * FROM messages WHERE id_client=$sessionid");
while ($a=$selectMessage->fetch()) {

 ?>
         <tbody>
           <tr>
             <td><?= $a['date'] ?></td>
             <td><?= $a['subject'] ?></td>
             <td><?= substr(nl2br($a['message']),0,50);?></td>
             <?php
             $idmessage=$a['id_message'];
             $selectReponse=$db->query("SELECT * FROM reponses WHERE id_message=$idmessage AND pseudo='admin'");
             if ($selectReponse->rowCount()>0) {
              ?>
             <td><a href="index.php?page=seeAnswer&id=<?= $idmessage?>"> <i class="material-icons red">mail</i></a></td>
            <?php
          }else {
            ?>
            <td><a href="index.php?page=seeAnswer&id=<?= $idmessage?>"> <i class="material-icons">mail_outline</i></a></td>
            <?php
          }
            ?>
           </tr>

         </tbody>
         <?php
         }
          ?>
       </table>

</div>
