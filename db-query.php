<?php session_start();
require_once "requires/db-handle.php";
require_once "requires/console-debug.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "requires/head.html"; ?>
  <title>Search Database</title>
</head>
<body>
<header>
  <?php require_once "requires/header.php"; ?>
</header>
<nav>
  <?php require_once "requires/nav.html"; ?>
</nav>
<main>
  <p>The attribute names and data types listed under field are not hard-coded, but are
    dynamically updated from the database based on which table I select. In this case I choose
    the sample <i>employees</i> tables, though the functionality could be expanded to allow users to
    choose the table themselves.</p>
  <h3>Search <i>employees</i></h3>
  <p class="note">Note: If you aren't sure what to search for, try adding a new employee
    (link under Sample Database on the left), then search for it.</p><br>
  <br>
  <form method="post">
    <label for="searchField">Field:</label><br>
    <select name="searchField" id="searchField">
      <option hidden selected></option>
    </select><br>
    <label for="searchValue">Value:</label><br>
    <input type="text" name="searchValue" id="searchValue"><br>
    <button type="submit" name="submit">Submit</button>
    <br>
  </form>
  <div id="output"></div>
</main>
<footer>
  <?php require_once "requires/footer.html"; ?>
</footer>
<?php
$result = $dbConn->query("SHOW columns FROM employees;");
$fieldName = array();
$fieldType = array();

while ($row = $result->fetch_assoc())
{
  $fieldName[] = current($row);
  $fieldType[] = preg_replace("/[^A-z]/", "", next($row));
}

$fieldNameStr = json_encode($fieldName);
$fieldTypeStr = json_encode($fieldType);

if (isset($_POST["submit"]))
{
  if ($_POST["searchField"] == null || $_POST["searchValue"] == null)
  {
    $message = "All input fields must be filled";
  }
  else
  {
    $field = $_POST["searchField"];
    $index = $fieldType[array_search($field, $fieldName)];

    if ($index == "int" && !is_numeric($_POST["searchValue"]))
    {
      $value = $_POST["searchValue"];
    }
    else
    {
      $value = "'" . $_POST["searchValue"] . "'";
    }

    $dbQuery = "SELECT * FROM employees WHERE $field IN ($value);";
    $formattedQ = htmlentities($dbQuery);
    echo "<script>domOutput(\"Your query: $formattedQ\");</script>";

    $result = $dbConn->query($dbQuery);
    if ($result && $result->num_rows > 0)
    {
      $message = "<hr>Results: " . $result->num_rows . "<br>";

      for ($i = 1; $row = $result->fetch_assoc(); $i++)
      {
        foreach ($row as $key => $value)
        {
          if (!isset($value))
          {
            $value = "<i>null</i>";
          }

          $message .= "<br>$key: $value";
        }

        $message .= "<br>";
      }
    }
    elseif ($result)
    {
      $message = "<hr>No results";
    }
    else
    {
      $message = "<hr>Query failed<br>Error: $dbConn->error";
    }
  }
  echo "<script>domOutput(\"$message\");</script>";
}
?>
<script>
  var fieldOptions = document.getElementById("searchField");
  var fieldName = JSON.parse('<?= $fieldNameStr; ?>');
  var fieldType = JSON.parse('<?= $fieldTypeStr; ?>');

  for (var i = 0; i < fieldName.length; i++)
  {
    var option = document.createElement("option");
    option.value = fieldName[i].valueOf();
    option.innerHTML = fieldName[i].valueOf() + " — " + fieldType[i].valueOf();

    fieldOptions.appendChild(option);
  }
</script>
<script src="/src/scripts/script.js"></script>
</body>
</html>