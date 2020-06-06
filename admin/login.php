<?php
session_start();

if(isset($_SESSION['admin'])){//si jamais la session admin est la on redirige sur dashboard
    header("Location:index.php?page=edit");
}


$errors=array();
if (isset($_POST['submit'])) {
  if (!empty($_POST["user"]) || !empty($_POST["mdp"]) ) {
    $user='admin';
    $mdp='admin';
    if($_POST['user']==$user && $_POST['mdp']==$mdp){
         $_SESSION['admin']=$mdp;
         header('location:index.php?page=edit');




    }else {
      $errors="identifiants Administrateur incorrect";
    }

}else {
  $errors="Tout les champs sont réquis";
}

}
 ?>


 <!DOCTYPE html>
 <html>
 <head>
     <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>
     <title>login</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
 </head>

 <body>
   <div class="row">
       <div class="col l4 m6 s12 offset-l4 offset-m3">
           <div class="card-panel">
               <div class="row">
                   <div class="col s6 offset-s3">
                       <img src="../img/admin.png" alt="Administrateur" width="100%"/>
                   </div>
               </div>

               <h4 class="center-align">Se connecter</h4>
<form class="" method="post">


<div class="container">
<?php  if (!empty($errors)):?>
      <div class="card red">
         <p class="alert alert-danger"> vous n'avez pas rempli le formulaire correctement</p><br><br>
           <ul>
              <li><?= $errors; ?></li>
          </ul>
    </div>
<?php endif; ?>

<div class="row">
    <div class="input-field col s12">
      <label for="email">Adresse email</label><br>

        <input type="text" id="email" name="user"/>
    </div>

    <div class="input-field col s12">
      <label for="password">Mot de passe</label><br>

        <input type="password" id="password" name="mdp"/>
    </div>
</div>

<center>
    <button type="submit" name="submit" class="waves-effect waves-light btn light-blue">
        <i class="material-icons left">perm_identity</i>
        Se connecter
    </button>
    <br/><br/>
    <a href="index.php?page=new">Nouveau modérateur</a>
</center>




</form>

</div>
</div>
</div>
