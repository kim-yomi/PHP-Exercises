<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Check if username and password match a record in the database
    $sql = "SELECT * FROM personalinfo WHERE uname = ? AND pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $uname, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If a match is found, start a session and redirect to info.php
        $_SESSION['username'] = $uname;
        $_SESSION['password'] = $pass;
        header("Location: actB_userinfo.php");
        exit();
    } else {
        // If no match is found, display an error message
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="registration_mod.css">
   </head>
   <body>
    <div class = "acontainer">
         <form action="actB_login.php" method="post">
            <h3>Login</h3>
            <p>Username: <input type="text" name="uname" required/> </p>
            <p>Password: <input type="password" name="pass" required/> </p>
            <input type="submit" value="Login"/>
         </form>
</div>
   </body>
</html>