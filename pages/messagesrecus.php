<?php
if (isset($_SESSION['id'])) {
$sessionid=$_SESSION['id'];
$selectSms=$db->query("SELECT * FROM sms WHERE destinataire=$sessionid AND pseudo='admin' AND subject!=''  ORDER BY DATE DESC");





}else {
  header("location:index.php?page=login");
}

 ?>

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
while ($a = $selectSms->fetch()) {

 ?>

         <tbody>
           <tr>
             <td><?= $a['date'] ?></td>
             <td><?= $a['pseudo'] ?></td>
             <td><?= $a['subject'] ?></td>
             <td><?= $a['message'] ?></td>
             <td><a href="index.php?page=messagerecu&id=<?= $a['id']?>"> <i class="material-icons">email</i></a></td>

           </tr>
         </tbody>
         <?php
       }

        ?>
       </table>
