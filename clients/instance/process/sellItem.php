<?php 
    session_start();
    $connect = require('../../../db/db_connect.php');
    if(!$connect){
        header ("../../error/db_error.php");
        die;
    }

    //cote entreprise / formulaire
    @$id_buy = $_GET['id'];
    @$qte = $_GET['qte'];
    @$cgu = $_GET['CGU'];
    $item_req = mysqli_query($db, "select typeItem from businessbuy where id='$id_buy'");
    $item_fetch = mysqli_fetch_assoc($item_req);
    $item = $item_fetch['typeItem'];
    $price = $_GET['price'];

    //cote client
    $id_client = $_SESSION['id_client'];
    $stash_req = mysqli_query($db, "select stash from customer where id='$id_client'");
    $stash_fetch = mysqli_fetch_assoc($stash_req);
    $stash = $stash_fetch['stash'];

    $insertIntoClient_req = mysqli_query($db, "insert into customersell(client, item, price, quantity, date_sell, time_sell) values('$id_client', '$item', $price,'$qte', current_date(), current_time())");
    if(!$insertIntoClient_req){
        echo "Erreur";
        die;
    } else{
        echo "Vendu avec succes !";
    }
    die;
?>