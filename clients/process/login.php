<?php
    session_start();
    $connect = require("../../db/db_connect.php");
    if(!$connect){
        echo "echec de la connexion a la bdd";
        session_unset();
        session_destroy();
        die;
    }

    $user = $_POST['pseudo'];
    $req = mysqli_query($db, "select login from Customer where login='$user'");

    if(mysqli_num_rows($req) == 0){
        echo "Aucun utilisateur trouve !";
        session_destroy();
        die;
    }
    
    while(mysqli_fetch_assoc($req)){
        //session
        $_SESSION['username'] = $user;
        $_SESSION['sess_id'] = session_id();

        //cookie
        //setcookie("firstname");

        header ("Location: ../instance/index_instance.php");
    }

    die;
?>