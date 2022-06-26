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

    if(count($_SESSION['qtecart'])){
        foreach($_SESSION['qtecart'] as $c => $v){
            $price = $_POST['cart-price'];
            $id = $_SESSION['id_client'];
            $item = $c; 
            $insertbuy = mysqli_query($db, "insert into customerbuy (client, item, price, quantity, date_buy, time_buy) values ('$id', '$item', '$price', '$v', current_date(), current_time())");
            if(!$insertbuy){
                echo "Echec de l'achat";
                //TEST  
                // print_r(" Client ".$id." ");
                // print_r("Item ".$item." ");
                // print_r("Prix ".$price." ");
                // print_r("Qte ".$v);
                //var_dump($_SESSION['qtecart']);
                //var_dump($_SESSION['cart']);
                die;
            }

            $c++;
        }
    } else{
        $price = (int) $_POST['prix'];
        $id = (int) $_SESSION['id_client'];
        $item = (int) $_POST['item'];

        $insertbuy = mysqli_query($db, "insert into customerbuy (client, item, price, quantity, date_buy, time_buy) values ('$id', '$item', '$price', 1, current_date(), current_time())");
        if(!$insertbuy){
            echo "Echec de l'achat";
            //TEST  
            // print_r(" Client ".$id." ");
            // print_r("Item ".$item." ");
            // print_r("Prix ".$price." ");
            // print_r("Qte ".$v);
            //var_dump($_SESSION['qtecart']);
            //var_dump($_SESSION['cart']);
            die;
        }
    }

    $nbtransac_req = mysqli_query($db, "select nbuy from customerbuy where client='$id' order by nbuy desc limit 1");
    if(!$nbtransac_req){
        echo "echec de la recup du numero de transaction";
        die;
    }
    $nbtransac_fetch = mysqli_fetch_assoc($nbtransac_req);
    $nbtransac = $nbtransac_fetch['nbuy'];

    if(!empty($_SESSION['cart-business'])){ //deminution de la qte de stock dispo apres achat
        foreach($_SESSION['cart-business'] as $c => $v){
            $req = mysqli_query($db, "select quantity from businesssell where idrequest='$v'");
            if(!$req){
                echo "erreur dans la diminution panier";
                die;
            }

            while($fetch = mysqli_fetch_assoc($req)){ // la
                $qtecur = $fetch['quantity'];
                $req2 = mysqli_query($db, "update businesssell set quantity=quantity-$qtecur where idrequest='$v'");
                if(!$req2){
                    echo "echec de la diminution";
                    die;
                }
            }
        }
    }
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
                echo "<p class='failure_msg'>Votre commande a bien ete passe !";
                echo "<p class='failure_msg'>Votre numero de transaction est : <b>#".$nbtransac."</b></p><br><br>";
                echo "<div class='homepage_link'>";
                echo "<form>";
                echo "<button class='btn-request' formaction='../index_instance.php'>Revenir a l'accueil</button>";
                echo "</form>";
                echo "</div>";
            ?>
        </main>

        <?php 
            require('../require_footer.php'); 

            if(count($_SESSION['qtecart'])){
                foreach($_SESSION['cart'] as $c => $v){
                    unset($_SESSION['cart'][$c]);
                    unset($_SESSION['qtecart'][$c]);
                    unset($_SESSION['url'][$c]);
                    $c++;
                }

                die;
            }
        ?>
    </body>
</html>

