<?php 
    require("../../db/db_connect.php"); //connexion a la bdd
    require("../process/clients_api.php"); //connexion a l'api cliente

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    
    $conflogin = mysqli_query($db, "select login from customer where login='$pseudo'");
    if(mysqli_num_rows($conflogin) >= 1){ //si le nombre de ligne est egal ou superieur a 1 (meme si inutile < 1), client deja existant
        header ("location: ../error/register_clientExist.php");
        die;
    }

    $emailconf = mysqli_query($db, "select email from customerprotecteddata where email='$email'");
    if(mysqli_num_rows($emailconf) >= 1){ //si le nombre de ligne est egal ou superieur a 1 (meme si inutile < 1), client deja existant
        header ("location: ../error/register_clientExist.php");
        die;
    } 

    $insertInCustomer = mysqli_query($db, "insert into customer(login, stash, permission) values('$pseudo', 0, 2)"); //insertion des variables + (0) dans customer
    if(!$insertInCustomer){
        header ("location: ../error/register_error.php");
        die;
    }

    $getId = mysqli_query($db, "select id from customer where login='$pseudo'"); //recuperer l'id du login dans customer
    if(!$getId){
        header ("location: ../error/register_error.php");
        die;
    }

    $fetch = mysqli_fetch_assoc($getId);
    $id = $fetch['id'];
    $insertInCustomerextdata = mysqli_query($db, "insert into customerprotecteddata values($id, '$prenom', '$nom', '$email')"); //insertion des variables dans customerprotecteddata
    if(!$insertInCustomerextdata){
        header ("location: ../error/register_error.php");
        die;
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='../../style/all.css'>
        <link rel='stylesheet' href='../../style/nav.css'>
        <link rel='stylesheet' href='../../style/footer.css'>
    </head>

    <body>
        <style>
            main #whenRequestSend{
                margin: 0 auto;
                margin-top: 4%;
                width: 61rem;
                font-size: 2rem;
                text-align: center;
                font-family: 'Courier New', Courier, monospace;
            }

            main .failure_msg{
                margin-top: 2vw;
            }

            main .homepage_return{
                border: 1px solid #0a1b2f; 
                border-radius: 5px;
                background: #0a1b2f;
                padding: 9px; 
                text-decoration: none;
                color: white;
                margin-top: 10%;
            }

            main .gif_request{
                width: 150px;
                height: auto;
            }

            main .adresse{
                background: #ffe72c;
                border-radius: 4px;
                padding: 2%;
                font-size: 1.1vw;
                text-align: center;
                color: #0a1b2f;
            }

            main .adresse:hover{
                transform: scale(1.05);
                transition: 0.5s;
            }

            main .ad{
                background: #0a1b2f;
                border-radius: 4px;
                color: white;
                padding: 5px;
            }

            main .glglink{
                text-decoration: none;
                color: white;
            }
        </style>

        <header>
            <nav id="nav-container">
                <ul id="nav-menu-container">
                    <a class ="nav-item" href="../../index_instance.php"><img class="image-logo" src="../../assets/logos/nav-con.png"></a>
                </ul>
            </nav>
        </header>

        <main>
            <?php
                echo "<div id='whenRequestSend'>";
                echo "<img class='gif_request' src='../../assets/request_send/check_request.gif' alt='Request send !'></img>";
                echo "<p class='failure_msg'>Merci de nous avoir rejoints <b>$prenom</b><br><br>";
                echo "<div class='homepage_link'>";
                echo "<form>";
                echo "<button class='btn-request' formaction='../eClientLogin.php'>Connectez-vous des maintenant</button>";
                echo "</form>";
                echo "</div>";
            ?>
        </main>

        <?php require('../instance/require_footer.php'); ?>
    </body>
</html>
