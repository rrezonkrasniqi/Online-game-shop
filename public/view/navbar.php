<!-- Navbar -->
<nav class="navbar">
    <div class="main-container">
        <div class="topnav" id="myTopnav">
            <img src="images/logo.png" alt="" class="navlogo" />
            <a href="../index.php">Home</a>
            <a href="news.php">News</a>
            <a href="contact.php">Contact</a>
            <a href="About.php">About</a>
            <a href="games.php">Games</a>

            <?php
            session_start();

            if (isset($_SESSION["user"])) {
                if ($_SESSION["user"]["role"] == 2) {
                    echo"ADMIN";
                }
                $username = $_SESSION["user"]["username"];
                echo "<a href=\"../src/controller/session_destroyer.php\">logout</a>";

                echo "$username";
            } else {
                echo "<a href=\"./view/Authentication/login.php\">Login</a>";
            }
            ?>


            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="menu"><img src="../images/menu.svg" class="menu-icon" /></i>
            </a>
        </div>
    </div>
</nav>