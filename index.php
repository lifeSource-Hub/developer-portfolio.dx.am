<?php session_start();
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Home</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <h3>About This Website</h3>
  <p>This website started as a project for my own enjoyment and to learn PHP, but for now it also
    serves as one of my developer portfolios, the other being Github (link below).</p>
  <h3>About Me</h3>
  <p>I'm a recent college graduate living in Kansas City, looking to begin my software development
    career in an entry-level position and continue building my skills.</p>
  <p>I left a successful career as a welder for software development because I wanted something more
    fulfilling and intellectually stimulating.</p><br>
  <p><a href="https://github.com/lifeSource-Hub">Github Profile</a></p>
  <hr>
  <h4>Website Source Code</h4>
  <p>For those interested, I have made all of the files available on Github. That makes it easier
    for you to read and also allows you to see the PHP. Follow the links on the left, under
    Software Development for more information and precise links. There may be minor differences
    between what is on Github and what the site is currently running on, because of updates or
    for security</p>
  <a href="https://github.com/lifeSource-Hub/developer-portfolio.dx.am">Website Repository</a>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>