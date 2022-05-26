<?php
    session_start();

    $api = require("../process/clients_api.php");
    if(!$api){
        echo "Echec de la connexion vers l'api";
        die;
    }

    $connect = require("../../db/db_connect.php");
    if(!$connect){
        echo "echec de la connexion a la bdd";
        session_unset();
        session_destroy();
        die;
    }

    $log = $_POST['pseudo'];
    $req = mysqli_query($db, "select login, id from Customer where login='$log'");

    if(mysqli_num_rows($req) == 0){
        echo "Aucun utilisateur trouve !";
        session_destroy();
        die;
    }
    
    while($fetch = mysqli_fetch_assoc($req)){
        $_SESSION['login'] = $log;
        $_SESSION['sess_id'] = session_id();
        $_SESSION['stash'] = getStash($log);
        $_SESSION['id_client'] = $fetch['id'];
        $_SESSION['cart'] = array();
        $_SESSION['totalcart'] = 0;
        
        if(whoIsThis($log) == 1){
            $_SESSION['perm'] = 1;
            header ("Location: ../instance/admin_instance.php");
        } if(whoIsThis($log) == 2){
            $_SESSION['perm'] = 2;
            header ("Location: ../instance/index_instance.php");
        }
    }

    die;
?>