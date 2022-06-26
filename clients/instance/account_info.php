<?php 
    session_start(); 
    require("../../db/db_connect.php");
    require("../process/clients_api.php"); //connexion a l'api cliente
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }

    //Donnees a entrer dans le graphique genere par google 
    $current_stash = $_SESSION['stash'];
    $id = $_SESSION['id_client'];
    $go;

    $req_date = mysqli_query($db, "select date_sell, price from customersell where client='$id' order by date_sell, time_sell asc");

    if(!$req_date){
        echo "erreur dans la requete pour date";
        die;
    }

    $nbSell = mysqli_num_rows($req_date);
    if($nbSell == 0){
        $go = false;
    } else{
        $go = true;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_head.php" ?>
    </head>
    
    <body>
        <style>
            #elem-container, #zone-btn, #curve_chart{
                margin: 0 auto;
                width: 400px;
            }

            main{
                margin-bottom: 2%;
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

        <main>
            <div style='margin-top: 2%;' id='elem-container'>
                <?php 
                    $i = 0;
                    $elem = getCustomersElementsExtraction($id); //liste dans un tableau la liste des elements extrait par l'user
                    //var_dump($elem);
                    if($elem == false){
                        echo "Aucun Element extrait";
                    } else{
                        echo "<table><tr><th>Nom de l'element</th><th>Quantite</th></tr>";

                        $qte = getCustomersQteElementsExtraction($_SESSION['login']); //liste dans un tableau la liste en mg la qte des elements extrait par l'user
                        $nb = count($elem); //pour stop la boucle

                        while($i != $nb){
                            echo "<tr>"."<td>".$elem[$i]."</td>"."<td>".$qte[$i]." mg</td>"."</tr>"; //liste les elements
                            $i++;
                        }

                        echo "</table>";
                    }
                ?>
            </div>
            <?php 
                if($_SESSION['stash'] > 0){
                    echo "<div style='width: 1500px; height: 400px;' id='curve_chart'></div>";
                }
            ?>

            <div style='margin-top: 2%;' id='zone-btn'>
                <form>
                    <input class='btn-request' type='submit' formaction='./showHistorySells.php' value="Consulter l'historique de vos ventes"><br><br>
                    <input type='submit' class='btn-request' formaction='./process/showHistoryBuy.php' value="Consulter l'historique de vos achats">
                
                    <?php //Dev Mode
                        if($_SESSION['perm'] == 1){
                            echo "<div class='zone-dev' style='margin-top: 10%; border: 1px solid black; padding: 5%;'>";
                            echo "<h2>Paneau D'administration</h2>";
                            echo "<button style='margin-top: 5%;' class='btn-request' type='submit' formaction='./admin_instance.php'>Acceder au createur d'objet</button><br><br>";
                            echo "<button class='btn-request' type='submit'>Supprimer un utilisateur</button>";
                            echo "</div>";
                        }
                    ?>
                </form>
            </div>
        </main>
            
        <?php require('./require_footer.php'); //requiere le fichier "./require_footer.php" ?> 

        <!-- [DEBUT] Generee par Google Chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Date', 'Gain'],
                        <?php
                            $i = 0;
                            while($fetch = mysqli_fetch_assoc($req_date)){
                                $gain_value = $fetch['price'];
                                echo 
                                "
                                ['$i', $gain_value],
                                ";

                                $i++;

                                if($i == ($nbSell-1)){
                                    echo "['$i', $gain_value],";
                                }
                            }
                        ?>
                    ]);

                    var options = {
                    title: 'Evolution de votre cagnotte dans le temps',
                    curveType: 'function',
                    legend: { 
                        position: 'bottom' 
                    }
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
        </script>
        <!-- [FIN] Generee par Google Chart -->
    </body>
</html>