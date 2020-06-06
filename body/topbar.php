



<nav>
  <div class="nav-wrapper">
    <nav class="blue">
      <a href="index.php?page=home" class="brand-logo">EDUSCOL-IVOIRE </a><img src="eduscol.png" alt=""> 
      <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a><?php // cette classe concerne le format mobile qui permettra de d'afficher le menu burger la correspondance se fera avec le data-activates qui doit correspondre a la valeur de l'id donner dans l'ul de class side nav?>

      <ul class="right hide-on-med-and-down">
        <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">ACCEUIL</a></li>
        <li class="<?php echo ($page=="actualites")?"active" : ""; ?>"><a href="index.php?page=actualites">NOS CONVICTIONS</a></li>
        <a class='dropdown-button btn' href='#' rel="nofollow noopener noreferrer"  data-activates='dropdown1'>NOS FORMATIONS</a>
        <ul id='dropdown1' class='dropdown-content'>
          <li><a href="index.php?page=terminale" ><i class="material-icons center">latop</i>TERMINALE</a></li>
          <li><a href="index.php?page=profil" ><i class="material-icons center">latop</i>PREMIERE</a></li>
         <li><a href="index.php?page=profil" ><i class="material-icons center">latop</i>3EME</a></li>
          <li><a href="index.php?page=profil" ><i class="material-icons center">latop</i>4EME</a></li>
          <li><a href="index.php?page=profil" ><i class="material-icons center">latop</i>5EME</a></li>
          <li><a href="index.php?page=profil" ><i class="material-icons center">latop</i>6EME</a></li>


        </ul>
        <li class="<?php echo ($page=="politique")?"active" : ""; ?>"><a href="index.php?page=politique">NOUS CONTACTEZ</a></li>
<?php if(!isset($_SESSION['id'])){ ?>
        <li class="<?php echo ($page=="actualites")?"active" : ""; ?>"><a href="index.php?page=login"><i class="material-icons center">person</i></a></li>
<?php
}else {?>
  <a class='dropdown-button btn' href='#' rel="nofollow noopener noreferrer"  data-activates='dropdown2'><i class="material-icons center">person_outline</i><</a>

  <!-- Dropdown Structure -->
  <ul id='dropdown2' class='dropdown-content'>
    <li><a href="index.php?page=profil" ><i class="material-icons center"></i>MES COURS</a></li>
    <li><a href="index.php?page=messages" rel="nofollow noopener noreferrer" ><i class="material-icons center">email</i>Messages</a></li>
    <li class="divider"></li>
    <li><a href="index.php?page=edit" rel="nofollow noopener noreferrer" target="_blank"><i class="material-icons center">settings</i>Paramtres du compte</a></li>
    <li><a href="index.php?page=logout" rel="nofollow noopener noreferrer" target="_blank"><i class="material-icons center">person_outline</i>logout</a></li>

  </ul>
<?php
}

 ?>




    <!-- Dropdown Trigger -->

      <!-- Dropdown Structure -->



<script type="text/javascript">
<script type="text/javascript">
            $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrain_width: false, // Does not change width of dropdown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: false, // Displays dropdown below the button
          alignment: 'left' // Displays dropdown with edge aligned to the left of button
        }
      );
    </script>
</script>
    </ul>
    <ul class="side-nav" id="mobile-menu"><?php // cette class permet de gerer le cote responsive donc l'affichage en format mobile ?>
        <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
        <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
    </ul>
  </div>
</nav>
</nav>
<?php /*
<<nav class="blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Blog 2.0</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a><?php // cette classe concerne le format mobile qui permettra de d'afficher le menu burger la correspondance se fera avec le data-activates qui doit correspondre a la valeur de l'id donner dans l'ul de class side nav?>

            <ul class="right hide-on-med-and-down"> <?php // cette classe permet de cacher les liens de navigation sur tablette et portables ?>
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
            <?php // on dit que si $page= home ou blog on ajoute l'effet active sur les liens sinon on ajoutr "" donc rien?>
            </ul>


            <ul class="side-nav" id="mobile-menu"><?php // cette class permet de gerer le cote responsive donc l'affichage en format mobile ?>
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog">Blog</a></li>
            </ul>

        </div>
    </div>
</nav>
*/
?>
