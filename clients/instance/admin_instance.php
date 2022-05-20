<?php 
    session_start();
    require("../process/clients_api.php");
    require("../process/items_api.php");
    require("../process/admin_api.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require("./require_head.php"); ?>
    </head>
    <body>
        <?php require("./require_nav.php"); ?>
    </body>
</html>