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
            img{
                width: 250px;
                height: auto;
            }

            #cart-container{
                display: flex;
                flex-direction: column;
                justify-content: space-around;
            }

            .cart{
                border: 2px solid black;
                margin-top: 2%;
                background: white;
            }

        </style>
        <?php require('./require_nav.php'); ?>

        <div id='cart-container'>
            <?php 
                $i = 1;
                $count = count($_SESSION['cart']);
                $foo = $_SESSION['cart'];
                $count = count($foo);

                
                while($i != 100){
                    echo "<div class='cart'>";
                    if($foo[$i] == NULL or $foo[$i] == "" or $foo[$i] == " " or empty($foo[$i])){
                        $i++;
                    }

                    $name = getItemName($foo[$i]);
                    $img = getPicture($foo[$i]);
                    echo "<p>".$name."</p>";
                    echo "<img src='$img'></img>";
                    $i++;
                    echo "</div>";
                }

                echo $_SESSION['totalcart'];

                die;    
            ?>
        </div>
    </body> 
</html>