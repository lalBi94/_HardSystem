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
                background: white;
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
                padding: 1.5%;
            }

            .adresse{
                background: #ffe72c;
                border-radius: 4px;
                padding: 2%;
                text-align: center;
                color: #0a1b2f;
            }

            .ad{
                background: #0a1b2f;
                border-radius: 4px;
                color: white;
                padding: 5px;
            }
        </style>
        <?php require('./require_nav.php'); ?>
        <div id='douze'>
            <h2 class='title'>Que voulez-vous vendre ?</h2>
            <p style='margin-top: 2%;'>Objet :</p> 
            <form action='./process/sellItem.php' method='post'>
                <select class='slction' name='sellItem'>
                    <option>-- Selectionner un objet --</option>
                    <?php /*Afficher la liste des objets disponible a la vente*/
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

                <p style='margin-top: 2%;'>Quantite :</p>
                <input class='fields-box-email' type='number' name='qte'><br>

                <p style='margin-top: 2%;'>Nom Prenom:</p> <!-- factice -->
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 2%;'>Adresse :</p> <!-- factice -->
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 5%;' class='adresse'><b><br>L'appareil devra etre envoyer a l'adresse suivante <br><br><span class='ad'>36 Rue Georges Charpak, 77127 Lieusaint</span></b><br><br></p>

                <input class='btn-request' style='margin-top: 5%;' type='submit' value='Vendre !'>
            <form>
        </div>
    </body>
</html>