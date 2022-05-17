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
        <style>
            #components{
                display: flex;
                justify-content: center;
            }
        </style>

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
            <div id="components">
                <form>
                    <button class="btn-request" class="main-items2" type="submit" formaction="./clients_actions.php">Actions sur clients</button>
                    <button class="btn-request" class="main-items2" type="submit" formaction="./items_actions.php">Actions sur items</button>
                </form>
            </div>
        </main>
    </body>
</html> 
