<?php
    error_reporting(0);
    session_start();
    $nbitem = 0;
    require("../process/clients_api.php"); //connexion api client
    require("../process/items_api.php"); //connexion api items
    require("../../db/db_connect.php"); //connexion a la bdd
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<?php
    $foo = $_SESSION['cart']; //$foo est egal au tableau $_SESSION['cart']
    $foo1 = $_SESSION['qtecart']; //$foo2 est egal au tableau $_SESSION['qtecart']
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_header.php" ?>
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
                margin-top: 4%;
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
                width: 120px;
                height: 120px;
            }

            .qte{
                width: 15%;
                padding: 2%;
            }
        </style>
        <?php require('./require_nav.php'); //requiere le fichier "./require_nav.php" ?>
        <div id='cart-container'> <!-- containeur des items contenue dans le panier -->
            <?php
                $i = 0;
                $counti = array_key_last($foo); //prends la dernier cle du tableau pour le foreach

                //suppression des valeurs null
                purgeTab($foo); 
                purgeTab($foo1);

                //suppression de doublons
                $foo = array_unique($foo);
            ?>

            <div class='cart'>
                <p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Votre panier<br>
                    (<?php
                        echo count($foo)-1;

                        if(count($foo) >= 2){ //si objet superieur ou egal a 2, mettre un s a objet
                            echo " objets";
                        } if(count($foo) == 1){
                            echo " objet"; //si objet egal a 1, ne pas mettre de s 
                        } if(count($foo) < 0){
                            echo "Probleme avec le server"; //si items inferieur a 1, probleme !
                            die;
                        }
                    ?>)
                </p>
            </div>

            <?php
                $stockprice = array(); //init. du tableau contenant les prix des items

                foreach($foo as $c => $v){
                    $u = (int) getPriceInTypeItem($foo[$c]);
                    $k = (int) $foo1[$c];
                    $price = (int) $u * $k;
                    $stockprice[$c] = $price;

                    if($c == 0){ //comme le tab commence a zero, skip la cle pour qu'elle ne soit pas affiche
                        $c++;
                    }else{
                        echo "<div class='cart'>"; //"Structure" du schema d'une carte contenant les informations lie a l'item + desc choisit par l'utilisateur
                        $name = getItemName($foo[$c]);
                        $img = getPicture($foo[$c]);
                        echo "<p>".$name."</p>"; //Nom de l'item
                        echo "<img src='$img'></img><br>"; //image de l'item
                        echo "<label for='finalqte-de-$c'>Quantite :"; 
                        echo "<input class='qte' type='number' name='finalqte-de-$c' value="."'$foo1[$c]'".">"; //modification, si y a une, de la qte
                        echo "<p>Total : ".$price.",00€ TTC</p>"; //Prix
                        echo "</div>";
                        $c++;
                    }
                }

                //var_dump($foo); //dump le tableau $foo pour test
                //var_dump($foo1); //dump le tableau $foo1 pour test
                //var_dump($stockprice); //dump le tableau $stockprice pour test
            ?>

            <div class='cart'>
                <p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Total<br>
                    <?php
                        $finalprice = array_sum($stockprice);
                        echo $finalprice." €"; //Prix
                    ?>
                </p>
            </div>
        </div>
    </body>
    <?php die; //Pour ne pas depenser les ressources inutiles ?>
</html>