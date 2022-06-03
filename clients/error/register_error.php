<?php 
    session_start();
?>

<html>
    <head>
        <?php require("./error-head.php"); ?>
    </head>

    <body>
        <?php require("./error-nav.php"); ?>
        <style>
            main #whenRequestSend{
                margin: 0 auto;
                margin-top: 4%;
                width: 61rem;
                font-size: 2rem;
                text-align: center;
                font-family: 'Courier New', Courier, monospace;
            }

            main .failure_msg{
                margin-top: 2vw;
            }

            main .homepage_return{
                border: 1px solid #0a1b2f; 
                border-radius: 5px;
                background: #0a1b2f;
                padding: 9px; 
                text-decoration: none;
                color: white;
                margin-top: 10%;
            }

            main .gif_request{
                width: 150px;
                height: auto;
            }
        </style>

        <main>
            <?php
                echo "<div id='whenRequestSend'>";
                echo "<img class='gif_request' src='../../assets/request_send/false_request.gif' alt='Request send !'></img>";
                echo "<p class='failure_msg'>
                Il y a un probleme lors de l'inscription au site<br>
                </br>Contactez <b>l'equipe</b>! <br><br><b>Email</b> : equipe@hard-system.fr<br></h1><br>";
                echo "<div class='homepage_link'>";
                echo "<form>";
                echo "<button class='btn-request' formaction='../eClientRegister.php'>Ressayer</button>";
                echo "</form>";
                echo "</div>";
            ?>
        </main>
    </body>
</html>