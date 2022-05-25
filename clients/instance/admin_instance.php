<?php 
    session_start();
    require("../process/clients_api.php");
    require("../process/items_api.php");
    require("../process/admin_api.php");
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    } if($_SESSION['perm'] != 1){
        header ('location: ./index_instance.php');
        die;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require("./require_head.php"); ?>
    </head>
    <body>
        <?php require("./require_nav.php"); ?>
        <form action='./process/process_admin.php' method='post'>
            <input type="text" name='name' placeholder="Nom de l'item">
            <input type="number" name='price' placeholder='prix'>
            <input type="number" name='elem' placeholder='id de Elem - Si plusieurs, ajouter le en bas'>
            <input type="number" name='qte' placeholder='qte extrait par lelem'>
            <input type="text" name='url' placeholder='url de limage de lobjet'>
            <input type='text' name='desc' placeholder='details'>

            <input type="submit" value='Ajouter !'>
        </form><br>
    </body>
</html>