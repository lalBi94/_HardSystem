<?php 
    session_start();
    $connect = require('../../../db/db_connect.php');
    if(!$connect){
        echo "erreur liaison bdd";
        die;
    }

    $item = $_POST['sellItem'];
    $price = $_POST['price'];
    $qte = $_POST['qte'];
    $id_client = $_SESSION['id_client'];

    $req = mysqli_query($db, "insert into customersell(client, item, price, quantity, date_sell, time_sell) values('$id_client', '$item', '$price', '$qte', current_date(), current_time())");
    if(!$req){
        echo "erreur de l'insertion";
        die;
    }

    echo "Votre objet a bien ete mis sur le marche !";
    die;
?>