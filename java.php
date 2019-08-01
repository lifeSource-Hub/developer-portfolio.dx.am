<?php session_start();
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Java Projects</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <p>Not all projects are described here, a complete listing can be found on Github
    (links below). If you want to easily run any of the programs, you can use the jar files I
    created with bundled dependencies. A "fat jar", I believe it's called. The path for the
    jars:</p>
  <code class="codeBlock">[project name]/build/libs/[project name]-1.0-SNAPSHOT-all.jar</code>.
  <h4>Simple RPG</h4>
  <h6>Needs a better title!</h6>
  <p>This is a work-in-progress game I started to gain experience and for my own enjoyment. I
    initially wrote the program in C++. It ran only in the terminal window, with text and an ASCII
    map. I have been refactoring it in Java, improving things and adding more as I go. The first
    step was ditching text in terminal for an actually GUI. Now there are buttons, key-binding,
    and a game map composed of icons.</p><br>
  <h4>Minesweeper</h4>
  <p>As you might guess, this a clone of the classic Windows Minesweeper game. There are still a
    few features which need to be added in order to be considered complete, but it can be played
    as is.</p><br>
  <h4>Game of Life</h4>
  <p>This was a school project, based on
    <a href="https://en.wikipedia.org/wiki/Conway%27s_Game_of_Life">Conway's Game of Life</a>. The
    Game of Life represents the life cycle of a colony of cells. Live cells are represented by
    the character 'O' on a grid, the size of which is set by the user. Each cell is randomly set
    to alive or dead, then displayed. The next generation is calculated by the count of a cell's
    live neighbors, the display updates, and so on. Threading is used to continue the cycle until
    the application is closed or the stop button is clicked.</p>
  <p>This is one of my oldest projects and is not a good representation of my current coding style.
  </p><br>
  <h4>Project Links</h4>
  <a href="https://github.com/lifeSource-Hub/SimpleRPG">SimpleRPG</a><br>
  <a href="https://github.com/lifeSource-Hub/Minesweeper">Minesweeper</a><br>
  <a href="https://github.com/lifeSource-Hub/GameOfLife">GameOfLife</a><br>
  <a href="https://github.com/lifeSource-Hub/Hangman">Hangman</a><br>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<script src="/src/scripts/script.js"></script>
</body>
</html>