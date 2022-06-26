<!-- 
    # Fonctionnement de la mise en forme :
        - A l'aide de php, on creer une sorte d'objet (div.items contenue dans div.items-container) contenant les informations de l'item charger grace a la boucle
        - La boucle fonctionne / les informations sont recupere ainsi :
            - Les informations des items sont stocke dans $name[] et sont recuperes par la fonction de l'api item_api.php getAllItemFromCat($cat) ou $cat represente le filtre (ordinateur, telephone etc...)
            - La boucle commence a $i = 0 et fini a $stop_while = le nombre d'element dans $name[]

    # Fonctionnement de notre systeme de panier : 
        - Le clique sur le logo panier envoie en GET les informations liees au carte du produit
            - Alloue une case dans $_SESSION['cart'] en l'initialisant par $nbitem
            - Ecrit dedans :
                - Id de l'item get.item
                - Le prix get.price
                - La quantite get.quantity
                - La categorie get.cat (non utiliser appart pour filtrer les categories)

            - Le processus de chaque clique :
                - On incremente la variable $nbitem
                - $nbitem est recuperer dans $get
                    - Si le $get est deja initialise dans le tableau, on l'icremente (ce qui cree parfois dans ecart entre les cles qui cree des cases a la valeur null)
                    - Pour remedier aux casex null, on a cree une fonction qui les supprimes : purgeTab();
                - La page enclanche la fonction disable(id); contenant dans la balise <script> line.189 ou id represente l'id du boutton qui a ete clique : addCart-$id
                    - La fonction permet de bloquer le bouton pour que l'utisateur ne puisse pas ajouter le meme item dans le panier

            - Suite :
                - $_SESSION['cart'] est envoye a cart_instance.php
 -->

<?php //initialisation
    session_start();

    $nbitem = 0; //passage a la cle suivant du tableau contenant le panier
    $send = 0;

    @$categorie = $_GET['cat']; //recup du filtre
    if($categorie == 'Ordinateurs'){
        $prefix = "d'";
        $category = 3;
    } if($categorie == 'Telephones'){
        $prefix = "de ";
        $category = 2;
    } if($categorie == 'Ecrans'){
        $prefix = "d'";
        $category = 4;
    } if($categorie == 'Tablettes'){
        $prefix = "de ";
        $category = 1;
    } 

    require("../process/clients_api.php"); 
    require("../process/items_api.php"); 
    require("../../db/db_connect.php");

    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<?php 
    @$item = (int) $_GET['nbitem'];
    @$qte = (int) $_GET['quantity'];
    @$price = (int) $_GET['price'];
    @$idreq = (int) $_GET['idrequest'];
    @$businesss = (int) $_GET['business'];

    $_SESSION['cart'][$item] = (int) $price;
    $_SESSION['qtecart'][$item] = (int) $qte;
    $_SESSION['url'][$item] = (int) $item;

    if($businesss == 'true'){
        $_SESSION['cart-business'][$item] = (int) $idreq; 
    } else{
        $_SESSION['cart-business'][100] = null; 
    }

    foreach($_SESSION['cart'] as $c => $v){
        if($c == null || $c == 0){
            unset($_SESSION['cart'][$c]);
        }
    }

    foreach($_SESSION['qtecart'] as $c => $v){
        if($c == null || $c == 0){
            unset($_SESSION['qtecart'][$c]);
        }
    }

    foreach($_SESSION['url'] as $c => $v){
        if($c == null || $c == 0){
            unset($_SESSION['url'][$c]);
        }
    }

    foreach($_SESSION['cart-business'] as $c => $v){
        if($c == null || $c == 0){
            unset($_SESSION['cart-business'][$c]);
        }
    }
?>

<html>
    <head>
        <?php require('./require_head.php'); ?>
        <link rel='stylesheet' href='./process/loadercart.css'>
    </head>
    <body onload='hide();'>
        <?php require('./require_nav.php'); ?>

        <style>
            .items-container{ /*Conteneur de div*/
                position:relative;
                max-width: 1500px;
                margin: 30px auto;
                display: grid;
                grid-template-columns: repeat(auto-fill, 350px);
                justify-content: center;
                grid-gap: 2%;
                text-align: center;
            }

            .items{ /*ITEM*/
                border: 1px solid black;
                border-radius: 4px;
                padding: 15px;
                background: white;
                width: 350px;
                height: auto;
                text-align: center;
            }

            .items .item{ /*nom item*/
                text-transform: uppercase;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                font-size: 1vw;
                margin-top: 4%;
            }

            .items button{ /*button*/
                width: 35%;
            }

            .items .item-img{ /*image */
                width: 120px;
                height: 120px;
            } 

            .items .desc{
                color: #0a1b2f;
            }

            .addCart{
                width: 25%;
                height: auto;
            }

            .buy-btn{
                margin-top: 8.5%;
                display: flex;
                justify-content: space-around;
            }

            .qte{
                width: 15%;
                padding: 2%;
            }

            .hyperl{
                text-decoration: none;
                background: yellow;
                color: #0a1b2f;
                padding: 1.2%;
                text-transform: uppercase;
                font-weight: bold;
            }
        </style>

        <div id='showWhenClick'> <!-- Animation lors de l'jout d'item dans le panier -->
            <div class='apresAjoutPanier'></div>
        </div>
            
        <?php 
            if($_GET['business'] == 'false'){ //VENDU PAR HARD-SYSTEM
                echo "<p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Selection $prefix $categorie <span style='font-size: 20px;'> [vendu par Hard System] </span></p>"; 
                $name = getAllItemFromCat($category);
                $stop_while = count($name); 
                $i = 0;
                $bus = "false";
                $iditem = getItemId($name[$i]);

                echo "<div class='items-container'>";
                while($i != $stop_while){
                    $price = getPriceInTypeItem(getItemId($name[$i]));

                    echo "<div class='items'>";
                    $img = getPicture(getItemId($name[$i]));
                    echo "<img class='item-img' src='$img'></img>";
                    echo "<p class='item'>".$name[$i]."</p>";
                    echo "<p>Vendu par HardSystem</p>";

                    echo "<form>";
                    echo "<br><a class='desc' href='./item_details.php?id=$iditem&business=$bus'>Fiche technique</a>";
                    echo "</form>";

                    echo "<form method='get'>";

                    $send = getItemId($name[$i]);
                    echo "<input type='hidden' name='nbitem' value='$send'>"; //envoie en get de la cle contenant l'id de l'item dans $_SESSION['cart']
                    echo "<input type='hidden' name='price' value='$price'>";
                    echo "<input type='hidden' name='cat' value='$categorie'>";
                    echo "<input type='hidden' name='business' value='false'>";
                    
                    echo "<br><p><b>".$price.",00€/u TTC</b></p>";
                    echo "<br><input class='qte' type='number' min='1' name='quantity' value='1'><br>";
                    echo "<div class='buy-btn'>";
                    echo "<button id='addCart-$send' class='btn-request'><img class='addCart' src='../../assets/logos/cart.png'>+</img></button>";
                    echo "</form>";

                    echo "<form action='./cart_buy.php?' method='post'>";
                    echo "<button style='width: 150px;' name='uniqueachat' value='$price' class='btn-request'>Acheter x1</button>";
                    echo "<input type='hidden' name='iditem' value='$send'>";
                    echo "</div>";
                    echo "</form>";

                    echo "</div>";
                    $i++;
                }

                echo "</div>";
            } else{
                echo "<p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Selection $prefix $categorie <span style='font-size: 20px;'> [vendu par nos partenaires] </span></p>";
                $req_business = mysqli_query($db, "select BS.idrequest, B.site, BS.quantity, BS.price, T.name, T.cat, B.name, B.site from businesssell BS, typeitem T, business B where T.id = BS.typeitem and T.cat = $category and BS.business = B.id order by BS.idrequest asc");
                $req_name_item = mysqli_query($db, "select T.name from businesssell BS, typeitem T, business B where T.id = BS.typeitem and T.cat = $category and BS.business = B.id order by BS.idrequest asc");
                if(!$req_business){
                    echo "Erreur dans la selection des informations";
                    die;
                } if(!$req_name_item){
                    echo "Erreur dans la selection du nom de l'item";
                    die;
                }

                if(mysqli_num_rows($req_business) == 0){
                    echo "<p>Aucun objet n'est a vendre dans cette categorie</p>";
                } else{ //VENDU PAR NOS PARTENAIRES
                    echo "<div class='items-container'>";
                        while($fetch = mysqli_fetch_assoc($req_business) and $fetch1 = mysqli_fetch_assoc($req_name_item)){
                            $name_business = $fetch['name'];
                            $name_item = $fetch1['name'];
                            $price = $fetch['price'];
                            $qtemax = $fetch['quantity'];
                            $site = $fetch['site'];
                            $idrequest = $fetch['idrequest'];
                            $bus = "true";
                            $idItem = getItemId($name_item);

                            echo "<div class='items'>";
                            $img = getPicture(getItemId($name_item));
                            echo "<img class='item-img' src='$img'></img>";
                            echo "<p class='item'>".$name_item."</p>";

                            echo "<p style='margin-top: 10px;'>Vendu par <a class='hyperl' href='$site' target='_blank'>$name_business</a></p><br>";
                            echo "<a class='desc' href='./item_details.php?id=$idItem&business=$bus'>Fiche technique</a>";

                            echo "<form method='get'>";

                            $send = getItemId($name_item);
                            echo "<input type='hidden' name='nbitem' value='$send'>"; //envoie en get de la cle contenant l'id de l'item dans $_SESSION['cart']
                            echo "<input type='hidden' name='price' value='$price'>";
                            echo "<input type='hidden' name='cat' value='$categorie'>";
                            echo "<input type='hidden' name='business' value='true'>";
                            echo "<input type='hidden' name='idrequest' value='$idrequest'>";
                            if($qtemax >= 1){
                                echo "<br><p><b>".$price.",00€/u TTC</b></p>";
                                echo "<br><input class='qte' type='number' min='1' name='quantity' value='1'>";
                                echo "<span style='color: green;'> Disponible : x$qtemax</span>";
                                echo "<div class='buy-btn'>";
                                echo "<button id='addCart-$send' class='btn-request'><img class='addCart' src='../../assets/logos/cart.png'>+</img></button>";
                                echo "</form>";

                                echo "<form action='./cart_buy.php?' method='post'>";
                                echo "<button style='width: 150px;' name='uniqueachat' value='$price' class='btn-request'>Acheter x1</button>";
                                echo "<input type='hidden' name='iditem' value='$send'>";
                                echo "</div>";
                                echo "</form>";

                                echo "</div>";
                            } else{
                                echo "<p style='color: red;'>Rupture de stock...</p>";
                                echo "</div>";
                            }
                        }
                }
            }
        ?>

        <script type="text/javascript">
            function disable(id){
                document.getElementById("addCart-"+id).style.backgroundColor = "grey";
                document.getElementById("addCart-"+id).disabled = true;
            }

            function hide(){
                const hidediv = document.getElementById("showWhenClick");
                hidediv.style.display = 'none';
            }
        </script>

        <?php
            $alreadycart = $_SESSION['cart'];
            $count = count($alreadycart);

            foreach($alreadycart as $c => $v){
                if($alreadycart[$c] == "" || $alreadycart[$c] == " " || $alreadycart[$c] == null || empty($alreadycart[$c])){
                    unset($alreadycart[$c]);
                    $c++;
                }
            }

            foreach($alreadycart as $id => $valeur){
                echo "<script type='text/javascript'>";
                echo "disable($id);";
                echo "</script>";
                $c++;
            }

            //var_dump($alreadycart); //check le tab $alreadycart
        ?>

        <?php require('../instance/require_footer.php'); ?>
    </body>
</html>
