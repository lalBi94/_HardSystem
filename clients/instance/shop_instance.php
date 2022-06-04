<?php //initialisation
    error_reporting(0);
    session_start();

    $nbitem = 0; //passage a la cle suivant du tableau contenant le panier
    $send = 0;

    @$categorie = $_GET['cat']; //recup du filtre
    if($categorie == 'Ordinateur'){
        $prefix = "d'";
        $category = 3;
    } if($categorie == 'Telephone'){
        $prefix = "de";
        $category = 2;
    } if($categorie == 'Ecran'){
        $prefix = "d'";
        $category = 4;
    } if($categorie == 'Tablette'){
        $prefix = "de";
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

<?php //systeme d'enregistrement de caddie
    @$get = $_GET['nbitem'];
    @$item = $_GET['item'];
    @$qtecarte = $_GET['quantity'];

    foreach($_SESSION['cart'] as $c => $v){
        if(array_key_exists($c)){
            echo "detect";
            $get = $get+2;
            $c++;
        } else{
            echo "non detect";
            $c++;
        }
    }
     
    if(isset($get) and isset($item) and isset($qtecarte)){
        $_SESSION['cart'][$get] = (int) $item;
        $_SESSION['qtecart'][$get] = (int) $qtecarte;

        $nbitem++;
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
                margin: 0;
                width: 35%;
                margin-top: 4%;
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

            .qte{
                width: 15%;
                padding: 2%;
            }
        </style>

        <div id='showWhenClick'> <!-- Animation lors de l'jout d'item dans le panier -->
            <div class='apresAjoutPanier'></div>
        </div>
            
        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Selection <?php echo $prefix.$categorie; ?></p> 
        <?php 
            $name = getAllItemFromCat($category);
            $stop_while = count($name); 
            $i = 0;
            $j = 0;

            echo "<div class='items-container'>";
            while($i != $stop_while){
                $price = getPriceInTypeItem(getItemId($name[$i]));

                echo "<div class='items'>";
                $img = getPicture(getItemId($name[$i]));
                echo "<img class='item-img' src='$img'></img>";
                echo "<p class='item'>".$name[$i]."</p>";
                echo "<p>Vendu par HardSystem</p>";

                echo "<form>";
                echo "<br><a class='desc' href='#'>"."Fiche technique"."</a>";
                echo "</form>";

                echo "<form method='get'>";
                $get++;

                $send = getItemId($name[$i]);
                echo "<input type='hidden' name='nbitem' value='$get'>"; //envoie en get de la cle contenant l'id de l'item dans $_SESSION['cart']
                echo "<input type='hidden' name='item' value='$send'>"; //envoie en get l'id de l'item
                echo "<input type='hidden' name='price' value='$price'>";
                echo "<input type='hidden' name='cat' value='$categorie'>";

                var_dump($_SESSION['cart']);
                
                echo "<br><p><b>".$price.",00€/u TTC</b></p>";
                echo "<br><input class='qte' type='number' name='quantity' value='1'><br>";
                echo "<button id='addCart-$send' class='btn-request'><img class='addCart' src='../../assets/logos/cart.png'></img></button>";

                echo "</form>";
                echo "</div>";
                $i++;
            }
            echo "</div>";
        ?>

        <script type="text/javascript">
            function disable(id){
                document.getElementById("addCart-"+id).style.backgroundColor = "grey";
                document.getElementById("addCart-"+id).disabled = true;
                console.log(id + " plus appuyable");
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
                echo "disable($valeur);";
                echo "</script>";
                $c++;
            }

            //var_dump($alreadycart); //check le tab $alreadycart
        ?>
    </body>
</html>
