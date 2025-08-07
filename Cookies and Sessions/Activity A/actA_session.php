<?php
session_start();

$sesh_name = "Kim";
$sesh_pass = "12345";

$error_message = ""; // To store error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Check if the username and password match
    if ($uname === $sesh_name && $pass === $sesh_pass) {
        // Set session variables
        $_SESSION['username'] = $uname;
        $_SESSION['password'] = $pass;

        // Redirect to the next page
        header("Location: actA_session2.php");
        exit();
    } else {
        // If login fails, show an error message
        echo "Invalid username or password.";
    }
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
            <?php if (!empty($error_message)): ?>
               <p style="color: red;"><?php echo "Invalid username or password." ?></p>
            <?php endif; ?>
            <p>Username: 
               <input type="text" name="uname" 
                      value="<?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : ''; ?>" 
                      required/> 
            </p>
            <p>Password: 
               <input type="password" name="pass" 
                      value="<?php echo isset($_SESSION['password']) ? htmlspecialchars($_SESSION['password']) : ''; ?>" 
                      required/> 
            </p>
            <input type="submit" value="Login"/>
         </form>
      </div>
   </body>
</html>