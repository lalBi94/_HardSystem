<?php 
    session_start(); 
    require("../process/clients_api.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>
    
    <body>
        <style>
            #elem-container{
                margin: 0 auto;
                margin-top: 2%;
                width: 400px;
            }

            table, th, td, tr{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                text-align: center;
            }

            .stash{
                text-align: center;
                text-transform: uppercase;
                font-size: 2.5vw;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                margin-top: 2%;
            }
        </style>

        <?php require('./require_nav.php'); ?>
        <p class='stash'>Cagnotte : <?php echo $_SESSION['stash'];?>€</p>
        <div id='elem-container'>
            <table>
                <tr><th>Nom de l'element</th><th>Quantite</th></tr>
                <?php 
                    $i = 0;
                    $elem = getCustomersElementsExtraction($_SESSION['login']);
                    $qte = getCustomersQteElementsExtraction($_SESSION['login']);
                    $nb = count($elem);

                    while($i != $nb){
                        echo "<tr>"."<td>".$elem[$i]."</td>"."<td>".$qte[$i]." mg</td>"."</tr>";
                        $i++;
                    }
                ?>
            </table>
            <form style="margin-top: 10%;">
                <button class='btn-request' type='submit' formaction='./showHistorySells.php'>Consulter l'historique de vos ventes</button>
                <button style='margin-top: 3.5%;' class='btn-request' onsubmit='./process/showHistoryBuy.php'>Consulter l'historique de vos ventes</button>
            <form>
        </div>
    </body>
</html>