<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Accueil</title>

        <link rel="stylesheet" href="./style/all.css">
        <link rel="stylesheet" href="./style/nav.css">
        <link rel="stylesheet" href="./style/footer.css">
        
        <link rel="icon" href="./assets/logos/favicon.svg">

        <meta charset="UTF-8">
        <meta owner="Bilal">
    </head>

    <body>
        <style>
            #main-container{
                margin-top: 13%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }

            #main-container p{
                font-size: 3vw;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                margin-bottom: 2%;
            }
            
            #main-container .main-items2{
                font-size: 2vw;
            }
        </style>
    
        <header>
            <nav id="nav-container">
                <ul id="nav-menu-container">
                    <a class ="nav-item" href="./index.php"><img class="image-logo" src="./assets/logos/nav-con.png"></a>
                    <li class="nav-item"><a href="./clients/eClientLogin.php">Connexion</a></li>
                    <li class="nav-item"><a href="./clients/eClientRegister.php">Inscription</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <div id="main-container">
                <p class="text" class="main-items1">Bienvenue sur <br>Hard System</p>
                
                <form>
                    <button class="btn-request" class="main-items2" type="submit" formaction="./clients/eClientLogin.php">Connectez-vous !</button> <!-- Envoie vers la page de connexion -->
                <form>
            </div>
        </main>

        <footer>
            <p>Copyright © 1999-2022 Hard-System. Tous droits réservés.</p>
        </footer>
    </body>
</html>