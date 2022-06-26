<?php 
    session_start();
    $connect = require('../../../db/db_connect.php');
    if(!$connect){
        header ("../../error/db_error.php");
        die;
    }

    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }

    //VARIABLE : cote entreprise / formulaire
    @$id_buy = $_GET['id']; //id de la demande
    @$qte = $_GET['qte']; //quantite 
    
    $price_req = mysqli_query($db, "select price from businessbuy where id='$id_buy'");
    $price_fetch = mysqli_fetch_assoc($price_req);
    $price = $price_fetch['price']*$qte; //prix

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

    //CHANGEMENT dans la cagnotte
    $cagnotteInit = mysqli_query($db, "select stash from customer where id='$id_client'");
    if(!$cagnotteInit){
        echo "probleme lors de la recup de la cagnotte";
        die;
    }
    
    $fetchstash = mysqli_fetch_assoc($cagnotteInit);
    $fetchresult  = $fetchstash['stash'];
    $finalCagnotte = $price+$fetchresult;
    
    $upCagnotte = mysqli_query($db, "update customer set stash='$finalCagnotte' where id='$id_client'");
    if(!$upCagnotte){
        echo "probleme lors de la modif de la cagnotte";
        die;
    }
    
    //RECUPERATION du numero de transaction
    $recup_req = mysqli_query($db, "select nsell from customersell where client='$id_client' order by nsell desc limit 1");
    $recup = mysqli_fetch_assoc($recup_req);
    
    $nsell = $recup['nsell'];
?>

<html>
    <head>
        <link rel='stylesheet' href='../../../style/all.css'>
        <link rel='stylesheet' href='../../../style/nav.css'>
        <link rel='stylesheet' href='../../../style/footer.css'>
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

            main .adresse{
                background: #ffe72c;
                border-radius: 4px;
                padding: 2%;
                font-size: 1.1vw;
                text-align: center;
                color: #0a1b2f;
            }

            main .adresse:hover{
                transform: scale(1.05);
                transition: 0.5s;
            }

            main .ad{
                background: #0a1b2f;
                border-radius: 4px;
                color: white;
                padding: 5px;
            }

            main .glglink{
                text-decoration: none;
                color: white;
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
                echo "<p class='failure_msg'>Votre demande a ete prise en compte !";
                echo "<p class='failure_msg'>Votre numero de vente est : <b>#".$nsell."</b></p>";
                echo "<div class='homepage_link'>";
                echo "<p style='margin-top: 5%; font-weight: bold;' class='adresse'><b><br>L'appareil devra etre envoyer a l'adresse suivante <br>Il sera envoye a l'entreprise par nos propres soins<br><br><span class='ad'><a class='glglink' href='https://goo.gl/maps/Lqac8fMbmzoD4d8AA' target='_blank'>36 Rue Georges Charpak, 77127 Lieusaint</a></span></b><br><br></p><br>";
                echo "<form>";
                echo "<button class='btn-request' formaction='../index_instance.php'>Revenir a l'accueil</button>";
                echo "</form>";
                echo "</div>";
            ?>
        </main>

        <?php require('../require_footer.php'); ?>
    </body>
</html>

