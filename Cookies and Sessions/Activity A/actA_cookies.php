<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if (isset($_POST['enable_cookies'])) {
        setcookie("username", $uname, time() + (86400 * 30));
        setcookie("password", $pass, time() + (86400 * 30));
    } else {
        setcookie("username", "", time() - 3600, "/");
         setcookie("password", "", time() - 3600, "/");

    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<html>
   <head>
      <link rel="stylesheet" href="registration_mod.css"/>
   </head>
   <body>
      <div class="acontainer">
         <form method="post">
            <h3>Login</h3>
            <p>Username: 
               <input type="text" name="uname"
                      value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>" 
                      required /> 
            </p>
            <p>Password: 
               <input type="password" name="pass"
                      value="<?php echo isset($_COOKIE['password']) ? htmlspecialchars($_COOKIE['password']) : ''; ?>" 
                      required /> 
            </p>
            <p>
               <input type="checkbox" name="enable_cookies"
                      <?php echo isset($_COOKIE['username']) ? 'checked' : ''; ?> />
               Remember Me
            </p>
            <input type="submit" value="Submit" />
         </form>
      </div>
   </body>
</html>
