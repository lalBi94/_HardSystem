<?php 
    require("../../../db/db_connect.php");

    $nom = $_POST['name'];
    $prix = $_POST['price'];
    $elem = $_POST['elem'];
    $img = $_POST['url'];
    $desc = $_POST['desc'];
    $qte = $_POST['qte'];

    $insert_inTypeItem = mysqli_query($db, "insert into typeitem (name, byWho, price) values('$nom', $price, 2)");
    if(!$insert_inTypeItem){
        echo "Echec de l'ajout dans typeitem.";
        die;
    }

    $getID = mysqli_query($db, "select id from typeitem where name='$nom'");
    if(!$getID){
        echo "Echec de l'ajout dans typeitem.";
        die;
    }

    $fetch_id = mysqli_fetch_assoc($getID);
    $id_item = $fetch_id['id'];

    $insert_inExtractionfromtypeitem = mysqli_query($db, "insert into extractionfromtypeitem values($id_item, $elem, $qte)"); //point mort
?>