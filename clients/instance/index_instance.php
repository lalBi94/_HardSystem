<?php 
    session_start();
    require("../process/clients_api.php"); 
    if(!isset($_SESSION['id_client'])){
        header ("location: ../eClientLogin.php");
        die;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require('./require_head.php'); ?>
    </head>
    
    <body>
        <style>
            .welcome{
                text-align: center;
                text-transform: uppercase;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                font-size: 2vw;
            }

            #main-container{
                margin-top: 13%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                text-align: center;
            }

            #main-container p{
                font-size: 2.6vw;
                font-weight: bold;
                font-family: 'Courier New', Courier, monospace;
                text-transform: uppercase;
                margin-bottom: 2%;
            }
            
            #main-container .main-items2{
                font-size: 2vw;
            }

            .btn-acc{
                font-weight: bold;
                background-color: #ffe72c;
                color: #0a1b2f;
                border: none;
                border-radius: 2.3px;
                padding: 1%;
                font-size: 1.15vw;
            }

            .btn-acc:hover{
                transform: scale(1.1);
                transition: 0.3s;
            }
        </style>

        <?php require('./require_nav.php'); ?>

        <div id="main-container">
            <p class="text" class="main-items1">Content de vous voir <?php echo $_SESSION['login'];?> !</p>
            
            <form>
                <button class="btn-acc" class="main-items2" type="submit" formaction="./account_info.php">Consulter votre activite</button>
            <form>
        </div>
        
    </body>
</html>