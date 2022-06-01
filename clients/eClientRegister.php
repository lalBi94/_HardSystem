<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Inscription</title>

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
                    <li class="nav-item"><a href="./eClientRegister.php">Inscription</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form style="background: white;" class="form-1" action="./process/register.php" method="post" onsubmit="return checkeur_register();"> <!-- A l'envoie, checkeur_registeur verifie que tout est bien rentre -->
                <label class="text" class="emailRequest" for="nom"><b>Nom : </b><br><br></label>
                <input id="init-nom" class="fields-box-email" type="text" name="nom"><br><br>

                <label class="text" class="emailRequest" for="prenom"><b>Prenom : </b><br><br></label>
                <input id="init-prenom" class="fields-box-email" type="text" name="prenom"><br><br>

                <label class="text" class="emailRequest" for="email"><b>E-mail : </b><br><br></label>
                <input id="init-email" class="fields-box-email" type="text" name="email"><br><br>

                <label class="text" class="emailRequest" for="pseudo"><b>Nom d'utilisateur : </b><br><br></label>
                <input id="init-pseudo" class="fields-box-email" type="text" name="pseudo"><br><br>

                <label class="text" class="emailRequest" for="mdp"><b>Mot de passe : </b><br><br></label>
                <input id="init-mdp" class="fields-box-email" type="text" name="mdp"><br><br>

                <label class="text" class="emailRequest" for="mdpconf"><b>Confirmer le mot de passe : </b><br><br></label>
                <input id="init-mdpconf" class="fields-box-email" type="text" name="mdpconf"><br><br><br>
                
                <label class="text" class="emailRequest" for="cgu"><b>Accepter les <a href='../assets/cgu/CGU-Hard-System.fr.pdf' target='_blank'>CGU</a></b></label>
                <input id="init-cgu" class="accept-cgu" type="checkbox" name="cgu"><br><br><br>

                <input class="btn-request" type="submit" value="Inscription">
            </form>

            <script src="./process/check_info.js"></script>
        </main>
    </body>
</html>