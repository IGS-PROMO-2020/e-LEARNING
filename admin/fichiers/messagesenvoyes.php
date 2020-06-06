<?php


 $selectSms=$db->query("SELECT * FROM  sms WHERE pseudo='admin' AND subject!='' ORDER BY DATE DESC");
 $selectNameUser=$db->query("SELECT * FROM membres ");
 $b = $selectNameUser->fetch();
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
header("Refresh 1,index.php?page=messagesenvoyes");


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

  });
  </script>



<a class="btn-floating btn-large waves-effect waves-light red" id="new"><i class="material-icons" id="new">add</i></a>



<table id='recu'>
  <h1 id="m">MESSAGES ENVOYES</h1>

        <thead>
          <tr>
             <th>Date d'expedition</th>
              <th>destinataire</th>
              <th>Email</th>
              <th>Message</th>
              <th>Subject</th>
              <th>Fil</th>

          </tr>
          </thead>
<?php
while ($a=$selectSms->fetch()) {
  $idclient=$a['destinataire'];
  $selectMembre=$db->query("SELECT * FROM  membres where id=$idclient");
$c=$selectMembre->fetch();
?>

        <tbody>
          <tr>
            <td><?= $a['date'] ?></td>
            <td><?= $c['nom'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $a['message'] ?></td>
            <td><?= $a['subject'] ?></td>
            <td><a href="index.php?page=messageenvoye&id=<?= $a['id']?>&pseudo=<?=$c['id'] ?>"> <i class="material-icons">email</i></a></td>

          </tr>
        </tbody>
        <?php
      }

       ?>
      </table>











<div class="container">
  <div class="row">
      <div class="col m10 offset-m1 s12">
          <div class="row">
              <form class="col m8 offset-m2 s12" method="post" id="sendmessage" >
                <h2 class="center-align">NEW MESSAGE</h2>

                  <div class="row">
                    <div class="input-field col s12">
                       <select name="membres">
                         <option value="" disabled selected>SELECT</option>
                         <?php while ($b=$selectNameUser->fetch()) {?>
                         <option value="<?=$b['id'] ?>"><?= $b['nom']?></option>
                         <?php
                       }
                       ?>
                       </select>
                       <label>DESTINATAIRE</label>
                     </div>
                      <div class="input-field col s12">
                          <input id="email" type="text" name=subject class="form-input">
                          <label for="email">Subject</label>
                      </div>
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
