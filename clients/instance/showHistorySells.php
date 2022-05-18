<?php //a finir
    session_start();
    require('../process/items_api.php');
    require('../process/clients_api.php');
    $connect = require('../../db/db_connect.php');
    if(!$connect){
        echo "erreur liason bdd";
        die;
    }

    $user = getLoginId($_SESSION['login']);
    $name_item = getAllNameSellItemsUser($_SESSION['login']);
    echo "<table>";
    echo "<tr> <th>N. Vente</th> <th>Nom de l'objet</th> <th>Quantite</th> <th>Date</th> <th>Heure</th>";
    $i = 0;
    echo "</table>";

    echo getItemName($name_item[0]);
?>