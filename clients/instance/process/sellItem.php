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

    //echo "item :".$item." Price : ".$price." Qte : ".$qte." id client : ".$id_client." ";

    $req = mysqli_query($db, "insert into customersell(client, item, price, quantity, date_sell, time_sell) values('$id_client', '$item', '$price', '$qte', current_date(), current_time())");
    if(!$req){
        echo "erreur de l'insertion";
        die;
    }

    $cagnotte = mysqli_query($db, "select E.element, E.quantity, C.qteMG, C.price from cagnotte C, extractionfromtypeitem E where E.typeitem = $item and C.idElem = E.element");
    while($fetch = mysqli_fetch_assoc($cagnotte)){
        $k;

        $q = $fetch['qteMG'];
        $e = $fetch['quantity'];
        $elem = $fetch['element'];

        if($e > $q){
            $k = $e/$q;
        } if($e < $q){
            $k = $q/$e;
        }

        $p = $fetch['price'];
        $price = $k*$p;
        echo " | Qte = ".$fetch['qteMG']. " Prix = ".$fetch['price']." Ajout dans la cagnotte = ".$price." | ";
        
        $nomElem = mysqli_query($db, "select name from mendeleiev where Z='$elem'");
        $ce = mysqli_query($db, "insert into customerextraction values('$id_client', '$elem', '$e')");
        if(!$ce){
            echo "erreur dans linsertion dans customerextraction"; 
            die;
        }
    }

    $stash = mysqli_query($db, "select stash from customer where id='$id_client'");
    if(!$stash){
        echo "erreur dans la recup de stash";
        die;
    }
    $fetch_stash = mysqli_fetch_assoc($stash);

    $x = $fetch_stash['stash'];
    $nv = $x+$price;
    $can = mysqli_query($db, "update customer set stash='$nv' where id='$id_client'");
    if(!$can){
        echo "erreur dans le modif de stash";
        die;
    }

    echo " | Votre objet a bien ete mis sur le marche ! | ";
    echo " | ".$price."$ ont ete ajoute dans votre cagnotte | ";
    die;
?>