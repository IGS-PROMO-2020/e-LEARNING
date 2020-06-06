<?php
  $req=$db->query("SELECT COUNT(id) FROM comment");
  $req2=$db->query("SELECT COUNT(id_articles) FROM articles");
?>
<div class="card">
  <h1>TABLEAU DE BORD</h1>
  
