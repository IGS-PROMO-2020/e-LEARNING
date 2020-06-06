

  <?php
  if(isset($_POST['inscription'])){
  $nom=htmlspecialchars($_POST['nom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $password=sha1($_POST['pass1']);
  $email=htmlspecialchars($_POST['email']);
  $pseudo=htmlspecialchars($_POST['pseudo']);
  $classe=htmlspecialchars($_POST['classe']);
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

  $insertuser=$db->prepare("INSERT INTO membres (nom,prenom,pseudo,email,password,date,avatar,classe)
  VALUES(?,?,?,?,?,NOW(),?,?)");
  $insertuser->execute(array($nom,$prenom,$pseudo,$email,$password,$avatar,$classe));

  $message="VOTRE INSCRIPTION A BIEN ETE PRISE EN COMPTE / VOUS RECEVREZ UNE COMFIRMATION D'INSCRIPTION PAR MAIL DANS MOINS DE 24HEURES";


  }

 ?>
    <link rel="stylesheet" href="style.espace.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js"></script>


    <script type="text/javascript">

    $(document).ready(function(){
        $('#signup_form').hide();
        $('#presentation').hide();

        $('#inscription').click(function(){
          $('#login_form').slideUp(800);
          $('#signup_form').slideDown(400);
          $('#presentation').hide();

        });

        $('#connexion').click(function(){
          $('#login_form').slideDown();
          $('#signup_form').slideUp();
          $('#presentation').hide();

        });

        $("#register_form input").focus(function(){          																													//fait reference a tout les champs input qui sont dans le formulaire id=register
        $("#status").fadeOut(800);                        																														// ce code permet de gerer lafficahge des erreurs dans la div id=statuts/il affichera l'erreur et a chaque fois que l'untilisateur cliquera dans un champs il va disparaitre en 800ms
      });

      $("#pseudo").keyup(function(){                        																										// dès qu'un utilisateur tape une entrée dans le champs pseudo verifie les information avec la fonction check pseudo
                                                                                                                        //On vérifie si le pseudo est ok ou n'a pas été déjà pris
          check_pseudo();                                   																										 //verifie les information avec la fonction check pseudo
      });
      $("#pass1").keyup(function(){                           																									 //fait reference a tout les champs input qui sont dans le formulaire id=pass1
        //On vérifie si le mot de passe est ok
          if($(this).val().length < 6){																																						// on verifie si le mot de passe tapr par l'utilisateur  est inferieur a 6 charactères (this)cest l'entree dans le champs.value c'est la valeur taper donc this.value cest a dire tu recupere la valeur entree dans le chmaps
            $("#output_pass1").css("color", "red").html("<br/>Trop court (6 caractères minimum)");																	// si cest trop court de le code suivant.... ans le output_pass1 execut
          } else if($("#pass2").val() != "" && $("#pass2").val() != $("#pass1").val()){																								//sinon si pass2 n'est pas vide est different de pass1(cette verification est très utilile dans la mesure ou le message d'erreur s'affichera seulement si l'utilisateur a taper une informaion dans le 2 champs ).

            $("#output_pass1").html("<br/>Les deux mots de passe sont différents");																													//affiche ici et l'erreur suivante
            $("#output_pass2").html("<br/>Les deux mots de passe sont différents");             																											 //la
          } else {
            $("#output_pass1").html('<img src="img/check.png" class="small_image" alt="" width="25" />');																				//sinon affiche dans #output_pass1 .............
          }
      });

      $("#pass2").keyup(function(){
        //On vérifie si les mots de passe coïncident
          check_password();
      });

      $("#email").keyup(function(){

          check_email();
      });




      function check_pseudo(){ //la fonction qui permet de verifier le pseudo dans la base de donnee
          $.ajax({ //on utilise ajax donc on appelle la fonction ajax
            type: "post",//on utilise la methode post pour envoyer les données
            url:  "pages/register.php",//et il va verifier les informations dans register.php ou on va verifier avec des requetes sql si le pseudo existe deja
            data: {
              'pseudo_check' : $("#pseudo").val()// represente ce que l'utilisateur a taper dans le champs pseudo
            },
            success: function(data){ // la fonction success prend en parametre data va qui correspondre au traitement du pseudo dans check_pseudo
                  if(data == "success"){// si la donnéé taper dans le champs pseudo apres traitement est == success
                    $("#output_checkuser").html('<img src="img/check.png" class="small_image" width="25"  alt=""  />'); // affaiche dans le champs qui a l'id output_checkuser l'image qui se trouve dans le repertoire selectionner
                    return true; // et tu retourne true pour valider les données de ce champs
                  } else {
                    $("#output_checkuser").css("color", "red").html(data);//sinon tu affiche le data correspondant a l'erreur/de facon pratique data represente les different echo de notre fonction check_pseudo
                  }
                 }
          });
      }

      function check_password(){
          $.ajax({
            type: "post",
            url:  "pages/register.php",
            data: {
              'pass1_check' : $("#pass1").val(),
              'pass2_check' : $("#pass2").val()
            },
            success: function(data){
                  if(data == "success"){
                     $("#output_pass2").html('<img src="img/check.png" class="small_image" width="25" alt="" />');
                     $("#output_pass1").html('<img src="img/check.png" class="small_image" width="25" alt="" />');
                     return true;
                  } else {
                    $("#output_pass2").css("color", "red").html(data);
                  }
                 }
          });
      }


      function check_email(){
          $.ajax({
            type: "post",
            url:  "pages/register.php",
            data: {
              'email_check' : $("#email").val()
            },
            success: function(data){
                  if(data == "success"){
                    $("#output_email").html('<img src="img/check.png" class="small_image" width="25" alt="" />');
                    return true;
                  } else {
                    $("#output_email").css("color", "red").html(data);
                  }
                 }
          });
      }





    });

</script>

    <div id="content">

      <div class="lr">

      <ul class="list">
<a class="waves-effect waves-light btn center" id="connexion"><i class="material-icons left"></i>LOGIN</a>
<a class="waves-effect waves-light btn center" id="inscription"><i class="material-icons right"></i>REGISTER</a>

        <p id="message"></p>
      </ul>
      </div>

<div class="container">


      <form id="signup_form" method='post' enctype="multipart/form-data">
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
                 <select name="classe">
                   <option value="" disabled selected>Selectionner VOTRE CLASSE</option>
                   <?php
                   $selectClasse=$db->query("SELECT * FROM classes");

                   while ($b=$selectClasse->fetch()) {?>
                   <option value="<?=$b['id'] ?>"><?= $b['classe']?></option>
                   <?php
                 }
                 ?>
                 </select>
              <label for="email">Adresse électronique:</label>
              <input type="email" placeholder="johndoe@exemple.com" id="email" name="email" required/>
              <br><input type='file'  name='miniature'>
              <p>  <span id="output_email"  ></span></p>
          .          <div id="status">
              <p style="color:#FF0000";>  <span id="sp" >* remplir tous les champs</span></p>
              </div>
              <input type="submit" id="bRegister" class="btn btn-success" name="inscription" value="Inscription" />
            </p>
            <section id="presentation">

            </section>
            </fieldset>

          </form>
      </div>

<?php
if (isset($_POST['submit'])) {

$name=htmlspecialchars(trim($_POST['login']));
$password=sha1($_POST['mdp']);
$erreur=[];
if(!empty($name) AND !empty($password) ){
$requser=$db->prepare("SELECT * FROM membres WHERE pseudo=? AND password=? AND statut_user=1");
$requser->execute(array($name,$password));
$userexist=$requser->rowCount();
if ($userexist==1) {
  $userinfo=$requser->fetch();
  $_SESSION['id']=$userinfo['id'];
$_SESSION['classe']=$userinfo['classe'];

?>
  <script>
      window.location.replace("index.php?page=home_user");//vu qu'on a deja afficher des données sur la page en php on ne peux plus utiliser un header location pour rediriger on redirigera luser avec du JavaScript

  </script>
<?php
}else  {
    $erreur="pseudo/mot de passe erroné/Ou votre compte n'est pas encore activer";
  }
}
}


 ?>
 <?php  if (!empty($erreur)):?>
   <div class="card red center">
       <div class="card-content white-text">
            <ul>
               <li><?= $erreur; ?></li>
           </ul>
     </div>
     </div>
 <?php endif; ?>

          <div class="login">
          <div class="container">
        <div class="row">
            <div class="col m6">
                <div class="row">
                    <form class="col s12" id="login_form" method="post" action="">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="login" name="login" type="text" class="validate">
                                <label for="login"> <i class="material-icons">person</i>Pseudo</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="mdp" name="mdp" type="password" class="validate">
                                <label for="pass">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <p>
                                    <input type="checkbox" id="remember">
                                    <label for="remember">Remember me</label>
                                </p>
                            </div>
                        </div>
                        <div class="divider"></div>
                        <div class="row">
                            <div class="col m12">
                                <p class="right-align">
                                    <button class="btn btn-large waves-effect waves-light" type="submit" name="submit">Login</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
