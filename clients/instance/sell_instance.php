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
            #cashback, #perso{
                margin: 0 auto;
                margin-top: 2%;
                width: 600px;
                border: 1px solid black;
                border-radius: 4px;
                padding: 2%;
                background: white;
            }

            .title{
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

            .adresse:hover{
                transform: scale(1.05);
                transition: 0.5s;
            }

            .ad{
                background: #0a1b2f;
                border-radius: 4px;
                color: white;
                padding: 5px;
            }

            a{
                text-decoration: none;
                color: white;
            }

        </style>
        <?php require('./require_nav.php'); ?>
        <div id='cashback'>
            <h2 class='title'>Participer a l'economie circulaire !</h2>
            <p style='margin-top: 2%;'>Objet :</p> 
            <form action='./process/sellItem.php' method='post'>
                <select class='slction' name='sellItem'>
                    <option>-- Selectionner un objet --</option>
                    <?php /*Afficher la liste des objets disponible a la vente*/
                        $i = 0;
                        $stop_while = getNbItemPerSelect();
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
                <button class='btn-request'>Voir</button>

                <input type='text' name='price' value='0'>

                <p style='margin-top: 2%;'>Quantite :</p>
                <input class='fields-box-email' type='number' name='qte'><br>

                <p style='margin-top: 2%;'>Nom Prenom:</p> <!-- factice -->
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 2%;'>Adresse :</p> <!-- factice -->
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 5%;' class='adresse'><b><br>L'appareil devra etre envoyer a l'adresse suivante <br><br><span class='ad'><a href='https://goo.gl/maps/Lqac8fMbmzoD4d8AA' target="_blank">36 Rue Georges Charpak, 77127 Lieusaint</a></span></b><br><br></p>

                <input class='btn-request' style='margin-top: 5%;' type='submit' value='Vendre !'>
            <form>
        </div>

        <!-- <div id='perso'>
        <h2 class='title'>Vendez votre objet</h2>
            <form action='./process/sellItem.php' method='post'>
                <p style='margin-top: 2%;'>Nom :</p>
                <input class='fields-box-email' type='text' name='name'><br>

                <p style='margin-top: 2%;'>Prix :</p>
                <input class='fields-box-email' type='number' name='qte'><br>

                <p style='margin-top: 2%;'>Quantite :</p>
                <input class='fields-box-email' type='number' name='qte'><br>

                <p style='margin-top: 2%;'>Nom Prenom:</p> factice 
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 2%;'>Adresse :</p>  factice 
                <input class='fields-box-email' type='text'><br>

                <p style='margin-top: 2%;'>IBAN pour recevoir le paiement :</p>  factice
                <input class='fields-box-email' type='text'><br>

                <input class='btn-request' style='margin-top: 5%;' type='submit' value='Vendre !'>
        </div> -->
    </body>
</html>