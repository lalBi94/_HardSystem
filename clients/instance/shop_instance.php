<?php 
    session_start();
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
        <?php require('./require_nav.php'); ?>

        <style>
            #items-container{ /*Conteneur de div*/
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                justify-content: space-around;
            }

            .items{ /*Conteneur d'items */
                border: 1px solid black;
                border-radius: 4px;
                padding: 10px;
                background: white;
            }

            #items-container .item{ /*nom item*/
                text-transform: uppercase;
                text-align: center;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                font-size: 1vw;
                margin-top: 4%;
            }

            #items-container .items button{ /*button*/
                margin: 0;
                width: 50%;
                margin-left: 25%;
                margin-top: 4%;
            }

            #items-container .items img{ /*image */
                width: 50%;
                margin-left: 25%;
            }

            .desc{
                margin-left: 20%;
                color: #0a1b2f;
            }
        </style>

            
        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Vendu par le site</p>
        <?php 
            $name = getTheAllOfNameItem();
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
                echo "<a class='desc' href='#'>"."Afficher le descriptif de l'objet"."</a>";
                echo "</form>";


                echo "<form>";
                echo "<button class='btn-request'>Commander</button>";
                echo "</form>";

                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>
    </body> 