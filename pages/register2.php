<?php
if(isset($_POST['submit'])){
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$password=sha1($_POST['pass1']);
$email=htmlspecialchars($_POST['email']);
$pseudo=htmlspecialchars($_POST['pseudo']);
$message=[];
if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
$taillemax=9097152;
$extensinsValides=array('.jpg','.jpeg','.gif','.png');
$file_name=$_FILES['miniature']['name']; // enregistre dans la variable $file_name le nom du fichier

if($_FILES['miniature']['size']<=$taillemax){
$file_extension= strrchr($file_name,".");// en registre dans la variable $file_extension l'extension du fichier ce qui permettre d'etablier les restrictions par rapport au ty pe dex fichier qu'on veux strrchr permettra d'enregister dans la variablle le type de fichier
$chemin="avatar/".$nom.$file_name.$file_extension;
$extensions_autorisees =array('.jpg' , '.JPG'  , '.JPEG');// enregistre dans la variable $extensions_autorisees a partir du tableau array les extensions autoriséelse
if(in_array($file_extension,$extensinsValides))   //
{
  $resultat=move_uploaded_file($_FILES ['miniature']['tmp_name'],"images/".$nom.$file_name.$file_extension);
$avatar=$nom.$file_name."." .$file_extension;
}
}
}

$insertuser=$db->prepare("INSERT INTO membres (nom,prenom,pseudo,email,password,date,avatar)
VALUES(?,?,?,?,?,NOW(),?)");
$insertuser->execute(array($nom,$prenom,$pseudo,$email,$password,$avatar));

$message="VOTRE INSCRIPTION A BIEN ETE PRISE EN COMPTE / VOUS RECEVREZ UNE COMFIRMATION D'INSCRIPTION PAR MAIL DANS MOINS DE 24HEURES";


}


 ?>

 <?php  if (!empty($message)):?>
   <div class="card green center">
       <div class="card-content white-text">
            <ul>
               <li><?= $message; ?></li>
           </ul>
     </div>
     </div>
 <?php endif; ?>

<form id="signup_form" method='post' enctype="multipart/form-data">

  <fieldset>
    <legend>Inscrivez-vous</legend>

    <label for="nom">Nom:</label>
    <input type="text" placeholder="Entrez votre nom" id="nom" name="nom" required/>
    <label for="prenom">Prénom:</label>
    <input type="text" placeholder="Entrez votre prénom" id="prenom" name="prenom" required/>
    <div class="pseudo">

      <label for="nom">CONTACT:</label>
      <input type="text" placeholder="Entrez votre CONTACT" id="nom" name="contact" required/>
    <label for="pseudo">Pseudo:</label>
    <input type="text" placeholder="Entrez votre pseudo" id="pseudo" name="pseudo" maxlength="16" required/>
  <p>  <span id="output_checkuser"  ></span></p>
      </div>
    <label for="pass1">Mot de passe:</label>
    <input type="password" id="pass1" name="pass1" required/>
    <p>  <span id="output_pass1"  ></span></p>

    <label for="pass2">Confirmer votre mot de passe:</label>
    <input type="password" id="pass2" name="pass2" required/>
    <p>  <span id="output_pass2"  ></span></p>
    <label for="email">Adresse électronique:</label>
    <input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/>
    <br><input type='file'  name='miniature'>
    <p>  <span id="output_email"  ></span></p>
.          <div id="status">
    <p style="color:#FF0000";>  <span id="sp" >* remplir tous les champs</span></p>
    </div>
    <input type="submit" id="bRegister" class="btn btn-success" name="submit" value="Inscription" />
  </p>
  <section id="presentation">

  </section>
  </fieldset>

</form>
