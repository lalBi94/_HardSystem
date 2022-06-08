<?php 
    session_start();
    $connect = require('../../../db/db_connect.php');
    if(!$connect){
        header ("../../error/db_error.php");
        die;
    }

    //VARIABLE : cote entreprise / formulaire
    @$id_buy = $_GET['id']; //id de la demande
    @$qte = $_GET['qte']; //quantite 
    
    $price_req = mysqli_query($db, "select price from businessbuy where id='$id_buy'");
    $price_fetch = mysqli_fetch_assoc($price_req);
    $price = $price_fetch['price']; //prix

    $item_req = mysqli_query($db, "select typeItem from businessbuy where id='$id_buy'");
    $item_fetch = mysqli_fetch_assoc($item_req);
    $item = $item_fetch['typeItem']; //id de l'item

    //VARIABLE : cote client
    $id_client = $_SESSION['id_client'];
    $stash_req = mysqli_query($db, "select stash from customer where id='$id_client'");
    $stash_fetch = mysqli_fetch_assoc($stash_req);
    $stash = $stash_fetch['stash'];

    //INSERTION dans customersell
    $insertIntoClient_req = mysqli_query($db, "insert into customersell(client, item, price, quantity, date_sell, time_sell) values('$id_client', '$item', $price,'$qte', current_date(), current_time())");
    if(!$insertIntoClient_req){
        echo "Erreur dans issert. custommersell";
        die;
    } 

    //INSERTION nouveau stock 
    $qteStock_req = mysqli_query($db, "select quantity from businessbuy where id='$id_buy' and typeItem='$item'");
    if(!$qteStock_req){
        echo "probleme requete stock";
        die;
    }
    $qteStock_fetch = mysqli_fetch_assoc($qteStock_req);
    $qteStock = $qteStock_fetch['quantity'];
    
    $newStock = $qteStock - $qte;
    
    $modifBusinessBuy = mysqli_query($db, "update businessbuy set quantity='$newStock' where id='$id_buy'");
    if(!$modifBusinessBuy){
        echo "probleme lors de la modif de la bdd";
        die;
    }
?>

<html>
    <head>
    <link rel='stylesheet' href='../../../style/all.css'>
        <link rel='stylesheet' href='../../../style/nav.css'>
    </head>

    <body>
        <style>
            main #whenRequestSend{
                margin: 0 auto;
                margin-top: 4%;
                width: 61rem;
                font-size: 2rem;
                text-align: center;
                font-family: 'Courier New', Courier, monospace;
            }

            main .failure_msg{
                margin-top: 2vw;
            }

            main .homepage_return{
                border: 1px solid #0a1b2f; 
                border-radius: 5px;
                background: #0a1b2f;
                padding: 9px; 
                text-decoration: none;
                color: white;
                margin-top: 10%;
            }

            main .gif_request{
                width: 150px;
                height: auto;
            }
        </style>

        <header>
            <nav id="nav-container">
                <ul id="nav-menu-container">
                    <a class ="nav-item" href="../index_instance.php"><img class="image-logo" src="../../../assets/logos/nav-con.png"></a>
                </ul>
            </nav>
        </header>

        <main>
            <?php
                echo "<div id='whenRequestSend'>";
                echo "<img class='gif_request' src='../../../assets/request_send/check_request.gif' alt='Request send !'></img>";
                echo "<p class='failure_msg'>Votre objet a bien ete vendu !<br><br>";
                echo "<div class='homepage_link'>";
                echo "<form>";
                echo "<button class='btn-request' formaction='../index_instance.php'>Revenir a l'accueil</button>";
                echo "</form>";
                echo "</div>";
            ?>
        </main>
    </body>
</html>

