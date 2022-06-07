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

    function getNbItemPerSelect(){ //nombre total d'item
        require("../../db/db_connect.php");
        $req_nb = mysqli_query($db, "select id, name from typeitem");
        if(!$req_nb){
            echo "erreur dans la fonction getNbItemPerSelect()";
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
        if(!$id_client){
            echo "erreur de la recup du client";
        }

        $req_get = mysqli_query($db, "select item from customersell where client='$id_client'");
        if(!$req_get){
            echo "erreur dans la fonction getAllNameSellItemsUser()";
            return false;
        }

        $foo = array();
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

    function getAllSellIdsUser($login){ //extrait le nsell de la vente de l'user
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select nsell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllSellIdsUser()";
            return false;
        }

        $foo = array();
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

    function getAllQuantityItemsSellUser($login){ //extrait la quantity de la vente de l'user
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select quantity from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllQuantityItemsSellUser()";
            return false;
        }

        $foo = array();
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

    function getAllDateItemsSellUser($login){ //extrait la date de la vente de l'user
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select date_sell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllDateItemsSellUser()";
            return false;
        }

        $foo = array();
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

    function getAllTimeItemsSellUser($login){ //extrait l'heure minute seconde de la vente de l'user
        require("../../db/db_connect.php");
        $id_client = getLoginId($login);

        $req = mysqli_query($db, "select time_sell from customersell where client='$id_client'");
        if(!$req){
            echo "echec de la fonction getAllTimeItemsSellUser()";
            return false;
        }

        $foo = array();
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

    function getTheAllOfNameItemFrom($byWho){ //recuperer le nom de tous les items
        require("../../db/db_connect.php");

        $foo;
        $i = 0;

        $to_get = mysqli_query($db, "select name from typeitem where byWho=$byWho");
        if(!$to_get){
            echo "echec de la fonction getTheAllOfNameItem()";
            return false;
        }

        if(mysqli_num_rows($to_get) == 0){
            echo "<p style='text-align: center;'>Aucun appareil a vendre !</p>";
            die;
        }

        $stop_while = mysqli_num_rows($to_get);

        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($to_get)){
                $foo[$i] = $fetch['name'];
                $i++;
            }
        }

        return $foo;
    }

    function getAllItemFromCat($cat){
        require("../../db/db_connect.php");

        $foo;
        $i = 0;

        $to_get = mysqli_query($db, "select name from typeitem where cat='$cat'");
        if(!$to_get){
            echo "echec de la fonction getAllItemFromCat()";
            return false;
        }

        if(mysqli_num_rows($to_get) == 0){
            echo "<p style='text-align: center;'>Aucun appareil a vendre !</p>";
            die;
        }

        $stop_while = mysqli_num_rows($to_get);

        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($to_get)){
                $foo[$i] = $fetch['name'];
                $i++;
            }
        }

        return $foo;
    }

    function getPicture($id){ //recupere l'image sous forme d'url de typeitem(id) rentree en parametre
        require("../../db/db_connect.php");
        
        $to_get = mysqli_query($db, "select url from picture where item='$id'");
        if(!$to_get){
            echo "probleme dans getPicture()";
            die;
        }

        $fetch = mysqli_fetch_assoc($to_get);
        
        return $fetch['url'];
    }

    function getUserSeller($id){ //recuperer le vendeur d'un item par son id
        require("../../db/db_connect.php");
        $user_req = mysqli_query($db, "select C.login from customer C, customersell S where C.id=S.client and S.item='$id'");
        if(!$user_req){
            echo "probleme dans getUserSeller()";
            die;
        }

        $fetch = mysqli_fetch_assoc($user_req);

        return $fetch['login'];
    }

    function purgeTab($thecart){ //permet de supprimer toutes les cases vides de la variable de session contenant le panier
        $i = 0;
        $count = count($thecart);

        while($i <= $count){
            if($thecart[$i] == NULL || $thecart[$i] == "" || $thecart[$i] == " " || empty($thecart[$i])){
                unset($thecart[$i]);
                $i++;
            } else{
                $i++;
            }
        }

        return $thecart;
    }

    function getPriceInTypeItem($id){ //extrait le prix d'un item par son id
        require("../../db/db_connect.php");
        
        $req = mysqli_query($db, "select price from typeitem where id='$id'");
        if(!$req){
            echo "probleme dans getPriceInTypeItem()";
            die;
        }

        $fetch = mysqli_fetch_assoc($req);
        
        return $fetch['price'];
    }
?>