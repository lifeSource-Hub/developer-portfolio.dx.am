<?php session_start();
if (isset($_GET["logout"]))
{
  foreach ($_SESSION as $key => $value)
  {
    unset($_SESSION["$key"]);
  }

  session_destroy();
  session_start();
}
elseif (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] === 1)
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
  <title>User Login</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <p>If you don't feel like creating your own account, you can login using one of the sample
    accounts provided below. Administrator accounts have elevated privileges and are capable of
    accessing the "Admin Page". Administrator accounts cannot be created by users at this time.
    Though the sample passwords are shown below in clear text, they are properly stored in the
    database as a hash. Any password you use to register an account is likewise hashed.</p>
  <fieldset id="sampleLogin">
    <legend>Sample</legend>
    <p><b>Username:</b> JohnDoe<br><b>Password:</b> password</p>
    <p>Administrator<br>
      <b>Username:</b> ClintEastwood<br><b>Password:</b> sayMyName</p>
  </fieldset>
  <hr>
  <p class="note">Note: Username and password are case-sensitive</p>
  <h4>Login</h4>
  <form class="form" method="post">
    <label for="user">Username:</label>
    <input type="text" name="user" id="user"
           value="<?php if (isset($_POST["user"]))
           {
             echo $_POST["user"];
           } ?>" autofocus><br>
    <label for="pass">Password:</label>
    <input type="password" name="pass" id="pass"><br>
    <button type="submit" name="submit">Login</button>
  </form>
  <br><br>
  <span>Don't have an account? <a href="register">Register here</a></span>
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

  $validator = new Validator($user, $pass);
  $validator->validateLogin();

  echo "<script>domOutput(\"$validator->loginError\");</script>";
}
?>
<script src="/src/scripts/script.js"></script>
</body>
</html>