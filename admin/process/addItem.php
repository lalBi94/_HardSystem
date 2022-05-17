<?php
    $connect = require("../../db/db_connect.php");
    if(!$connect){
        echo "echec de la connexion a la bdd";
        session_unset();
        session_destroy();
        die;
    }

    if(empty($_POST['item']) or empty($_POST['nbElem']) or empty($_POST['nbDesc']) or empty($_POST['option-1']) or empty($_POST['for-1']) /*or empty($_POST['desc-1'])*/){
        echo "Des variables non vide sont vident";
        die;
    } 

    /*Obligatoire*/
    $name_item = $_POST['item'];
    $elem1 = $_POST['option-1'];
    $nbElem = $_POST['nbElem'];
    $qteElem1 = $_POST['for-1']; 
    $desc1 = $_POST['desc-1'];

    /*Non Obligatoire*/
    if(isset($_POST['option-2'])){
        $elem2 = $_POST['option-2'];
        $for2 = $_POST['for-2'];
    } else{
        $elem2 = NULL;
    } if(isset($_POST['option-3'])){
        $elem3 = $_POST['option-3'];
        $for3 = $_POST['for-3'];
    } else{
        $elem3 = NULL;
    } if(isset($_POST['option-4'])){
        $elem4 = $_POST['option-4'];
        $for4 = $_POST['for-4'];
    }else{
        $elem4 = NULL;
    } if(isset($_POST['option-5'])){
        $elem5 = $_POST['option-5'];
        $for5 = $_POST['for-5'];
    } else{
        $elem5 = NULL;
    } 
    
    if(isset($_POST['desc-2'])){
        $desc2 = $_POST['desc-2'];
    } else{
        $desc2 = NULL;
    } if(isset($_POST['desc-3'])){
        $desc3 = $_POST['desc-3'];
    } else{
        $desc3 = NULL;
    } if(isset($_POST['desc-4'])){
        $desc4 = $_POST['desc-4'];
    }else{
        $desc4 = NULL;
    } if(isset($_POST['desc-5'])){
        $desc5 = $_POST['desc-5'];
    } else{
        $desc5 = NULL;
    }

    $check_exist = mysqli_query($db, "select name from typeitem where name='$name_item'");
    if(mysqli_num_rows($check_exist) > 0){
        echo "produit deja existant";
        die;
    }

    if($nbElem == 1){
        $insert_item = mysqli_query($db, "insert into TypeItem(name) values('$name_item')"); //inserssion d'un item dans TypeItem
        if(!$insert_item){
            echo "echec de l'insertion de l'item dans TypeItem";
            die;
        }

        $id_newItem = mysqli_query($db, "select id from TypeItem where name='$name_item'"); //recup id de l'item cree
        $id_itemElem = mysqli_query($db, "select Z from mendeleiev where symbol='$elem1'"); //recup id du premier element pour l'add a l'item dans extractionfromtypeitem
        if(mysqli_num_rows($id_itemElem) == 0){
            echo "L'element : ".$elem1." n'existe pas";
            die;
        }

        while($fetch = mysqli_fetch_assoc($id_newItem) and $fetch2 = mysqli_fetch_assoc($id_itemElem)){
            $id_item = $fetch['id']; //id de l'item
            $id_elem = $fetch2['Z']; //id de l'elem

            $insert_inEFT = mysqli_query($db, "insert into ExtractionFromTypeItem values($id_item, $id_elem, $qteElem1)");
            if(!$insert_inEFT){
                echo "echec de l'sisserstion dans ExtractionFromTypeItem";
                die;
            }
        }
    }

    echo "tout c'est passe comme prevu !";

    die;
?>