<?php session_start();

if (!isset($_SESSION["privilege"]) || $_SESSION["privilege"] !== 1)
{
  header("Location: /src/my-account.php");
}

require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Admin Page</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <h3>Administrator</h3>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>