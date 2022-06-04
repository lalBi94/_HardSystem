<?php //demarrage
    error_reporting(0);
    session_start();

    $nbitem = 0;
    require("../process/clients_api.php"); //connexion api client
    require("../process/items_api.php"); //connexion api items
    require("../../db/db_connect.php"); //connexion a la bdd
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<?php //Lie a la suppression d'element
    if(isset($_GET['delI'])){
        @$get = $_GET['delI'];
        unset($_SESSION['cart'][$get]);
    }

    if(isset($_GET['request'])){
        foreach($_SESSION['cart'] as $c => $v){
            unset($_SESSION['cart'][$c]);
            $c++;
        }

        foreach($_SESSION['qtecart'] as $c => $v){
            unset($_SESSION['qtecart'][$c]);
            $c++;
        }
    }
?>

<?php //supprimer les potentiels cases vident (inutile car deja purger dans shop_instance.php mais on sait jamais)
    $foo = $_SESSION['cart']; //$foo est egal au tableau $_SESSION['cart']
    $foo1 = $_SESSION['qtecart']; //$foo2 est egal au tableau $_SESSION['qtecart']
    purgeTab($foo); 
    purgeTab($foo1);
?>

<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_header.php" ?>
        <link rel='stylesheet' href='./process/loadercart.css'>
    </head>
    <body onload='hide();'>
        <style>
            #cart-container{
                max-width: 1300px;
                margin: 30px auto;
                display: grid;
                grid-template-columns: repeat(auto-fill, 300px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
                margin-top: 4%;
            }

            .cart{
                border: 1px solid black;
                border-radius: 4px;
                padding: 15px;
                background: white;
                width: 300px;
                height: auto;
                text-align: center;
            }

            img{
                width: 120px;
                height: 120px;
            }

            .qte{
                width: 15%;
                padding: 2%;
            }

            .btn{
                background-color: #0a1b2f;
                color: white;
                border: none;
                border-radius: 2.3px;
                padding: 11px;
                font-size: 0.8vw;
                width: 110px;
                height: 40px;
            }

            .btn:hover{
                transform: scale(1.1);
                transition: 0.3s;
            }
        </style>
        
        <?php require('./require_nav.php'); //requiere le fichier "./require_nav.php" ?>
        <div id='cart-container'> <!-- containeur des items contenue dans le panier -->
            <?php
                $i = 0;
                $counti = array_key_last($foo); //prends la dernier cle du tableau pour le foreach

                //suppression de doublons
                $foo = array_unique($foo);
            ?>

            <div class='cart'>
                <?php
                    if(count($foo) == 0){
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Aucun article</p>";
                    }else{
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Votre panier(";
                        echo count($foo);
                        echo ")</p>";

                        echo "<form>";
                        echo "<input type='hidden' name='request' value='1'>";
                        echo "<input type='submit' class='btn-request' value='Vider le panier'>";
                        echo "</form>";
                    }
                ?>
            </div>

            <?php
                $stockprice = array(); //init. du tableau contenant les prix des items

                foreach($foo as $c => $v){
                    $u = (int) getPriceInTypeItem($foo[$c]);
                    $k = (int) $foo1[$c];
                    $price = (int) $u * $k;
                    $stockprice[$c] = $price;

                    if($c == 0){ //comme le tab commence a zero, skip la cle pour qu'elle ne soit pas affiche
                        $c++;
                    }else{
                        echo "<div class='cart'>"; //"Structure" du schema d'une carte contenant les informations lie a l'item + desc choisit par l'utilisateur
                        $name = getItemName($foo[$c]);
                        $img = getPicture($foo[$c]);
                        echo "<p>".$name."</p><br>"; //Nom de l'item
                        echo "<img src='$img'></img><br><br>"; //image de l'item
                        echo "<label for='finalqte-de-$c'>Quantite :"; 
                        echo "<input class='qte' type='number' name='finalqte-de-$c' value="."'$foo1[$c]'".">"; //modification, si y a une, de la qte
                        echo "<br><br><p>Total : ".$price.",00€ TTC</p><br>"; //Prix
                        echo "<form method='get'>";
                        echo "<button class='btn'>Supprimer</button>";
                        echo "<input type='hidden' name='delI' value='$c'>";
                        echo "</form>";
                        echo "</div>";
                        $c++;
                    }
                }
                
                //var_dump($_SESSION['cart']); //dump la var session cart
                //var_dump($_SESSION['qtecart']); //dump la var session qtecart
                //var_dump($foo); //dump le tableau $foo pour test
                //var_dump($foo1); //dump le tableau $foo1 pour test
                //var_dump($stockprice); //dump le tableau $stockprice pour test
            ?>

                <?php
                    if(count($foo) >= 1){
                        echo "<div class='cart'>";
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Total<br>";
                        $finalprice = array_sum($stockprice);
                        echo $finalprice." €"; //Prix
                        echo "</div>";
                    } else{
                        die;
                    }
                ?>
            </div>
        </div>
    </body>
    <?php die; //Pour ne pas depenser les ressources inutiles ?>
</html>