<?php 
    session_start();
    require("../process/clients_api.php"); 
    require("../process/items_api.php"); 
    require("../../db/db_connect.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>
    <body>
        <?php require('./require_nav.php'); ?>

        <style>
            #items-container{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-around;
                max-width: 420px;
            }

            #items-container .item{
                text-transform: uppercase;
                text-align: center;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                font-size: 1vw;
            }

            #items-container .items button{
                margin: 0;
                width: 50%;
                margin-left: 25%;
                margin-top: 4%;
            }

            #items-container .items img{
                width: 50%;
                margin-left: 25%;
            }

            .item{
                margin-top: 4%;
            }

            .items{
                border: 1px solid black;
                border-radius: 4px;
                padding: 10px;
                background: white;
            }
        </style>

            
        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par le site</p>
        <?php 
            $name = getTheAllOfNameItem();
            $stop_while = count($name);
            $i = 0;

            echo "<div id='items-container'>";
            while($i != $stop_while){
                echo "<div class='items'>";

                $img = getPicture(getItemId($name[$i]));

                echo "<img src='$img'></img>";
                echo "<p class='item'>".$name[$i];
                echo "<form>";
                echo "<button class='btn-request'>Commander</button>";
                echo "</form>";

                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>
    </body> 