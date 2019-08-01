<?php session_start();

if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== 1)
{
  header("Location: /src/login.php");
}

require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>My Account</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <h3><span id="user"></span> Account Information</h3>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script>
  document.getElementById("user").innerHTML = ('<?= $_SESSION["username"]; ?>');
</script>
<script src="/src/scripts/script.js"></script>
</body>
</html>