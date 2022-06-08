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

            .text-cgu{
                font-size: 18px; 
            }

        </style>

        <?php require('./require_nav.php'); ?>
        <div id='cashback'>
            <h2 class='title'>Participer a l'economie circulaire !</h2><br><br>

            

            <form method='get'>
                <input class='fields-box-email' style='margin-top: 2%;' name='item' placeholder='Rechercher un objet'>
                <input class='btn-request' style='font-size: 12px; width: 100px; height: auto;' type='submit' value='rechercher'>
            </form>

            <form action='./process/sellItem.php' method='get'> 
                <?php //Afficher les items du site
                    if(isset($_GET['item']) && !empty($_GET['item']) && $_GET['item'] != "" && $_GET['item'] != " "){
                        @$get = $_GET['item'];
                        $displayitem = mysqli_query($db, "select I.name, I.price, BB.id, BB.typeItem, P.url, BB.quantity from typeitem I, picture P, businessbuy BB, business B where I.name like '%$get%' and BB.typeItem = I.id and B.id = BB.business and P.item = BB.typeItem");
                        $displaybusiness = mysqli_query($db, "select B.name from typeitem I, picture P, businessbuy BB, business B where I.name like '%$get%' and BB.typeItem = I.id and B.id = BB.business and P.item = BB.typeItem");
                        $nb = mysqli_num_rows($displayitem);

                        if($nb == 0 || empty($get) || !isset($get) || $get == null || $get == " " || $get == ""){
                            echo "<p style='color: red'>Aucun resultat !</p><br>";
                            die;
                        } if($nb > 0){
                            echo "<p style='color: green'>Disponible ! ($nb resultat";
                        } if($nb > 1){
                            echo "s)</p>";
                        } else{
                            echo ")</p>";
                        } 

                        $item = (int) getItemId($get);

                        while($fetch = mysqli_fetch_assoc($displayitem) and $fetch2 = mysqli_fetch_assoc($displaybusiness)){
                            $initprice = $fetch['price'];
                            $price1 = ($initprice*40)/100;
                            $price = $initprice-$price1;
                            $id = $fetch['id'];
                            $idItem = $fetch['typeItem'];

                            // $cagnotte_price = mysqli_query($db, "select E.element, E.quantity, C.qteMG, C.price from cagnotte C, extractionfromtypeitem E where E.typeitem = '$item' and C.idElem = E.element");
                            // $q = $fetch3['quantity'];
                            // $p = $fetch3['price'];
                            // $add = $q*$p;

                            echo "<div style='border: 1px solid black; margin-bottom: 2%;'></div>";

                            echo "<div>";
                            echo "<input style='float: left;' type='radio' name='id' value='$id'>"; //contient id de la demande
                            echo "<p style='font-weight: bold; margin-left: 5%;'>".$fetch['name']."</p><br>";
                            echo "<img style='width: 15%; height: auto; margin-left: 3%; margin-bottom: 2%;' src='".$fetch['url']."'>";
                            echo "<p style='float: right; text-align: right;'>".
                            "<b>".$price."</b>".
                            "€<br>Acheteur <b>".$fetch2['name']."</b>".
                            "<br>Quantite : "."<b>".$fetch['quantity']."</b>".
                            "</p><br>";
                            echo "</div>";
                        }

                        echo "<div style='border: 1px solid black;'></div><br>";

                        echo "<p style='margin-top: 2%; font-weight: bold;'>Quantite :</p>";
                        echo "<input style='width: 55px; text-align: center;' min='1' class='fields-box-email' type='number' name='qte' value='1'><br><br>";
    
                        echo "<p style='margin-top: 2%; font-weight: bold;'>Nom Prenom:</p> <!-- factice -->";
                        echo "<input class='fields-box-email' type='text'><br>";
    
                        echo "<p style='margin-top: 2%; font-weight: bold;'>Adresse :</p> <!-- factice -->";
                        echo "<input class='fields-box-email' type='text'><br>";
    
                        echo "<p style='margin-top: 5%; font-weight: bold;' class='adresse'><b><br>L'appareil devra etre envoyer a l'adresse suivante <br>Il sera envoye a l'entreprise par nos propres soins<br><br><span class='ad'><a href='https://goo.gl/maps/Lqac8fMbmzoD4d8AA' target='_blank'>36 Rue Georges Charpak, 77127 Lieusaint</a></span></b><br><br></p><br>";
    
                        echo "<input id='cgu' class='checkbox' type='checkbox' name='CGU'>";
                        echo "<label class='text-cgu' for='CGU'><b> Accepter les <a href='../../assets/cgu/CGU-Hard-System.fr.pdf' style='color: #0a1b2f;'>CGU</a></b></label><br><br><br>";
                        echo "<input class='btn-request' style='margin-top: 5%;' type='submit' value='Vendre !'>";
                        echo "</form>";
                    }
                ?>
        </div>
    </body>
</html>