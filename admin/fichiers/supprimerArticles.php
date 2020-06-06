<?php

if(!$_SESSION['admin'])
{
header('location :../login.php');

}
if (isset($_GET['id'])  ){
 $getid=$_GET['id'];
 $dropuser=$db->prepare('DELETE FROM articles WHERE id_articles =?');
 $dropuser->execute(array($getid));
 header("Location:index.php?page=list");



}else {
  echo "UTILISATEURS INTROUVABLE";
}
?>
