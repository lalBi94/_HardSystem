<?php //demarrage
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

<?php //Lie a la suppression d'element
    if(isset($_GET['delI'])){
        @$get = $_GET['delI'];
        unset($_SESSION['cart'][$get]);
        unset($_SESSION['qtecart'][$get]);
        unset($_SESSION['url'][$get]);
        unset($_SESSION['cart-business'][$get]);
        unset($_SESSION['cart-business'][0]);
    }

    if(isset($_GET['request'])){
        foreach($_SESSION['cart'] as $c => $v){
            unset($_SESSION['cart'][$c]);
            unset($_SESSION['qtecart'][$c]);
            unset($_SESSION['url'][$c]);
            $c++;
        }
    }

    if(isset($_GET['toChange']) && isset($_GET['by'])){
        $_SESSION['qtecart'][$_GET['toChange']] = (int) $_GET['by']; //qtecart = var. de session, tochange = id de l'item dans le panier a changer, by = par quoi la changer (nouvelle quantite)
    }
?>

<?php //supprimer les potentiels cases vident (inutile car deja purger dans shop_instance.php mais on sait jamais)
    $foo = $_SESSION['cart']; //$foo est egal au tableau $_SESSION['cart']
    $foo1 = $_SESSION['qtecart']; //$foo1 est egal au tableau $_SESSION['qtecart']
    $foo2 = $_SESSION['qtecart']; //$foo2 est egal au tableau $_SESSION['url']
    $foo3 = $_SESSION['cart-business']; //$foo3 est egal au tableau $_SESSION['cart-business']
    $stock_price = array(); //Gestion dynamique du total du panier
?>

<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_header.php" ?>
        <link rel='stylesheet' href='./process/loadercart.css'>
    </head>
    <body>
        <style>
            #cart-container{
                max-width: 1300px;
                display: grid;
                grid-template-columns: repeat(auto-fill, 300px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
                margin-top: 4%;
                margin-bottom: 100px;
                margin: 30px auto;
            }

            .cart{
                border: 1px solid black;
                border-radius: 4px;
                padding: 15px;
                background: white;
                width: 300px;
                height: auto;
                text-align: center;
                margin: auto;
            }

            img{
                width: 120px;
                height: 120px;
            }

            .qte{
                width: 20%;
                padding: 2%;
            }

            .btn{
                background-color: #0a1b2f;
                color: white;
                border: none;
                border-radius: 2.3px;
                padding: 11px;
                font-size: 0.8vw;
                width: 110px;
                height: 40px;
            }

            .btn:hover{
                transform: scale(1.1);
                transition: 0.3s;
            }
        </style>
        
        <?php require('./require_nav.php'); //requiere le fichier "./require_nav.php" 
            echo "cart-business ->"; var_dump($_SESSION['cart-business']); //dump le tab parallele a $foo
            echo "foo ->"; var_dump($foo); //dump le tableau $foo pour test
            echo "foo1 ->"; var_dump($foo1); //dump le tableau $foo1 pour test
            echo "foo2 ->"; var_dump($foo2); //dump le tableau $foo2 pour test
            echo "stock_price ->"; var_dump($stock_price); //dump le tab de prix
        ?>
        <div id='cart-container'> <!-- containeur des items contenue dans le panier -->
            <div class='cart'>
                <?php
                    if(count($foo) == 0){
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Aucun article</p><br>";
                    }else{
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Votre panier(";
                        echo count($foo);
                        echo ")</p><br>";

                        echo "<form>";
                        echo "<input type='hidden' name='request' value='1'>";
                        echo "<input type='submit' class='btn-request' value='Vider le panier'>";
                        echo "</form>";
                    }
                ?>
            </div>

            <?php
                foreach($foo as $c => $v){
                    if($c == 0 || $c == null){ //comme le tab commence a zero, skip la cle pour qu'elle ne soit pas affiche
                    } else{
                        $name = getItemName($c);
                        $img = getPicture($c);

                        $price = $foo[$c];
                        $qte = $foo1[$c];

                        $pf = $price * $qte;

                        $stock_price[$c] = $pf;

                        echo "<div class='cart'>"; //"Structure" du schema d'une carte contenant les informations lie a l'item + desc choisit par l'utilisateur
                        echo "<p>".$name."</p><br>"; //Nom de l'item
                        echo "<img src='$img'></img><br><br>"; //image de l'item
                        echo "<label>Quantite : ";
                        echo "<input id='qte-$c' class='qte' type='number' value=".$foo1[$c]." min='1' onchange='validate($c);'>"; //modification, si y a une, affiche un boutton pour confirmer la modification
                        echo "<div id='finalqte-$c'></div>";
                        echo "<br><p>Total : ".$pf.",00€ TTC</p><br>"; //Prix
                        echo "<form method='get'>";
                        echo "<button class='btn'>Supprimer</button>";
                        echo "<input type='hidden' name='delI' value='$c'>";
                        echo "</form>";
                        echo "</div>";
                    }
                }
            ?>

                <?php
                    if(count($foo) >= 1){
                        echo "<div class='cart'>";
                        echo "<p style='text-align: center; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Total<br>";
                        $finalprice = array_sum($stock_price);
                        echo $finalprice.",00€ TTC"; //Prix

                        echo "<form action='./cart_buy.php' method='post'>";
                        echo "<br><input class='btn-request' type='submit' value='Commander'>";
                        echo "<input type='hidden' name='cart-price' value='$finalprice'>";
                        echo "</div>";
                        echo "</form>";
                    }
                ?>
            </div>
        </div>

        <script>
            function validate(finalqteID){ //Changement de valeur dans le panier
                let current_qte = document.getElementById("qte-"+finalqteID).value;
                const src_finalqte = document.getElementById("finalqte-"+finalqteID);

                const form = document.createElement("form");
                form.setAttribute("method", "get");

                if(document.getElementById("toCheck")){
                    const btn_src = document.getElementById("toCheck");
                    const p = document.createElement("p");
                    return false;
                } 
                
                if(!document.getElementById("toCheck")){
                    const input = document.createElement("input");
                    input.setAttribute("type", "submit");
                    input.setAttribute("id", "toCheck"); //pour la condition de verification juste en haut
                    input.setAttribute("class", "btn-request");
                    input.setAttribute("style", "font-size: 0.8vw; background: #ffe72c; color: black;");
                    input.setAttribute("value", "Confirmer");

                    const invisibleinput = document.createElement("input");
                    invisibleinput.setAttribute("type", "hidden");
                    invisibleinput.setAttribute("name", "toChange");
                    invisibleinput.setAttribute("value", finalqteID);

                    const invisibleinput2 = document.createElement("input");
                    invisibleinput2.setAttribute("type", "hidden");
                    invisibleinput2.setAttribute("name", "by");
                    invisibleinput2.setAttribute("value", current_qte);
                    
                    src_finalqte.appendChild(form);
                    form.appendChild(input);
                    form.appendChild(invisibleinput);
                    form.appendChild(invisibleinput2);

                    console.log("finalqte-" + finalqteID + " -> OK (" + current_qte +")");
                    return true;
                }
            }
        </script>

        <?php require('./require_footer.php'); ?>
    </body>
    <?php die; //Pour ne pas depenser les ressources inutiles ?>
</html>