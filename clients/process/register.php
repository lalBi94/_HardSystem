<?php 
    require("../../db/db_connect.php");
    require("../process/clients_api.php");

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = passsword_hash($_POST['mdp']);
    
    $conflogin = mysqli_query($db, "select login from customer where login='$pseudo'");
    if(mysqli_num_rows($conflogin) >= 1){
        echo "Client avec le login : ".$pseudo." deja existant !";
        die;
    }

    $emailconf = mysqli_query($db, "select email from customerprotecteddata where email='$email'");
    if(mysqli_num_rows($emailconf) >= 1){
        echo "Client avec l'email : ".$email." deja existant !";
        die;
    }

    $insertInCustomer = mysqli_query($db, "insert into customer(login, password, stash) values('$pseudo', '$mdp', 0)");
    if(!$insertInCustomer){
        echo "erreur d'insertion dans customer";
        die;
    }

    $getId = mysqli_query($db, "select id from customer where login='$pseudo'");
    if(!$getId){
        echo "erreur de la recup d'id dans customer";
        die;
    }

    $fetch = mysqli_fetch_assoc($getId);
    $insertInCustomerextdata = mysqli_query($db, "insert into customerprotecteddata values(, '$prenom', '$nom', '$email')");
    if(!$insertInCustomerextdata){
        echo "erreur d'insertion dans customerprotectdata";
        die;
    }

    echo "Utilisateur cree !";
    die;
?>