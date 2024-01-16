<?php
session_start();

require_once("../../../config/Database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $db = new Database("127.0.0.1", "root", "", "shop");

  if ($db->query("SELECT 1") === FALSE) {
    die("Connection failed: ");
  }

  $checkQuery = "SELECT * FROM users WHERE username = '$username'";
  $result = $db->query($checkQuery);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user["password"])) {
      $_SESSION["user"] = array(
        "id" => $user["id"],
        "username" => $user["username"],
        "name" => $user["name"],
        "email" => $user["email"],
        "birthday" => $user["birthday"],
        "balance" => $user["balance"],
        "role" => $user["role_id"]
      );

      header("Location: ../../index.php");
      exit();
    }
  }

  $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="/Online-game-shop/public/css/global.css">
  <link rel="stylesheet" href="/Online-game-shop/public/css/index.css">
  <link rel="stylesheet" href="/Online-game-shop/public/css/login.css">
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
  <div class="container">
    <div class="left-side">
      <img src="../../images/logo.png" alt="logo" class="login-logo" />
    </div>
    <div class="right-side">
      <div class="form-container">
        <form id="loginForm" action="login.php" method="post" onsubmit="return saveAndRedirect()">
          <h1>Login</h1>
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" required />
          <?php if (isset($username) && $result->num_rows === 0) : ?>
            <span class="error-message">User not found.</span>
          <?php endif; ?>
          <label for="password">Password: </label>
          <input type="password" id="password" name="password" required />
          <?php if (isset($username) && $result->num_rows > 0 && !password_verify($password, $user["password"])) : ?>
            <span class="error-message">Incorrect password.</span>
          <?php endif; ?>
          <input type="submit" name="submit" value="Login" id="submit">
          <div class="under-links">
            <span><a href="signup.php" class="link">Sign Up</a></span>
          </div>
        </form>
      </div>
      <div class="right-line"></div>
    </div>
  </div>

  <script>
    function saveAndRedirect() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      console.log(username);

      function isPasswordValid() {
        var passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).{7,}$/;
        return passwordRegex.test(password);
      }
      console.log(isPasswordValid())

      if (isPasswordValid() && username !== "") {

      } else {
        alert("Please enter both username and password.");
        return false;
      }
    }
  </script>
</body>





  <div class="backwrap gradient">
    <div class="back-shapes">
      <span class="floating circle" style="
            top: 66.59856996935649%;
            left: 13.020833333333334%;
            animation-delay: -0.9s;
          "></span>
      <span class="floating triangle" style="
            top: 31.46067415730337%;
            left: 33.59375%;
            animation-delay: -4.8s;
          "></span>
      <span class="floating cross" style="
            top: 76.50663942798774%;
            left: 38.020833333333336%;
            animation-delay: -4s;
          "></span>
      <span class="floating square" style="
            top: 21.450459652706844%;
            left: 14.0625%;
            animation-delay: -2.8s;
          "></span>
      <span class="floating square" style="
            top: 58.12053115423902%;
            left: 56.770833333333336%;
            animation-delay: -2.15s;
          "></span>
      <span class="floating square" style="
            top: 8.682328907048008%;
            left: 72.70833333333333%;
            animation-delay: -1.9s;
          "></span>
      <span class="floating cross" style="
            top: 31.3585291113381%;
            left: 58.541666666666664%;
            animation-delay: -0.65s;
          "></span>
      <span class="floating cross" style="
            top: 69.96935648621042%;
            left: 81.45833333333333%;
            animation-delay: -0.4s;
          "></span>
      <span class="floating circle" style="
            top: 15.117466802860061%;
            left: 32.34375%;
            animation-delay: -4.1s;
          "></span>
      <span class="floating circle" style="
            top: 13.074565883554648%;
            left: 45.989583333333336%;
            animation-delay: -3.65s;
          "></span>
      <span class="floating cross" style="
            top: 55.87334014300306%;
            left: 27.135416666666668%;
            animation-delay: -2.25s;
          "></span>
      <span class="floating cross" style="top: 49.54034729315628%; left: 53.75%; animation-delay: -2s"></span>
      <span class="floating cross" style="
            top: 34.62717058222676%;
            left: 49.635416666666664%;
            animation-delay: -1.55s;
          "></span>
      <span class="floating cross" style="
            top: 33.19713993871297%;
            left: 86.14583333333333%;
            animation-delay: -0.95s;
          "></span>
      <span class="floating square" style="
            top: 28.19203268641471%;
            left: 25.208333333333332%;
            animation-delay: -4.45s;
          "></span>
      <span class="floating circle" style="
            top: 39.7344228804903%;
            left: 10.833333333333334%;
            animation-delay: -3.35s;
          "></span>
      <span class="floating triangle" style="
            top: 77.83452502553627%;
            left: 24.427083333333332%;
            animation-delay: -2.3s;
          "></span>
      <span class="floating triangle" style="
            top: 2.860061287027579%;
            left: 47.864583333333336%;
            animation-delay: -1.75s;
          "></span>
      <span class="floating triangle" style="
            top: 71.3993871297242%;
            left: 66.45833333333333%;
            animation-delay: -1.25s;
          "></span>
      <span class="floating triangle" style="
            top: 31.256384065372828%;
            left: 76.92708333333333%;
            animation-delay: -0.65s;
          "></span>
      <span class="floating triangle" style="
            top: 46.47599591419816%;
            left: 38.90625%;
            animation-delay: -0.35s;
          "></span>
      <span class="floating cross" style="
            top: 3.4729315628192032%;
            left: 19.635416666666668%;
            animation-delay: -4.3s;
          "></span>
      <span class="floating cross" style="top: 3.575076608784474%; left: 6.25%; animation-delay: -4.05s"></span>
      <span class="floating cross" style="
            top: 77.3237997957099%;
            left: 4.583333333333333%;
            animation-delay: -3.75s;
          "></span>
      <span class="floating cross" style="
            top: 0.9193054136874361%;
            left: 71.14583333333333%;
            animation-delay: -3.3s;
          "></span>
      <span class="floating square" style="
            top: 23.6976506639428%;
            left: 63.28125%;
            animation-delay: -2.1s;
          "></span>
      <span class="floating square" style="
            top: 81.30745658835546%;
            left: 45.15625%;
            animation-delay: -1.75s;
          "></span>
      <span class="floating square" style="
            top: 60.9805924412666%;
            left: 42.239583333333336%;
            animation-delay: -1.45s;
          "></span>
      <span class="floating square" style="
            top: 29.009193054136876%;
            left: 93.90625%;
            animation-delay: -1.05s;
          "></span>
      <span class="floating square" style="
            top: 52.093973442288046%;
            left: 68.90625%;
            animation-delay: -0.7s;
          "></span>
      <span class="floating square" style="
            top: 81.51174668028601%;
            left: 83.59375%;
            animation-delay: -0.35s;
          "></span>
      <span class="floating square" style="
            top: 11.542390194075587%;
            left: 91.51041666666667%;
            animation-delay: -0.1s;
          "></span>
    </div>
  </div>


  </script>
</body>

</html>