<?php 
    session_start(); 
    require("../../db/db_connect.php");
    require("../process/clients_api.php"); //connexion a l'api cliente
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); //requiere le fichier "./require_head.php" ?>
    </head>
    
    <body>
        <?php require('./require_nav.php'); //requiere le fichier "./require_nav.php" ?>

        <style>
            #btn-container{
                display: flex;
                justify-content: center;
                gap: 3%;
            }
        </style>

        <main>
            <h1 style='text-align: center; margin-top: 4%;'>Catalogue Hard System...</h2>
            <form action='./shop_instance.php' method='get' style='margin-top: 2%;'>
                <div id='btn-container'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Ordinateurs'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Tablettes'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Telephones'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Ecrans'>
                    <input type='hidden' name='business' value='false'>
                </div>
        </form>

            <h1 style='text-align: center; margin-top: 8%;'>Catalogue Entreprise...</h2>
            <form action='./shop_instance.php' method='get'>
                <div id='btn-container' style='margin-top: 2%;'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Ordinateurs'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Tablettes'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Telephones'>
                    <input class='btn-request' class='filter' type='submit' name='cat' value='Ecrans'>
                    <input type='hidden' name='business' value='true'>
                </div>
            <form>
        </main>

        <?php 
            //var_dump($_SESSION['cart']);
        ?>

    <?php require('./require_footer.php'); ?>
    </body>
</html>