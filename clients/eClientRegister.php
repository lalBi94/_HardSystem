<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Inscription</title>

        <link rel="stylesheet" href="../style/all.css">
        <link rel="stylesheet" href="../style/nav.css">
        <link rel="stylesheet" href="../style/contact/contact.css">
        <link rel="stylesheet" href="../style/eClient/eClient.css">
        <link rel="stylesheet" href="../style/footer.css">

        <link rel="icon" href="../assets/logos/favicon.svg">

        <meta charset="UTF-8">
        <meta owner="Bilal">
    </head>

    <body>
        <style>
            .cgu-link{
                color: #0a1b2f;
                text-decoration: none;
            }
        </style>

        <header>
            <nav id="nav-container">
                <ul id="nav-menu-container">
                    <a class ="nav-item" href="../index.php"><img class="image-logo" src="../assets/logos/nav-con.png"></a>
                    <li class="nav-item"><a href="./eClientLogin.php">Connexion</a></li>
                    <li class="nav-item"><a href="./eClientRegister.php">Inscription</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <form class="form-1" action="./process/register.php"  method="post" onsubmit="return register_checker();">
                <label class="text" class="emailRequest" for="email"><b>E-mail :</label><br>
                <input id="init-email" class="fields-box-email" type="email" name="email"><br><br>

                <label class="text" class="emailRequest" for="pseudo"><b>Pseudo :</label><br>
                <input id="init-pseudo" class="fields-box-email" type="text" name="pseudo"><br><br>

                <label class="text" class="emailRequest" for="nom"><b>Nom : </b><br></label>
                <input id="init-nom" class="fields-box-email" type="text" name="nom"><br><br>

                <label class="text" class="emailRequest" for="prenom"><b>Prenom : </b><br></label>
                <input id="init-prenom" class="fields-box-email" type="text" name="prenom"><br><br>

                <input id="cgu" class="checkbox" type="checkbox" name="CGU" value='0'>
                <label class="text" for="CGU"><b>Accepter les <a href="../assets/cgu/CGU-Hard-System.fr.pdf" style="color: #0a1b2f;">CGU</a></b></label><br><br><br>
                
                <input class="btn-request" type="submit" value="S'inscrire"><br><br>
            </form>

            <script src="./process/check_info.js"></script>
        </main>

        <footer>
            <p>Copyright © 1999-2022 Hard-System. Tous droits réservés.</p>
        </footer>
    </body>
</html>