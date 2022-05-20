<?php 
    //require('../../db/db_connect.php');

    function createUser($login, $surname, $firstname, $email){
        require('../../db/db_connect.php');
        $addLogin = mysqli_query($db, "insert into customer(login, stash) values('$login', 0)");
        $addSurFirstnameEmail = mysqli_query($db, "insert into customerprotecteddata(surname, firstname, email) values('$surname', '$firstname', '$email')");
        if(!$addLogin or !$addSurFirstnameEmail){
            echo "echec dans createUser()";
            return false;
        }

        return true;
    }
?>