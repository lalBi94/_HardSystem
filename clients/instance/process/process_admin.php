<?php 
    session_start();
    require("../../../db/db_connect.php");

    $nom = $_POST['name'];
    $prix = $_POST['price'];
    $elem = $_POST['elem'];
    $qte = $_POST['qte'];
    $img = $_POST['url'];
    $attribut = $_POST['attrib'];
    $valAtribut = $_POST['desc'];
    $catego = $_POST['categorie'];

    $check = mysqli_query($db, "select name from typeitem where name='$nom'");
    if(mysqli_num_rows($check) != 0){
        echo "Item deja present !";
        die;
    } 

    $insert_inTypeItem = mysqli_query($db, "insert into typeitem(name, price, cat) values('$nom', $prix, $catego)");
    if(!$insert_inTypeItem){
        echo "Echec de l'ajout dans typeitem.";
        die;
    }

    $getID = mysqli_query($db, "select id from typeitem where name='$nom'");
    if(!$getID){
        echo "Echec de la recup de l'id dans typeitem.";
        die;
    } 

    $fetch_id = mysqli_fetch_assoc($getID);
    $id_item = $fetch_id['id'];

    $insert_inPicture = mysqli_query($db, "insert into picture(item, url) values($id_item, '$img')");
    if(!$insert_inPicture){
        echo "Echec de l'ajout de l'image dans picture";
        die;
    }
    
    if($elem != 0 and $qte != 0){
        $insert_inExtractionfromtypeitem = mysqli_query($db, "insert into extractionfromtypeitem values($id_item, $elem, $qte)"); //point mort
        if(!$insert_inExtractionfromtypeitem){
            echo "Echec de l'ajout dans extractionfromtypeitem";
            die;
        }
    }
    
    $insert_inTypeitemdetails = mysqli_query($db, "insert into typeitemdetails values($id_item, '$attribut', '$valAtribut')");
    if(!$insert_inTypeitemdetails){
        echo "Echec de l'ajout dans typeitemdetails";
        die;
    }

    echo "Item cree !";
?>