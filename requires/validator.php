<?php
require_once "db-handle.php";

class Validator
{
  private $username;
  private $password;
  private $passwordConf;
  public $loginError;
  public $registrationError;

  public function __construct($username, $password, $passwordConf = "")
  {
    $this->loginError = "";
    $this->username = $username;
    $this->password = $password;
    $this->passwordConf = $passwordConf;
  }

  public function validateLogin()
  {
    global $dbConn;

    $dbQuery = "SELECT password, privilege FROM accounts WHERE username IN ('$this->username');";
    // debug_to_console("passed username: $this->username -- passed password: $this->password");

    $result = $dbConn->query($dbQuery);

    if (!$result)
    {
      $this->loginError = "Login failed";
      // debug_to_console("Error: $dbConn->error");
    }
    elseif ($result->num_rows <= 0)
    {
      $this->loginError = htmlspecialchars("User $this->username does not exist");
    }
    else
    {
      $row = $result->fetch_assoc();

      if (password_verify($this->password, $row["password"]))
      {
        $_SESSION["loggedIn"] = 1;
        $_SESSION["username"] = $this->username;
        $_SESSION["privilege"] = (int)$row["privilege"];

        echo "<script>window.location.replace('/src/my-account.php');</script>";
        $this->loginError = "Login correct, redirect failed";
      }
      else
      {
        $this->loginError = "Incorrect password";
      }
    }
  }

  public function validateRegistration()
  {
    // debug_to_console("validateRegistration username = $this->username");
    // debug_to_console("validateRegistration password = $this->password");

    if (strlen($this->username) > 0 && strlen($this->password) > 0
        && strlen($this->passwordConf) > 0)
    {
      if ($this->validateUsername($this->username)
          && $this->validatePassword($this->password, $this->passwordConf))
      {
        return true;
      }
    }
    else
    {
      $this->registrationError = "All input fields must be filled";
    }

    return false;
  }

  public function validateUsername($username)
  {
    global $dbConn;

    $dbQuery = "SELECT * FROM accounts WHERE username IN ('$this->username');";

    $result = $dbConn->query($dbQuery);

    // Ensure unique username
    if ($result && $result->num_rows > 0)
    {
      $this->registrationError = "Username $this->username is taken";
    }
    elseif (strlen($username) < 4 || strlen($username) > 15)
    {
      $this->registrationError = "Username must have between 4 and 15 characters";
    }
    // Validate alphanumeric, plus an optional dash or underscore
    elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $username)
        || !preg_match('/(?=^[^_]*_?[^_]*$)(?=^[^-]*-?[^-]*$)/', $username))
    {
      $this->registrationError = "Your username can only consist"
          . " of letters and numbers, and may include one dash (-) or underscore (_).";
    }
    else
    {
      // debug_to_console("validateUsername - return true");
      return true;
    }

    // debug_to_console("validateUsername - return false");
    return false;
  }

  public function validatePassword($password, $passwordConf)
  {
    if ($password !== $passwordConf)
    {
      $this->registrationError = "The passwords no not match";
    }
    elseif (strlen($password) < 8 || strlen($password) > 30)
    {
      $this->registrationError = "Password must have between 8 and 30 characters";
    }
    else
    {
      // debug_to_console("validatePassword - return true");
      return true;
    }

    // debug_to_console("validatePassword - return false");
    return false;
  }
}