<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Connexion</title>

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
                    <li class="nav-item"><a href="./eClientLogin.php">Connexion</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form class="form-1" action="./process/login.php" method="post" onsubmit="return checkeur_login();">
                <label class="text" class="emailRequest" for="pseudo"><b>Utilisateur : </b><br><br></label>
                <input id="init-pseudo" class="fields-box-email" type="text" name="pseudo"><br><br><br>

                <input class="btn-request" type="submit" value="Connexion">
            </form>

            <script src="./process/check_info.js"></script>
        </main>
    </body>
</html>