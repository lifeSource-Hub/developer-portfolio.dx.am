<?php session_start();
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>PHP Projects</title>
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
    corresponding to different files, I provide some commentary here and link to the relevant files. The
    PHP described below is what is used for this website.</p>
  <h4>PHP</h4>
  <p>Some of what I coded with PHP I could have accomplished with Javascript, but at the time I
    wanted more PHP experience. Some of it is page specific and some is used across the entire
    site.</p>
  <h5>Input Validation</h5>
  <p>I created validation for logging in and registering on this site, as well as for database
    inserts and queries.</p>
  <h5>Login</h5>
  <p>There is an account system on this site which makes use of PHP <code>SESSION</code> to track
    user logins and dynamically change the links in the <code>header</code>. I restricted access
    to the <b>login</b>, <b>register</b>, <b>my account</b>, and <b>admin</b> page based on
    whether the user is logged in or not (and their account privileges). If they try to access it
    directly via URL, they are redirected.</p>
  <h5>Database</h5>
  <p>The database field names, lengths, and data types are dynamically retrieved from the database,
    rather than being hard-coded. I could expand this to allow users to choose the database and
    table as well, if I wanted to allow that much access.</p><br>
  <a href="/src/db-query">Database Search Page</a><br>
  <a href="/src/db-insert">Database Insert Page</a><br><br>
  <h4>Source Code Links</h4>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/validator.php">validator.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-insert.php">db-insert.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/db-query.php">db-query.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/requires/header.php">header.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/login.php">login.php</a><br>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx
.am/blob/master/src/register.php">register.php</a>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>