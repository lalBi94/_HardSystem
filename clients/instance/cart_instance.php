<?php 
    error_reporting(0);
    session_start();
    $nbitem = 0;
    require("../process/clients_api.php"); 
    require("../process/items_api.php"); 
    require("../../db/db_connect.php");
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>
    <body>
        <style>
            #cart-container{
                max-width: 1300px;
                margin: 30px auto;
                display: grid;
                grid-template-columns: repeat(auto-fill, 300px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
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
                width: 45%;
                height: auto;
            }
        </style>
        <?php require('./require_nav.php'); ?>

        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Votre panier <?php //echo " cart : ".$_SESSION['cart'][$get];?></p> 
        <div id='cart-container'>
            <?php 
                $i = 1;
                $foo = $_SESSION['cart'];
                $count = count($foo);

                // var_dump($foo);

                while($i <= $count){
                    if($foo[$i] == NULL || $foo[$i] == "" || $foo[$i] == " " || empty($foo[$i])){
                        $i++;
                    } else{
                        echo "<div class='cart'>";
                        $name = getItemName($foo[$i]);
                        $img = getPicture($foo[$i]);
                        echo "<p>".$name."</p>";
                        echo "<img src='$img'></img>";
                        $i++;   
                        echo "</div>"; 
                    }
                }

                die;    
            ?>
        </div>
    </body> 
</html>