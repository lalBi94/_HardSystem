<?php 
    $connect = require('../../db/db_connect.php');
    if(!$connect){
        echo "echec de la connexion a la bdd";
        die;
    }

    /*Recup des posts de admin.php*/
    //info compte
    if(empty($_POST['login']) or empty($_POST['email']) or empty($_POST['name']) or empty($_POST['firstname'])){
        echo "il y a des variables vide";
        die;
    }

    $login = $_POST['login'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $firstname = $_POST['firstname'];

    $login_confirm = mysqli_query($db, "select login from customer where login='$login'");
    if(mysqli_num_rows($login_confirm) != 0){
        echo "<p> Client deja existant (dans customer)</p><br>";
        echo "<a href='../admin.php'>retour en arriere</a>";
        die;
    }
    
    $register = mysqli_query($db, "insert into customer (login, stash) values('$login', 0)");
    if(!$register){
        echo "<p> Echec de l'inscription (dans customer)</p><br>";
        echo "<a href='../admin.php'>retour en arriere</a>";
        die;
    } else{
        $confirm = mysqli_query($db, "select id from customer where login='$login'");
        while($fetch = mysqli_fetch_assoc($confirm)){
            $id_customer = $fetch['id'];
            $protectdata = mysqli_query($db, "insert into customerprotecteddata(id, surname, firstname, email) values($id_customer, '$name', '$firstname', '$email')");
            if(!$protectdata){
                echo "<p> Echec de l'inscription (dans customerprotecteddata)</p><br>";
                mysqli_query($db, "delete from customer where login='$login'");
                echo "<a href='../admin.php'>retour en arriere</a>";
                die;
            } else{
                echo "Client cree !";
                echo "<br><a href='../admin.php'>retour en arriere</a>";
                die;
            }
        }
    }

    die;
?>