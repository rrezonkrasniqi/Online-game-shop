<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/index.css" />
    <link rel="stylesheet" href="../css/contactUs.css" />

    <link rel="icon" href="http://3.138.55.27/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://3.138.55.27/Online-game-shop/public/images/favicon.ico" type="image/x-icon" />

</head>
<script src="js/navbar.js"></script>

<body>
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="left-side">
            <img src="../images/logo.png" alt="logo" class="login-logo" />
        </div>
        <div class="right-side">
            <div class="form-container">
              <form action="../../src/controller/ContactUs.php" method="POST" class="contact-form">
                    <h1>Contact Us</h1>

                    <label for="name" class="contact-label">Name:</label>
                    <input class="contact-input" type="text" id="name" name="name" required />

                    <label class="contact-label" for="email">Email:</label>
                    <input class="contact-input" type="email" id="email" name="email" required />

                    <label class="contact-label" for="text-field">What can we help you with?</label>
                    <textarea name="report" id="text-field" cols="15" rows="8"></textarea>
                    <input class="contact-input" type="submit" value="Submit">
                </form>
            </div>
            <div class="right-line"></div>
        </div>
    </div>


    <?php include('footer.php'); ?>

    </div>




</body>
<script src="/global.js"></script>

</html>