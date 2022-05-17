<?php
    //session_start();
    $db = mysqli_connect("localhost", "root", "root", "hardsys");
    if(!$db){
        echo "echec de la connexion a la base de donnee !";
        session_destroy();
        die;
    }
?>