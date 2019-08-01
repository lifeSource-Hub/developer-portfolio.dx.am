<?php session_start();
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>SQL Projects</title>
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
    The SQL described below is what is used for this website, though the database linked to is
    not necessarily the one used for this site.</p>
  <h4>SQL</h4>
  <p>There is a page for searching the database and inserting new data. Account information is also
    stored in the database.</p>
  <h5>Query and Insert</h5>
  <p>The query and insert strings are pieced together with a mixture of hard-code and input from the
    user. The registration page also uses an insert to add new accounts to the database.</p><br>
  <a href="/src/db-query">Database Search Page</a><br>
  <a href="/src/db-insert">Database Insert Page</a><br><br>
  <h4>Source Code Links</h4>

  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/data/s1471412.sql">SQL dump</a><br><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/validator.php">validator.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-insert.php">db-insert.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-query.php">db-query.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/register.php">register.php</a>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>