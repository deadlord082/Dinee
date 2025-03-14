<?php

function bdd_request($SQLrequest){
    $bdd = new PDO('mysql:host=localhost;dbname=planning', 'root', '', array(
        PDO::ATTR_PERSISTENT => true
    ));

    $request =$bdd->prepare($SQLrequest);
    $request->execute();
    $response = $request->fetchAll();
    return $response;
} 

// $usersRequest =$bdd->prepare('SELECT * FROM users');
// $usersRequest->execute();
// $users = $usersRequest->fetchAll();
