//////////////////////////////////////////
//
// This is the file we need to check login credentials.
// There are much safer ways to do this. Please do not use this 
// technique for a production website. I would recommend learning 
// about Tokens. 
//
///////////////////////////////////////////

<?php 
// This utilizes functions in the functions.php file
require_once 'functions.php';

  
  echo "<div class='main'><h3>Please enter your details to log in</h3>";
  $error = $Username = $Password = "";

//If there is a value, we can use the Post method to verify login creds
  if (isset($_POST['Username']))
  {
    $Username = sanitizeString($_POST['Username']);
    $Password = sanitizeString($_POST['Password']);
  
  // "If" either the username or password variables are empty, we assign
    // the value "Not all fields..... to the error variable"
    if ($Username == "" || $Password == "")
        $error = "Not all fields were entered<br>";
      //Otherwise let's try to send this query.
    else
    {
      $result = queryMySQL("SELECT Username,Password FROM employees
        WHERE Username='$Username' AND Password='$Password'");
      //If the returned rows from the database query equals 0, that means
      // the user pass combo does not exist.....
      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Username/Password
                  invalid</span><br><br>";
      }
      else
      {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
        die("You are now logged in. Please <a href='welcome.php?view=$Username'>" .
            "click here</a> to continue.<br><br>");
      }
    }
  }

  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Username</span><input type='text'
      maxlength='16' name='Username' value='$Username'><br>
    <span class='fieldname'>Password</span><input type='password'
      maxlength='16' name='Password' value='$Password'>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Login'>
    </form><br></div>
  </body>
</html>
