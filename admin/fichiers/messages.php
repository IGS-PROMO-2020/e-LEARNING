<?php


$selectMessage=$db->query("SELECT * FROM  messages ORDER BY date DESC LIMIT 20");
$selectNameUser=$db->query("SELECT  membres.id ,membres.nom,membres.prenom, membres.pseudo FROM membres JOIN messages
ON messages.id_client=membres.id ORDER BY id DESC ");
$b=$selectNameUser->fetch();

if(isset($_POST['send_message'])){
if(!empty($_POST['subject']) AND !empty($_POST['message'])){
$message=htmlspecialchars(trim($_POST['message']));
$subject=htmlspecialchars(trim($_POST['subject']));
$destinataire=htmlspecialchars($_POST['membres']);
$pseudo=htmlspecialchars(trim($_SESSION['admin']));
$errors=[];
$validate=[];
$query=$db->prepare("INSERT INTO sms (pseudo,subject,message,date,destinataire)
VALUES(?,?,?,NOW(),?)") ;
$query->execute(array($pseudo,$subject,$message,$destinataire));



}else {
  $errors="Veuillez remplir tout les champs";
}
}

 ?>
 <script type="text/javascript">
 $(document).ready(function(){
     $('#sendmessage').hide();

     $('#new').click(function(){
     $('#sendmessage').fadeIn();
     $('#recu').fadeOut();
     $('#m').fadeOut();

 });
       $('#new').dblclick(function(){
         $('#sendmessage').fadeOut();
         $('#recu').fadeIn();
         $('#m').fadeIn(3200);

 });
 $('#envoi').click(function(){
   $('#messageEnvoyes').fadeIn();
   $('#sendmessage').fadeOut();
   $('#m').fadeIn();

 });
 });
 </script>

 <a class="waves-effect waves-light btn" id="envoi" href="index.php?page=messagesenvoyes"><i class="material-icons left" id="envoi">email</i>boite d'envoi</a>
  <table id='recu'>
    <h1 id="m">MESSAGES RECUS</h1>

          <thead>
            <tr>
               <th>Date d'expedition</th>
                <th>Nom de l'expediteur</th>
                <th>sujet</th>
                <th>Message</th>
                <th>Fil</th>

            </tr>
            </thead>
<?php
while ($a = $selectMessage->fetch()) {
  $idclient=$a['id_client'];
  $selectMembre=$db->query("SELECT * FROM  membres where id=$idclient");
$c=$selectMembre->fetch();
  ?>

          <tbody>
            <tr>
              <td><?= $a['date'] ?></td>
              <td><?= $c['nom'] ?></td>
              <td><?= $a['subject'] ?></td>
              <td><?= substr(nl2br($a['message']),0,40) ?>...</td>
              <td><a href="index.php?page=message&id=<?= $a['id_message']?>"> <i class="material-icons">email</i></a></td>

            </tr>
          </tbody>
          <?php
        }

         ?>
        </table>
