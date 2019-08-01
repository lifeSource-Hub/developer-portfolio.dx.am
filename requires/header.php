<span id="headerLinks">
   <?php
   if (!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== 1)
   {
     $_SESSION["loggedIn"] = 0;
     echo "<a href='/src/login'>Login</a>";
   }
   else
   {
     if (isset($_SESSION["privilege"]) && $_SESSION["privilege"] === 1)
     {
       echo "<a href='/src/admin'>Admin</a>";
     }

     echo "<a href='/src/my-account'>My Account</a>";
     echo "<a href='/src/login?logout'>Logout</a>";
   }

   $logged = ($_SESSION["loggedIn"]) ? "TRUE" : "FALSE";
   // debug_to_console("LoggedIn: $logged");
   ?>
</span>
<div class="header"><h1>Nicholas Talbert's Software Portfolio</h1></div>