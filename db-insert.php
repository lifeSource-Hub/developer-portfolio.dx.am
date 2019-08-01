<?php session_start();
require_once "requires/db-handle.php";
require_once "requires/console-debug.php";
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <?php require_once "requires/head.html"; ?>
    <title>New Record</title>
  </head>
  <body>
  <header>
    <?php require_once "requires/header.php"; ?>
  </header>
  <nav>
    <?php require_once "requires/nav.html"; ?>
  </nav>
  <main>
    <p>The interface below isn't something I would present to users, I designed it this way for
      the purposes of demonstration. The field name, data type, field length, and required
      field symbol are all dynamically updated according to which database table I select in my
      code, just like on the database search page. Fields which are auto-incremented, such as
      employee ID, are omitted.</p>
    <h3>Insert into <i>employees</i> Table</h3>
    <p class="note">&ast; Indicates required field</p><br><br>
    <form class="form" action="/src/db-insert.php" method="post">
      <div id="insert"></div>
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
  $fieldNull = array();
  $fieldAutoInc = array();

  while ($row = $result->fetch_assoc())
  {
    $fieldName[] = current($row);
    $fieldType[] = ucfirst(next($row));
    $fieldNull[] = next($row);
    $fieldAutoInc[] = end($row);
  }

  $fieldNameJSON = json_encode($fieldName);
  $fieldTypeJSON = json_encode($fieldType);
  $fieldNullJSON = json_encode($fieldNull);
  $fieldAutoIncJSON = json_encode($fieldAutoInc);

  if (isset($_POST["submit"]))
  {
    $sqlString = "INSERT INTO employees (";

    for ($i = 0; $i < (count($_POST) - 2); $i++)
    {
      if (strlen(current($_POST)) > 0)
      {
        $sqlString .= key($_POST) . ", ";
      }

      next($_POST);
    }

    if (strlen(current($_POST)) > 0)
    {
      $sqlString .= key($_POST) . ") VALUES (";
    }
    else
    {
      $sqlString = rtrim($sqlString, ", ") . ") VALUES (";
    }

    reset($_POST);

    for ($i = 0; $i < (count($_POST) - 2); $i++)
    {
      if (strlen(current($_POST)) > 0)
      {
        $sqlString .= "'" . current($_POST) . "', ";
      }

      next($_POST);
    }

    if (strlen(current($_POST)) > 0)
    {
      $sqlString .= "'" . current($_POST) . "');";
    }
    else
    {
      $sqlString = rtrim($sqlString, ", ") . ");";
    }

    // debug_to_console($sqlString);
    $result = $dbConn->query($sqlString);

    if ($result)
    {
      $_POST["success"] = true;
    }
    else
    {
      $_POST["success"] = false;
    }
  }

  if (isset($_POST["success"]))
  {
    echo "<script>domOutput(\"Your query: $sqlString\");</script>";

    if ($_POST["success"])
    {
      $message = "Insert Successful";
    }
    else
    {
      $message = "Insert Failed<br>Error: $dbConn->error";
    }

    echo "<script>domOutput(\"<hr>$message\");</script>";
  }
  ?>
  <script>
    var insertDiv = document.getElementById("insert");
    var fieldName = JSON.parse('<?= $fieldNameJSON; ?>');
    var fieldType = JSON.parse('<?= $fieldTypeJSON; ?>');
    var fieldNull = JSON.parse('<?= $fieldNullJSON; ?>');
    var fieldAutoInc = JSON.parse('<?= $fieldAutoIncJSON; ?>');

    for (var i = 0; i < fieldName.length; i++)
    {
      if (fieldAutoInc[i] !== "auto_increment")
      {
        var label = document.createElement("label");
        label.setAttribute("for", fieldName[i].valueOf());

        // Indicate required fields
        if (fieldNull[i] === "NO")
        {
          label.innerHTML = "*";
        }

        label.innerHTML += fieldName[i].valueOf() + ":";

        var input = document.createElement("input");
        var dataType = fieldType[i].valueOf().replace(/\(/, " (max length: ");
        // Replace "Varchar" with "Text" to simplify for users
        input.placeholder = dataType.replace(/Varchar/, "Text");
        input.type = "text";
        input.name = fieldName[i].valueOf();
        input.id = fieldName[i].valueOf();

        var br = document.createElement("br");

        insertDiv.appendChild(label);
        insertDiv.appendChild(input);
        insertDiv.appendChild(br);
      }
    }
  </script>
  <script src="/src/scripts/script.js"></script>
  </body>
  </html>
<?php if (isset($_POST["pass"]))
{
  echo $_POST["pass"];
} ?>