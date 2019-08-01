<?php session_start();
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Javascript Projects</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <p class="note">I have made the code available on Github. Rather than have multiple READMEs
    corresponding to different files, I provide some commentary here and link to the relevant files.
    The Javascript described below is what is used for this website.</p>
  <h4>Javascript</h4>
  <p>I mainly used Javascript to dynamically add elements to the page using data retrieved from
    my site's database.</p>
  <h5>Dynamic</h5>
  <p>By replacing the table name or database name in a couple of places, the SQL queries or
    inserts can be performed on another table or database. Everything remains functional, regardless
    of changes to the data, making the code much easier to maintain.</p>
  <h5>Server-Side Output</h5>
  <p>In <b>headScript.js</b> I have a simple function which can be used to print messages within
    HTML elements from my PHP code. By using this function I can perform server-side processing,
    then output results or error messages in properly formatted HTML tags. This is a hack to
    accomplish what is more properly done with AJAX, but I haven't worked with AJAX yet.</p><br>
  <h4>Source Code Links</h4>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/scripts/headScript.js">headScript.js</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-insert.php">db-insert.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-query.php">db-query.php</a>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>