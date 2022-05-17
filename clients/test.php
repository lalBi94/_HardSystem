<?php 
    $api_connect = require('./process/clients_api.php');

    if(!$api_connect){
        echo "api problem";
    }

    $elem = getCustomersElementsExtraction(getLogin(9));
    $nbElem = count($elem);

    echo "<p>Login de 9 : ".getLogin(9)."</p>";
    echo "<p>Id de Bilal : ".getLoginId(getLogin(9))."</p>";
    echo "<p>Nom de Bilal : ".getNom(getLogin(9))."</p>";
    echo "<p>Prenom de Bilal : ".getPrenom(getLogin(9))."</p>";
    echo "<p>Cagnotte de Bilal : ".getStash(getLogin(9))."</p>";
    echo "<p>Email de Bilal : ".getEmail(getLogin(9))."</p>";

    echo "<p>Element Extrait par Bilal : ";
    for($i = 0; $i <= $nbElem-1; $i++){
        echo $elem[$i].", ";
    }
    echo "</p>";
?>