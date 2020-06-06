<?php

    session_start();

    //A modifier en fonction de vos indentifiants de base de donnée
    $dbhost = 'localhost';
    $dbname = 'register';//Ne doit pas être modifié si vous avez appelé votre bdd "blog"
    $dbuser = 'root';
    $dbpswd = '';
    //A partir d'ici, vous ne devez plus rien modifier

    try{
        $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpswd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    }catch(PDOexception $e){
        die("Une erreur est survenue lors de la connexion à la base de données");
    }
