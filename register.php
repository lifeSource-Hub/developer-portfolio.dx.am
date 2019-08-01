<?php session_start();

if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === 1)
{
  header("Location: /src/my-account.php");
}

require_once "requires/console-debug.php";
require_once "requires/validator.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Register</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <p class="note">The password validation only checks for the minimum and maximum number of
    characters. In a legitimate login system, I would of course have more robust requirements.</p>
  <br>
  <form class="form" method="post">
    <label for="user">Username:</label>
    <input type="text" name="user" id="user"
           value="<?php if (isset($_POST["user"]))
           {
             echo $_POST["user"];
           } ?>"><br>
    <label for="pass">Password:</label>
    <input type="password" name="pass" id="pass"><br>
    <label for="passConf">Confirm Password:</label>
    <input type="password" name="passConf" id="passConf"><br>
    <button type="submit" name="submit">Submit</button>
  </form>
  <br>
  <div id="output"></div>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<?php
if (isset($_POST["submit"]))
{
  $user = $_POST["user"];
  $pass = $_POST["pass"];
  $passConf = $_POST["passConf"];

  $validator = new Validator($user, $pass, $passConf);

  if ($validator->validateRegistration())
  {
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sqlString = "INSERT INTO accounts "
        . "(username, password, privilege) "
        . "VALUES "
        . "('$user', '$hash', 0);";

    $result = $dbConn->query($sqlString);

    if ($result)
    {
      echo "<script>redirectAlert(\"Registration successful! You will now be redirected to login.\");</script>";
      echo "<script>window.location.replace('/src/login.php');</script>";
    }
    else
    {
      $validator->registrationError = "Registration failed";
      // debug_to_console("Error: $dbConn->error");
    }
  }

  echo "<script>domOutput(\"$validator->registrationError\", \"#ff0000\", \"14px\");</script>";
}
?>
<script src="/src/scripts/script.js"></script>
</body>
</html>