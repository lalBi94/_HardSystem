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

<html>
    <head>
        <?php require("./require_head.php");?>
    </head>

    <body>
        <?php require("./require_nav.php");?>

        <style>
            #payement, #paypal{
                margin: 0 auto;
                margin-top: 2%;
                margin-bottom: 1.5%;
                width: 600px;
                border: 1px solid black;
                border-radius: 4px;
                padding: 2%;
                background: white;
            }
        </style>
        
        <?php 
            if(isset($_POST['cart-price'])){
                $price = $_POST['cart-price'];
                $on = false;
            }
            
            if(isset($_POST['uniqueachat'])){
                $price = $_POST['uniqueachat'];
                $item = $_POST['iditem'];
                $on = true;
            }

            //echo $price;
            //var_dump($_SESSION['cart']);
        ?>

        <div id='payement' style='border: 1px solid black;'>
            <h3 style='text-align: center;'>Payement via <u>CB</u></h3><br><br>
            <form action='./process/buyItem.php' method='post' onsubmit='return cardchecker();'>
                <input type='hidden' name='prix' value='<?php echo $price ;?>'>

                <?php 
                    if($on == true){
                        echo "<input type='hidden' name='item' value='<?php echo $item ;?>'>"; 
                    }
                ?> 

                <p><b>Nom Prenom</b></p> <!-- Factice -->
                <input class='fields-box-email' type='text'><br><br> 

                <p><b>Numero de carte</b></p> <!-- Factice -->
                <div style='display: flex;'>
                    <input id='nbcarte-1' class='fields-box-email' style='width: 65px' type='text' maxlength='4'>
                    <input id='nbcarte-2' class='fields-box-email' style='width: 65px' type='text' maxlength='4'>
                    <input id='nbcarte-3' class='fields-box-email' style='width: 65px' type='text' maxlength='4'>
                    <input id='nbcarte-4' class='fields-box-email' style='width: 65px' type='text' maxlength='4'>
                </div>
                <br>

                <p><b>CVV</b></p> <!-- Factice -->
                <input id='cvv' class='fields-box-email' style='width: 65px;' type='text' maxlength='4'><br><br>

                <p><b>Expiration</b></p>
                <?php 
                    $i = 10;
                    echo "<select>"; /*factice*/
                    echo "<option>01</option>";
                    echo "<option>02</option>";
                    echo "<option>03</option>";
                    echo "<option>04</option>";
                    echo "<option>05</option>";
                    echo "<option>06</option>";
                    echo "<option>07</option>";
                    echo "<option>08</option>";
                    echo "<option>09</option>";
                    while($i <= 12){
                        echo "<option>$i</option>";
                        $i++;
                    }
                    echo "</select>";

                    echo "/";

                    echo "<input type='number' style='width: 60px;' name='year' min='".date('Y')."' value='".date('Y')."'><br><br>"; //date('Y') = annee courante
                ?>

                <input type='hidden' name='cart-price' value='<?php echo $price; ?>'>

                <input class='btn-request' style='font-size: 0.8vw;' type='submit' value='Commander (<?php echo $price;?>€ TTC)'>
            </form>
        </div>

        <div id='paypal'> <!-- Factice -->
            <h3 style='text-align: center;'>Payement via <u>Paypal</u> (<?php echo $price; ?>€ TTC)</h3><br><br>
            <form style='text-align: center;' action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="3YQC4736Y9MY4">
                <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                <img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
            </form>
        </div>
        
        <script src='./process/check-card.js'></script>

        <?php 
            //TEST
            //var_dump($_SESSION['cart']);
            //var_dump($_SESSION['qtecart']);
        ?>
        
        <?php require('./require_footer.php'); ?>
    </body>
</html>