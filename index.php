<!DOCTYPE html>
<html>
    <head>
        <title>Hard System - Accueil</title>

        <link rel="stylesheet" href="./style/all.css">
        <link rel="stylesheet" href="./style/nav.css">
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
                    <li class="nav-item"><a href="#">Achat</a></li>
                    <li class="nav-item"><a href="#">Vente</a></li>
                    <li class="nav-item"><a href="./clients/eClientLogin.php">Connexion</a></li>
                </ul>
            </nav>
        </header>
        
        <main>
            <!-- <form>
                <button class='btn-request' type='submit' formaction='./admin/adminPanel.php'>Cliquez ici acceder au peanneau d&#39;admin</button>
            </form> -->
            
            <div id="main-container">
                <p class="text" class="main-items1">Bienvenue sur <br>Hard System</p>
                
                <form>
                    <button class="btn-request" class="main-items2" type="submit" formaction="./clients/eClientLogin.php">Connectez-vous !</button>
                <form>
                <!-- <form>
                    <button class="btn-request" class="main-items2" type="submit" formaction="./admin/admin.php">Admin Panel</button>
                </form> -->
            </div>
        </main>
    </body>
</html>