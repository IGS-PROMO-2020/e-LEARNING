<?php

$_SESSION=array("admin");
session_destroy();

header("Location:index.php?page=edit");
 ?>
