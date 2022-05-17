<?php 
    $connect = require('../../db/db_connect.php');
    if(!$connect){
        echo "echec de la connexion a la bdd";
        die;
    }
?>