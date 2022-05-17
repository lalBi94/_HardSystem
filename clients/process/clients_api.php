<?php 
    function getLoginId($login){ //extrait id du login
        require("../../db/db_connect.php");
        $req_id = mysqli_query($db, "select id from customer where login='$login'");
        if(!$req_id){
            echo "erreur de la fonction getLoginId()";
            return false;
        }
        $fetch = mysqli_fetch_assoc($req_id);

        return $fetch['id'];
    }

    function getLogin($id){ //exrtait le login
        require("../../db/db_connect.php");
        $req_login = mysqli_query($db, "select login from customer where id='$id'");
        if(!$req_login){
            echo "erreur de la fonction getLogin()";
            return false;
        }
        $fetch = mysqli_fetch_assoc($req_login);
        
        return $fetch['login'];
    }

    function getStash($login){ //extrait la cagnotte(stash)
        require("../../db/db_connect.php");
        $req_id = mysqli_query($db, "select stash from customer where login='$login'");
        if(!$req_id){
            echo "erreur de la fonction getStash()";
            return false;
        }
        $fetch = mysqli_fetch_assoc($req_id);

        return $fetch['stash'];
    }

    function getNom($login){ //extrait firstname
        require("../../db/db_connect.php");
        $id = getLoginId($login);

        $req_name = mysqli_query($db, "select firstname from customerprotecteddata where id='$id'");
        if(!$req_name){
            echo "erreur de la fonction getNom()";
            return false;
        }

        $fetch = mysqli_fetch_assoc($req_name);

        return $fetch['firstname'];
    }

    function getPrenom($login){ //extrait surname
        require("../../db/db_connect.php");
        $id = getLoginId($login);

        $req_name = mysqli_query($db, "select surname from customerprotecteddata where id='$id'");
        if(!$req_name){
            echo "erreur de la fonction getPrenom()";
            return false;
        }

        $fetch = mysqli_fetch_assoc($req_name);

        return $fetch['surname'];
    }

    function getEmail($login){ //extrait email
        require("../../db/db_connect.php");
        $id = getLoginId($login);

        $req_email = mysqli_query($db, "select email from customerprotecteddata where id='$id'");
        if(!$req_email){
            echo "erreur de la fonction getEmail()";
            return false;
        }
        $fetch = mysqli_fetch_assoc($req_email);

        return $fetch['email'];
    }

    function getCustomersElementsExtraction($login){ //extrait les elements qu'il a extrait depuis un objet (nom + qte)
        require("../../db/db_connect.php");
        $id = getLoginId($login);
        
        $req_extract = mysqli_query($db, "select M.name from mendeleiev M, customerextraction E where E.element=M.Z and E.Customer='$id'");
        if(!$req_extract){
            echo "Erreur de la fonction getCustomersElementsExtraction()";
            return false;
        } if(mysqli_num_rows($req_extract) == 0){
            echo "Aucun Element extrait";
            return false;
        }
        $stop_while = mysqli_num_rows($req_extract);
        $foo;
        $i = 0;

        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req_extract)){
                $foo[$i] = $fetch['name']/*. " ".$fetch['quantity']. "mg"*/;
                $i++;
            }
        }

        return $foo;
    }

    function getCustomersQteElementsExtraction($login){ //extrait les elements qu'il a extrait depuis un objet (nom + qte)
        require("../../db/db_connect.php");
        $id = getLoginId($login);
        
        $req_extract = mysqli_query($db, "select E.quantity from mendeleiev M, customerextraction E where E.element=M.Z and E.Customer='$id'");
        if(!$req_extract){
            echo "Erreur de la fonction getCustomersElementsExtraction()";
            return false;
        } if(mysqli_num_rows($req_extract) == 0){
            echo "Aucun Element extrait";
            return false;
        }
        $stop_while = mysqli_num_rows($req_extract);
        $foo;
        $i = 0;

        while($i != $stop_while){
            while($fetch = mysqli_fetch_assoc($req_extract)){
                $foo[$i] = $fetch['quantity']/*. " ".$fetch['quantity']. "mg"*/;
                $i++;
            }
        }

        return $foo;
    }
?>