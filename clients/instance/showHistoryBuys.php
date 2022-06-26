<?php 
    session_start(); 
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>

    <body>
        <?php require('./require_nav.php'); ?>

        <style>
            #history{
                margin: 0 auto;
                margin-top: 2%;
                width: 600px;
            }

            table, th, td, tr{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                text-align: center;
                background: white;
            }
        </style>

        <div id="history">
            <?php //a finir
                require('../process/items_api.php');
                require('../process/clients_api.php');
                require('../../db/db_connect.php');
                if(!isset($_SESSION['id_client'])){
                    header ("location: ../eClientLogin.php");
                    die;
                }

                $user = getLoginId($_SESSION['login']);
                $name_item = getAllNameSellItemsUser($_SESSION['login']);
                $n_sell = getAllSellIdsUser($_SESSION['login']);
                $qte = getAllQuantityItemsSellUser($_SESSION['login']);
                $date = getAllDateItemsSellUser($_SESSION['login']);
                $time = getAllTimeItemsSellUser($_SESSION['login']);
                
                $i = 0;
                $stop_while = count($n_sell);
            
                echo "<table>";
                echo "<tr> <th>N. Vente</th> <th>Nom de l'objet</th> <th>Quantite</th> <th>Date</th> <th>Heure</th>";
                
                while($i != $stop_while){
                    echo "<tr>"."<td>".$n_sell[$i]."</td>"."<td>".getItemName($name_item[$i])."</td>"."<td>".$qte[$i]."</td>"."<td>".$date[$i]."</td>"."<td>".$time[$i]."</td>"."</tr>";
                    $i++;
                }

                echo "</table>";
            ?>
        </div>

        <?php require('./require_footer.php'); ?>
    </body>
</html>