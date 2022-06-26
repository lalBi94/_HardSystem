<?php 
    session_start();
    require("../process/items_api.php"); 
    if(!isset($_GET['id'])){
        header("location: ../instance/index_instance.php");
        die;
    }

    @$id = $_GET['id'];
    $name = getItemName($id);
    $image = getPicture($id);
    $foo = getAttribute($id);
    $redirectioncatego = getItemCategory($id);
    $cat;

    if(isset($_GET['business'])){
        $getBusiness = $_GET['business'];
    }

    if($redirectioncatego == 1){ 
        $cat = "Tablettes";
    } if($redirectioncatego == 2){ 
        $cat = "Telephones";
    } if($redirectioncatego == 3){ 
        $cat = "Ordinateurs";
    } if($redirectioncatego == 4){ 
        $cat = "Ecrans";
    }
?>

<html>
    <head>
        <link rel='stylesheet' href="../../style/all.css">
        <link rel="icon" href="../../assets/logos/favicon.svg">
        <link rel='stylesheet' href="../../style/nav.css">
        <link rel='stylesheet' href="../../style/footer.css">

        <title>Hard System - <?php echo $name;?></title>
    </head>

    <body>
        <style>
            table, th, td, tr{
                border: 1px solid black;
                border-collapse: collapse;
                padding: 10px;
                text-align: center;
                background: white;
            }
        </style>

        <nav id="nav-container">
            <ul id="nav-menu-container">
                <a class ="nav-item" href="../instance/index_instance.php"><img class="image-logo" src="../../assets/logos/nav-con.png"></a>
            </ul>
        </nav>

        <main style='text-align: center; margin-top: 2%;'>
            <?php 
                if(isset($_SESSION['id_client'])){
                    echo "<form action='../instance/shop_instance.php?' method='get'>";
                    echo "<input class='btn-request' type='submit' value='retour'>";
                    echo "<input type='hidden' name='cat' value='$cat'>";
                    if(isset($_GET['business'])){
                        echo "<input type='hidden' name='business' value='$getBusiness'>";
                    }
                    echo "</form>";
                }
            ?> 

            <?php
                echo "<h1 style='margin-top: 1.3%;'>$name</h1>";

                echo "<img style='margin-top: 1.3%; width: 500px; height: 500px;' src='$image'></img>";
                //var_dump($foo); //Pour test les values du tab

                echo "<table style='margin: 0 auto; margin-top: 2%;'>";
                echo "<tr> <th> Specificites </th> <th> Details </th></tr>";
                foreach($foo as $c => $v){
                    foreach($foo[$c] as $subC => $subV){
                        echo "<tr><td>$subC</td> <td>$subV</td></tr>";
                    }
                }
                echo "</table>";
            ?>
        </main>

        <?php require('../instance/require_footer.php'); ?>
    </body>
</html>

<?php die; ?>