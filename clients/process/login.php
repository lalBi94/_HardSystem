<?php
    session_start();

    $api = require("../process/clients_api.php"); //connexion a l'api des clients
    if(!$api){ //si la connexion vers l'api des clients echoue
        echo "Echec de la connexion vers l'api";
        die;
    }

    $connect = require("../../db/db_connect.php"); //connexion a la bdd

    $log = $_POST['pseudo'];
    $req = mysqli_query($db, "select login, id from customer where login='$log'");

    if(mysqli_num_rows($req) == 0){ //si zero ligne sortis, aucun utilisateur
        session_destroy();
        header ("location: ../error/login_clientExist.php");
        die;
    }
    
    while($fetch = mysqli_fetch_assoc($req)){
        //relatif aux clients
        $id = $fetch['id'];
        $identity_req = mysqli_query($db, "select CE.firstname, CE.surname from customerprotecteddata CE where id='$id'");
        $identity = mysqli_fetch_assoc($identity_req); 
        $_SESSION['login'] = $log; //contient le login
        $_SESSION['sess_id'] = session_id(); //contient l'id de session
        $_SESSION['id_client'] = $id; //contient l'id du client
        $_SESSION['stash'] = getStash($log); //contient sa cagnotte
        $_SESSION['firstname'] = $identity['firstname']; //nom
        $_SESSION['surname'] = $identity['surname']; //prenom

        //Panier
        $_SESSION['cart'] = array(); //contient le prix
        $_SESSION['qtecart'] = array(); //contient la qte de l'item present dans le panier
        $_SESSION['url'] = array(); //contient les id item mis dans le panier 
        $_SESSION['cart-business'] = array(); //Contient l'idrequest (customersssell) pour enlever la qte dispo dans businesssell
        
        
        if(whoIsThis($log) == 1){ //si c'est un administrateur
            $_SESSION['perm'] = 1;
        } if(whoIsThis($log) == 2){ //si c'est un utilisateur
            $_SESSION['perm'] = 2;
        }

        header ("Location: ../instance/index_instance.php");
    }

    die;
?>