<?php

function get_posts(){ //permettra de recuperer les posts

    global $db;// on est obliger de recuper la base de donnée avec global vu qu'on est dans une fonction
//$req on veux recuperer les infos enumerer dans la table post et recuperer le name dans la tble admins pour cela on va devoir faire une jointure
    $req = $db->query("
        SELECT  posts.id,
                posts.title,
                posts.image,
                posts.date,
                posts.content,
                admins.name
        FROM posts
        JOIN admins
        ON posts.writer=admins.email
        WHERE posted='1'
        ORDER BY date DESC
        LIMIT 0,6

    ");
// *where post=1 ce qui voudra dire que larticle est publié sur le site si posted=0 article est encore en mode brouillon */
    $results = array();// on creer un taleau vide pour $ result

    while($rows = $req->fetchObject()){ //fetchObject recupere la dernière ligne et la retourne en tant qu'objet
        $results[] = $rows; //les [] vu que cest un taleau et on insere les resultat de $rows dans $results[]
    }

    return $results;// et comme cest une fonction elle retourne toujours un resultat ici elle va retourner $results qui pourra etre afficher au user

}
