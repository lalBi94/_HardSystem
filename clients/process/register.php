<?php 
    require("../../db/db_connect.php"); //connexion a la bdd
    require("../process/clients_api.php"); //connexion a l'api cliente

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    
    $conflogin = mysqli_query($db, "select login from customer where login='$pseudo'");
    if(mysqli_num_rows($conflogin) >= 1){ //si le nombre de ligne est egal ou superieur a 1 (meme si inutile < 1), client deja existant
        echo "Client avec le login : ".$pseudo." deja existant !";
        die;
    }

    $emailconf = mysqli_query($db, "select email from customerprotecteddata where email='$email'");
    if(mysqli_num_rows($emailconf) >= 1){ //si le nombre de ligne est egal ou superieur a 1 (meme si inutile < 1), client deja existant
        echo "Client avec l'email : ".$email." deja existant !";
        die;
    }

    $insertInCustomer = mysqli_query($db, "insert into customer(login, stash, permission) values('$pseudo', 0, 2)"); //insertion des variables + (0) dans customer
    if(!$insertInCustomer){
        echo "erreur d'insertion dans customer";
        die;
    }

    $getId = mysqli_query($db, "select id from customer where login='$pseudo'"); //recuperer l'id du login dans customer
    if(!$getId){
        echo "erreur de la recup d'id dans customer";
        die;
    }

    $fetch = mysqli_fetch_assoc($getId);
    $id = $fetch['id'];
    $insertInCustomerextdata = mysqli_query($db, "insert into customerprotecteddata values($id, '$nom', '$prenom', '$email')"); //insertion des variables dans customerprotecteddata
    if(!$insertInCustomerextdata){
        echo "erreur d'insertion dans customerprotectdata";
        die;
    }

    echo "Utilisateur cree !";
    die;
?>