<?php

if(!$_SESSION['admin'])
{
  header('location:../login.php');

}
if (isset($_GET['id'])  ){
 $getid=$_GET['id'];
 $dropuser=$db->prepare('DELETE FROM users WHERE id =?');
 $dropuser->execute(array($getid));
 header("Location:index.php?page=listUsers&id=".$getid);



}else {
  echo "UTILISATEURS INTROUVABLE";
}
?>
