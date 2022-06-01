<?php 
    error_reporting(0);
    session_start();

    $foo = array();
    array_push($_SESSION['cart'], $foo);
    
    $foo1 = array();
    array_push($_SESSION['qtecart'], $foo1);

    $nbitem = 0;
    $send = 0;

    require("../process/clients_api.php"); 
    require("../process/items_api.php"); 
    require("../../db/db_connect.php");

    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<?php 
    @$get = $_GET['nbitem'];
    @$item = $_GET['item'];
    @$qtecarte = $_GET['quantity'];
     
    if(isset($get) and isset($item) and isset($qtecarte)){
        $_SESSION['cart'][$get] = (int) $item;
        $_SESSION['qtecart'][$get] = (int) $qtecarte;

        if(array_count_values($tmp) > 1){
            echo "detect";
        }

        $test = array_count_values(array_column($qtecarte, "1"));
        print_r($test);

        $nbitem++;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>
    <body>
        <?php require('./require_nav.php'); ?>
        <style>
            .items-container{ /*Conteneur de div*/
                position:relative;
                max-width: 1500px;
                margin: 30px auto;
                display: grid;
                grid-template-columns: repeat(auto-fill, 350px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
            }

            .items{ /*ITEM*/
                border: 1px solid black;
                border-radius: 4px;
                padding: 15px;
                background: white;
                width: 350px;
                height: auto;
                text-align: center;
            }

            .items .item{ /*nom item*/
                text-transform: uppercase;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                font-size: 1vw;
                margin-top: 4%;
            }

            .items button{ /*button*/
                margin: 0;
                width: 35%;
                margin-top: 4%;
            }

            .items .item-img{ /*image */
                width: 120px;
                height: 120px;
            } 

            .items .desc{
                color: #0a1b2f;
            }

            .addCart{
                width: 25%;
                height: auto;
            }

            .qte{
                width: 15%;
                padding: 2%;
            }
        </style>

            
        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par le site</p> 
        <?php 
            $name = getTheAllOfNameItemFrom(1);
            $stop_while = count($name); 
            $i = 0;
            $j = 0;

            echo "<div class='items-container'>";
            while($i != $stop_while){
                $price = getPriceInTypeItem(getItemId($name[$i]));

                echo "<div class='items'>";
                $img = getPicture(getItemId($name[$i]));
                echo "<img class='item-img' src='$img'></img>";
                echo "<p class='item'>".$name[$i]."</p>";
                echo "<p>Vendu par HardSystem</p>";

                echo "<form>";
                echo "<a class='desc' href='#'>"."Fiche technique"."</a>";
                echo "</form>";

                echo "<form method='get' onsubmit='return whenAlreadyChecked();'>";
                $get++;
                $send = getItemId($name[$i]);
                echo "<input type='hidden' name='nbitem' value='$get'>"; //envoie en get de la cle contenant l'id de l'item dans $_SESSION['cart']
                echo "<input type='hidden' name='item' value='$send'>"; //envoie en get l'id de l'item
                echo "<input type='hidden' name='price' value='$price'>";
                
                echo "<br><p><b>".$price.",00€/u TTC</b></p>";
                echo "<br><input class='qte' type='number' name='quantity' value='1'><br>";
                echo "<button id='addCart-$send-1' class='btn-request' onclick='inc();'><img class='addCart' src='../../assets/logos/cart.png'></img></button>";

                echo "</form>";
                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>



        <p style='text-align: center; margin-top: 15%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par les utilisateurs</p> 
        <?php 
            $cli = getTheAllOfNameItemFromClients();
            $stop_while = count($cli);
            $i = 0;
            $j = 0;

            echo "<div class='items-container'>";
            while($i != $stop_while){
                echo "<div class='items'>";
                $img = getPicture(getItemId($cli[$i]));
                echo "<img class='item-img' src='$img'></img>";
                echo "<p class='item'>".$cli[$i]."</p>";
                echo "<p>Vendu par ".getUserSeller(getItemId($cli[$i]))."</p>";

                echo "<form>";
                echo "<a class='desc' href='#'>"."Fiche technique"."</a>";
                echo "</form>";


                echo "<form method='get'>";
                $get++;
                $send = getItemId($cli[$i]);
                echo "<input type='hidden' name='nbitem' value='$get'>";
                echo "<input type='hidden' name='item' value='$send'>";
                
                echo "<br><input class='qte' type='number' name='qte' value='1'><br>";
                echo "<button class='btn-request'><img class='addCart' src='../../assets/logos/cart.png'></img></button>";
                echo "</form>";

                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>

        <script src='../process/cart_system.js'></script>
    </body>
</html>
