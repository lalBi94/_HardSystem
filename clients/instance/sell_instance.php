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
        <style>
            #douze{
                margin: 0 auto;
                margin-top: 2%;
                width: 600px;
                border: 1px solid black;
                border-radius: 4px;
                padding: 2%;
            }

            #douze .title{
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                text-align: center;
            }

            .slction{
                box-sizing: border-box;
                background-color: #0a1b2f;
                border-radius: 4px;
                color: white;
                font-family: 'Courier New', Courier, monospace;
            }
        </style>
        <?php require('./require_nav.php'); ?>
        <div id='douze'>
            <h2 class='title'>Que voulez-vous vendre ?</h2>
            <p style='margin-top: 2%;'>Objet :</p>
            <form action='./process/sellItem.php' method='post'>
                <select class='slction' name='sellItem'>
                    <option>-- Selectionner un objet --</option>
                    <?php 
                        $i = 0;
                        $stop_while = getNbItem();
                        while($i != $stop_while){
                            $req = mysqli_query($db, "select id, name from typeitem");

                            while($fetch = mysqli_fetch_assoc($req)){
                                $id = $fetch['id'];
                                $name = $fetch['name'];
                                echo "<option value='$id'>$name</option>";
                                $i++;
                            }
                        }
                    ?>
                </select>
                <p style='margin-top: 2%;'>Prix € :</p>
                <input class='fields-box-email' type='number' name='price'>

                <p style='margin-top: 2%;'>Quantite :</p>
                <input class='fields-box-email' type='number' name='qte'><br>
    
                <input class='btn-request' style='margin-top: 5%;' type='submit' value='Vendre !'>
            <form>
        </div>
    </body>
</html>