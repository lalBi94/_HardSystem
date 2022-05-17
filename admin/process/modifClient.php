<?php 
    $connect = require('../../db/db_connect.php');
    if(!$connect){
        echo "echec de la connexion a la bdd";
        die;
    }

    $client = $_POST['usermodif'];
    $opt = $_POST['what'];
    $remplace = $_POST['byWhat'];

    $client_id = mysqli_query($db, "select id from customer where login='$client'");
    if(mysqli_num_rows($client_id) == 0){
        echo "pas d'user trouve";
        echo "<br><a href='../admin.php'>retour en arriere</a>";
        die;
    }

    while($fetch = mysqli_fetch_assoc($client_id)){
        $i = $fetch['id'];
        $req = mysqli_query($db, "update customerprotecteddata set $opt='$remplace' where id=$i");
        if(!$req){
            echo "modif echec";
            echo "<br><a href='../admin.php'>retour en arriere</a>";
            die;
        }

        echo "modif reussite";
        echo "<br><a href='../admin.php'>retour en arriere</a>";
        die;
    }
?>