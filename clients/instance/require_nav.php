<style>
    .btn-dis{
        font-weight: bold;
        background-color: #ffe72c;
        color: #0a1b2f;
        border: none;
        border-radius: 2.3px;
        padding: 6%;
        font-size: 1.15vw;
    }

    .btn-dis:hover{
        transform: scale(1.1);
        transition: 0.3s;
    }

    .account{
        text-transform: uppercase;
        font-weight: bold;
    }

    .account:hover{
        transform: scale(1.1);
        transition: 1s;
        border-bottom: 3px solid #ffe72c;
    }
</style>

<header>
    <nav id="nav-container">
        <ul id="nav-menu-container">
            <a class ="nav-item" href="./index_instance.php"><img class="image-logo" src="../../assets/logos/nav-con.png"></a>
            <li class="nav-item"><a href="#">Achat</a></li>
            <li class="nav-item"><a href="#">Vente</a></li>
            <p style="color: white;">|</p>
            <?php echo "<a class='account' href='./account_info.php' style='color: white; margin-left: 2vw; text-decoration: none;'><b>".$_SESSION['login']."</b></a>"; ?>
            <?php 
                echo "<form style='margin-left: 1.5%; margin-right: 2%'>";
                echo "<button class='btn-dis' type='submit' formaction='../../clients/process/disconnect.php'>"."Deconnexion"."</button>";
                echo "</form>";
            ?>
        </ul>
    </nav>
</header>