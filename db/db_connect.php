<?php
    //session_start();
    $db = mysqli_connect("localhost", "root", "root", "hardsys"); //connexion a la base de donnee
    if(!$db){ //si aucun lien etablie
        echo "echec de la connexion a la base de donnee !";
        session_destroy();
        die;
    }
?>