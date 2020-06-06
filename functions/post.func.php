<?php

function get_post(){
    global $db;

    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.content,
                posts.date,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer = admins.email
        WHERE posts.id='{$_GET['id']}'
        AND posts.posted = '1'
    ");
//and posts.posted=1 pour quil selectionne uniquement les post qu'on va publier car  posted=0 est considéré comme brouillon
    $result = $req->fetchObject();
    return $result;

}


function comment($name,$email,$comment){

    global $db;

    $c = array(
        'name'      => $name,
        'email'     => $email,
        'comment'   => $comment,
        'post_id'   => $_GET["id"]

    );

    $sql = "INSERT INTO comments(name,email,comment,post_id,date) VALUES(:name, :email, :comment, :post_id, NOW())";
    $req = $db->prepare($sql);
    $req->execute($c);

}

function get_comments(){ //pour recuperer les commentaires

    global $db;
    $req = $db->query("SELECT * FROM comments WHERE post_id = '{$_GET['id']}' ORDER BY date DESC");
    $results = [];
    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    return $results;


}
