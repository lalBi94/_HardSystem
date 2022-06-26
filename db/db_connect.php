<?php
    //session_start();
    $db = mysqli_connect("localhost", "root", "root", "hardsys"); //connexion a la base de donnee
    if(!$db){ //si aucun lien etabli
        session_destroy();
        header ("location: ../error/db_error.php");
        die;
    }
?>