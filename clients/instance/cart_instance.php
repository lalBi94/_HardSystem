<?php 
    error_reporting(0);
    session_start();
    $nbitem = 0;
    require("../process/clients_api.php"); 
    require("../process/items_api.php"); 
    require("../../db/db_connect.php");
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<?php 
    $foo = $_SESSION['cart'];
    purgeTab($foo);
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
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
                width: 45%;
                height: auto;
            }
        </style>
        <?php require('./require_nav.php'); ?>

        <p style='text-align: center; margin-top: 4%; margin-bottom: 2%; font-size: 2vw; font-weight: bold;'>Votre panier 
            (<?php 
                echo count(purgeTab($foo)); 
                if(count($foo) >= 2){
                    echo " objets";
                } if(count($foo) == 1){
                    echo " objet";
                } if(count($foo) < 0){
                    echo "Probleme avec le server";
                    die;
                } 
            ?>)
        </p> 
        <div id='cart-container'>
            <?php 
                $i = 0;
                $counti = array_key_last($foo);

                while($i <= $counti){
                    if($foo[$i] == NULL || $foo[$i] == "" || $foo[$i] == " " || empty($foo[$i])){
                        unset($foo[$i]);
                        $i++;
                    } else{
                        echo "<div class='cart'>";
                        $name = getItemName($foo[$i]);
                        $img = getPicture($foo[$i]);
                        echo "<p>".$name."</p>";
                        echo "<img src='$img'></img>";
                        $i++;   
                        echo "</div>"; 
                    }
                }
                
                var_dump($foo);
                
                die;    
            ?>
        </div>
    </body> 
</html>