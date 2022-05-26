<?php 
    session_start();
    $foo = array();
    array_push($_SESSION['cart'], $foo);
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
    if(isset($get)){
        $_SESSION['cart'][$get] = (int) $item;
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
            #items-container{ /*Conteneur de div*/
                max-width: 1300px;
                margin: 30px auto;
                display: grid;
                grid-template-columns: repeat(auto-fill, 300px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
            }

            .items{ /*ITEM*/
                border: 1px solid black;
                border-radius: 4px;
                padding: 15px;
                background: white;
                width: 300px;
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
                width: 50%;
                margin-top: 4%;
            }

            .items img{ /*image */
                width: 50%;
            }

            .items .desc{
                color: #0a1b2f;
            }
        </style>

            
        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par le site <?php //echo " cart : ".$_SESSION['cart'][$get];?></p> 
        <?php 
            $name = getTheAllOfNameItemFrom(1);
            $stop_while = count($name);
            $i = 0;
            $j = 0;

            echo "<div id='items-container'>";
            while($i != $stop_while){
                echo "<div class='items'>";
                $img = getPicture(getItemId($name[$i]));
                echo "<img src='$img'></img>";
                echo "<p class='item'>".$name[$i]."</p>";

                echo "<form>";
                echo "<a class='desc' href='#'>"."Fiche technique"."</a>";
                echo "</form>";


                echo "<form method='get'>";
                $get++;
                $send = getItemId($name[$i]);
                echo "<input type='hidden' name='nbitem' value='$get'>";
                echo "<input type='hidden' name='item' value='$send'>";

                echo "<button class='btn-request'>Ajouter au panier</button>";

                echo "</form>";

                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>














        <p style='text-align: center; margin-top: 10%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par les utilisateurs</p> 
        <?php 
            $cli = getTheAllOfNameItemFromClients();
            $stop_while = count($cli);
            $i = 0;
            $j = 0;

            echo "<div id='items-container'>";
            while($i != $stop_while){
                echo "<div class='items'>";
                $img = getPicture(getItemId($cli[$i]));
                echo "<img src='$img'></img>";
                echo "<p class='item'>".$cli[$i]."</p>";

                echo "<form>";
                echo "<a class='desc' href='#'>"."Fiche technique"."</a>";
                echo "</form>";


                echo "<form method='get'>";
                $get++;
                echo "<input type='hidden' name='nbitem' value='$get'>";
                
                echo "<button class='btn-request'>Ajouter au panier</button>";
                echo "</form>";

                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>
    </body>
</html>