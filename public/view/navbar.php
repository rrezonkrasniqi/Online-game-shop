<script src="../js/navbar.js"></script>

<nav class="navbar">
    <div class="main-container">
        <div class="topnav" id="myTopnav">
            
            <img src="http://localhost/Online-game-shop/public/images/logo.png" alt="" class="navlogo" />
            <a href="/Online-game-shop/public/index.php">Home</a>
            <a href="/Online-game-shop/public/view/news.php">News</a>
            <a href="/Online-game-shop/public/view/contact.php">Contact</a>
            <a href="/Online-game-shop/public/view/About.php">About</a>
            <a href="/Online-game-shop/public/view/games.php">Games</a>
            <?php    
                session_start();

            if (isset($_SESSION["user"])) {
                    if ($_SESSION["user"]["role"] == 1) {
                        echo "<a href=\"/Online-game-shop/public/view/owned-games.php\" >My Games</a>";
             
                    }}
                    

             echo "<div class=\"user-actions\">";
              

                if (isset($_SESSION["user"])) {
                    if ($_SESSION["user"]["role"] == 1) {
                        echo $_SESSION["user"]["balance"];
                        echo"$";
                        echo "<a href=\"/Online-game-shop/public/view/cart.php\" class=\"cart-link\">
                       <img src=\"http://localhost/Online-game-shop/public/images/cart.svg\" class=\"cart\" /></a>";

                    }
                    if ($_SESSION["user"]["role"] == 2) {
                        echo "<a href=\"/Online-game-shop/public/view/Admin/home.php\" class=\"panel-link\">Admin Panel</a>";
                    }
                    if ($_SESSION["user"]["role"] == 3) {
                        echo "<a href=\"/Online-game-shop/public/view/Admin/journalist-panel.php\" class=\"panel-link\">Journalist Panel</a>";
                    }
                    $username = $_SESSION["user"]["username"];
                    echo "<a href=\"/Online-game-shop/src/controller/session_destroyer.php\">Logout</a>";
                    echo "<span class='username'>$username</span>";
                    echo "<img src=\"http://localhost/Online-game-shop/public/images/avatar.jpg\" class=\"avatar\" />";
                } else {
                    echo "<a href=\"/Online-game-shop/public/view/Authentication/login.php\">Login</a>";
                }
                ?>
            </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="menu"><img src="http://localhost/Online-game-shop/public/images/menu.svg" class="menu-icon" /></i>
            </a>
        </div>
    </div>
</nav>
