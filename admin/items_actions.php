<?php require("../db/db_connect.php") ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Admin</title>

        <link rel="stylesheet" href="../style/all.css">
        <link rel="stylesheet" href="../style/nav.css">
        <link rel="stylesheet" href="../style/contact/contact.css">
        <link rel="stylesheet" href="../style/eClient/eClient.css">
        <link rel="icon" href="../assets/logos/favicon.svg">

        <meta charset="UTF-8">
        <meta owner="Bilal">
    </head>

    <body>
    <header>
            <nav id="nav-container">
                <ul id="nav-menu-container">
                    <a class ="nav-item" href="../index.php"><img class="image-logo" src="../assets/logos/nav-con.png"></a>
                    <li class="nav-item"><a href="#">Achat</a></li>
                    <li class="nav-item"><a href="#">Vente</a></li>
                    <li class="nav-item"><a href="../clients/eClientLogin.php">Connexion</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form style="margin-top: -1%;" class="form-1" action="./process/addItem.php" method="post">
                <h3 class="text">Creation item -></h1><br><br>
                    <label for="email" style="font-weight: bold;">Nom de l'item
                        <input class="fields-box-email" type="text" name="item"><br><br><br><br>

                    <p>Element(s) max. 5</p><br>
                        <div id='options'>
                        </div><br>

                    <p>Qte en MG</p><br>
                        <div id='qte'>
                        </div><br>
                    <input id='btn-add-elem' class='btn-request' type='button' value='Ajouter les elements' onClick='addChildItem();'><br><br>

                    <label for="nbElem" style="font-weight: bold;">Nombre d'element total ?
                        <input class="fields-box-email" type="number" name="nbElem"><br><br><br><br>

                        <p>Information sur l'item max. 5</p><br>
                        <div id="desc">
                        </div><br>
                    <input id='btn-add-desc' class='btn-request' type='button' value='Ajouter une information' onClick='addDesc();'><br><br> 
                    
                    <label for="nbDesc" style="font-weight: bold;">Nombre de descriptions total ?
                        <input class="fields-box-email" type="number" name="nbDesc"><br><br><br><br>
                    
                <input class='btn-request' type="submit" value="Creer l'item !">
            </form>

            <script src='./function/addChildItem.js'></script>
        </main>
    </body>
</html> 