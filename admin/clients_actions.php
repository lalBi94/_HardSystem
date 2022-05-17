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
            <form style="margin-top: -1%;" class="form-1" action="./process/addClient.php" method="post">
                <h3 class="text">Creation utilisateur -></h1><br><br>
                    <label for="email">Email
                        <input class="fields-box-email" type="email" name="email"><br><br>

                    <label for="login">Utilisateur
                        <input class="fields-box-email" type="text" name="login"><br><br>

                    <label for="name">Prenom
                        <input class="fields-box-email" type="text" name="name"><br><br>

                    <label for="firstname">Nom
                        <input class="fields-box-email" type="text" name="firstname"><br><br><br>
                    
                <input class='btn-request' type="submit" value="Cree le client !">
            </form>

            <form style="margin-top: 5%;" action="./process/modifClient.php" method="post">
                <h3 class="text">Modification sur utilisateur -></h1><br><br>
                    <label for="usermodif">Utilisateur en question ?
                        <input class="fields-box-email" type="text" name="usermodif"><br><br>
                    
                    <label for="what"> Quoi modifier ?
                        <select name="what">
                            <option value="surname">Prenom</option>
                            <option value="firstname">Nom</option>
                            <option value="email">Email</option>
                        </select><br><br>
                    
                    <label for="byWhat">Par quoi ?
                        <input class="fields-box-email" type="text" name="byWhat">

                <br><br><br><input class='btn-request' type="submit" value="Modifier !">
            </form>

            <form style="margin-top: 5%;" action="./process/delClient.php" method="post">
                <h3 class="text">Supression d'un utilisateur -> EN DEVELOPPEMENT</h1><br><br>
                    <label for="client">Qui voulait vous rayer de la bdd ?
                        <input class="fields-box-email" type="text" name="client"><br><br><br>

                <input class='btn-request' type="submit" value="Supprimer !">
            </form>
        </main>
    </body>
</html> 