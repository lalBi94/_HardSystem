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
        <style>
            input{
                box-sizing: border-box;
                border-radius: 4px;
                width: 20vw;
                height: 2vw;
                padding: 1.1%;
                font-size: 1em;
            }
        </style>

        <?php require("./require_nav.php"); ?>
        <div style='margin-top: 2%; text-align: center;'>
            <form action='./process/process_admin.php' method='post'><br><br>
                <h2>Createur d'item</h2><br>
                <input type="text" name='name' placeholder="Nom de l'item"><br><br>
                <input type="number" name='price' placeholder='prix'><br><br>
                <input type="number" name='elem' placeholder='id de Elem - Si plusieurs, ajouter le en bas'><br><br>
                <input type="number" name='qte' placeholder='qte extrait par lelem'><br><br>
                <input type="text" name='url' placeholder='url de limage de lobjet'><br><br>
                <input type='text' name='attrib' placeholder='attribut'><br><br>
                <input type='text' name='desc' placeholder='details de lattribut'><br><br><br>

                <input class='btn-request' type="submit" value='Ajouter l item!'><br><br>
            </form>
        </div>
    </body>
</html>