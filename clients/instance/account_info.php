<?php 
    session_start(); 
    require("../../db/db_connect.php");
    require("../process/clients_api.php"); //connexion a l'api cliente
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_head.php" ?>
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
                background: white;
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

        <?php require('./require_nav.php'); //requiere le fichier "./require_nav.php" ?>
        <p class='stash'>Cagnotte : 
            <?php 
                $id = $_SESSION['id_client'];
                $stash = mysqli_query($db, "select stash from customer where id='$id'");
                $cagnotte = mysqli_fetch_assoc($stash);
                echo $cagnotte['stash'];
            ?>
        €</p>
        <div id='elem-container'>
                <?php 
                    $i = 0;
                    $elem = getCustomersElementsExtraction($_SESSION['login']); //liste dans un tableau la liste des elements extrait par l'user
                    if(!$elem){
                        echo "<form style='margin-top: 10%;'>";
                        echo "<button class='btn-request' type='submit' formaction='./showHistorySells.php'>Consulter l'historique de vos ventes</button>";
                        echo "</form>";
                        die;
                    }

                    echo "<table><tr><th>Nom de l'element</th><th>Quantite</th><th>Rapport</th></tr>";

                    $qte = getCustomersQteElementsExtraction($_SESSION['login']); //liste dans un tableau la liste en mg la qte des elements extrait par l'user
                    $nb = count($elem); //pour stop la boucle

                    while($i != $nb){
                        echo "<tr>"."<td>".$elem[$i]."</td>"."<td>".$qte[$i]." mg</td>"."</tr>"; //liste les elements
                        $i++;
                    }
                ?>
            </table>
            <form style="margin-top: 10%;">
                <button class='btn-request' type='submit' formaction='./showHistorySells.php'>Consulter l'historique de vos ventes</button>
                <button style='margin-top: 3.5%;' class='btn-request' formaction='./process/showHistoryBuy.php'>Consulter l'historique de vos achats</button>
                <?php 
                    if($_SESSION['perm'] == 1){ //si le login est admin, afficher ce boutton en fin de page
                        echo "<button style='margin-top: 2%;' class='btn-request' type='submit' formaction='./admin_instance.php'>Acceder a l'Admin Panel</button>";
                        die;
                    }
                ?>
            <form>
        </div>
    </body>
</html>