<?php 
    function getNbItem(){ //nombre total d'item
        require("../../db/db_connect.php");
        $req_nb = mysqli_query($db, "select * from typeitem");
        if(!$req_nb){
            echo "erreur dans la fonction getNbItem()";
            return false;
        }

        $nb = mysqli_num_rows($req_nb);
        return $nb;
    }

    function getItemId($item){ //id de l'item
        require("../../db/db_connect.php");
        $req_id = mysqli_query($db, "select id from typeitem where name='$item'");
        if(!$req_id){
            echo "erreur dans la fonction getItemId()";
            return false;
        }

        $fetch = mysqli_fetch_assoc($req_id);
        return $fetch['id'];
    }

    function getItemName($id){ //nom de l'item avec id
        require("../../db/db_connect.php");
        $req_id = mysqli_query($db, "select name from typeitem where id='$id'");
        if(!$req_id){
            echo "erreur dans la fonction getItemId()";
            return false;
        }

        $fetch = mysqli_fetch_assoc($req_id);
        return $fetch['name'];
    }

    function getAllItemName($id){ //nom de l'item via id
        require("../../db/db_connect.php");
        $req_name = mysqli_query($db, "select id,  from typeitem where id='$id'");
        if(!$req_name){
            echo "erreur dans la fonction getAllItemName()";
            return false;
        }

        $fetch = mysqli_fetch_qssoc($req_name);
        return $fetch['name'];
    }

    function getAllNameSellItemsUser($login){ //a utilier avec getItemName()
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req_get = mysqli_query($db, "select item from customersell where client='$id_client'");
        if(!$req_get){
            echo "erreur dans la fonction getAllNameSellItemsUser()";
            return false;
        }

        $foo;
        $stop_while = mysqli_num_rows($req_get);
        $i = 0;
        
        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req_get)){
                $foo[$i] = $fetch['item'];
                $i++;
            }
        }

        return $foo;
    }

    function getAllSellIdsUser($login){
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select nsell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllSellIdsUser()";
            return false;
        }

        $foo;
        $stop_while = mysqli_num_rows($req);
        $i = 0;
        
        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req)){
                $foo[$i] = $fetch['nsell'];
                $i++;
            }
        }

        return $foo;
    }

    function getAllQuantityItemsSellUser($login){
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select quantity from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllQuantityItemsSellUser()";
            return false;
        }

        $foo;
        $stop_while = mysqli_num_rows($req);
        $i = 0;
        
        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req)){
                $foo[$i] = $fetch['quantity'];
                $i++;
            }
        }

        return $foo;
    }

    function getAllDateItemsSellUser($login){
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select date_sell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllDateItemsSellUser()";
            return false;
        }

        $foo;
        $stop_while = mysqli_num_rows($req);
        $i = 0;
        
        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req)){
                $foo[$i] = $fetch['date_sell'];
                $i++;
            }
        }

        return $foo;
    }

    function getAllTimeItemsSellUser($login){
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select time_sell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllTimeItemsSellUser()";
            return false;
        }

        $foo;
        $stop_while = mysqli_num_rows($req);
        $i = 0;
        
        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req)){
                $foo[$i] = $fetch['time_sell'];
                $i++;
            }
        }

        return $foo;
    }
?>