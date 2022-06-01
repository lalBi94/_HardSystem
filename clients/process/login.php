<?php
    session_start();

    $api = require("../process/clients_api.php"); //connexion a l'api des clients
    if(!$api){ //si la connexion vers l'api des clients echoue
        echo "Echec de la connexion vers l'api";
        die;
    }

    $connect = require("../../db/db_connect.php"); //connexion a la bdd
    if(!$connect){ //si la connexion vers la bdd echoue
        echo "echec de la connexion a la bdd";
        session_unset();
        session_destroy();
        die;
    }

    $log = $_POST['pseudo'];
    $req = mysqli_query($db, "select login, id from Customer where login='$log'");

    if(mysqli_num_rows($req) == 0){ //si zero ligne sortis, aucun utilisateur
        echo "Aucun utilisateur trouve !";
        session_destroy();
        die;
    }
    
    while($fetch = mysqli_fetch_assoc($req)){
        //relatif aux clients
        $_SESSION['login'] = $log; //contient le login
        $_SESSION['sess_id'] = session_id(); //contient l'id de session
        $_SESSION['id_client'] = $fetch['id']; //contient l'id du client
        $_SESSION['stash'] = getStash($log); //contient sa cagnotte

        //Panier
        $_SESSION['cart'] = array(); //contient le panier
        $_SESSION['qtecart'] = array(); //contient la qte de l'item present dans le panier
        
        if(whoIsThis($log) == 1){ //si c'est un administrateur
            $_SESSION['perm'] = 1;
            header ("Location: ../instance/admin_instance.php");
        } if(whoIsThis($log) == 2){ //si c'est un utilisateur
            $_SESSION['perm'] = 2;
            header ("Location: ../instance/index_instance.php");
        }
    }

    die;
?>