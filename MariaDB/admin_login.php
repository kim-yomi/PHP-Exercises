<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s4technical"; // Change to your database name

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
    $sql = "SELECT * FROM s4 WHERE username = ? AND password = ? AND userlevel = 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $uname, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['uname'] = $uname;
        $_SESSION['pass'] = $pass;
        header("Location: admin.php");
        exit();
    } else {
        $sql = "SELECT * FROM s4 WHERE username = ? AND password = ? AND userlevel = 'user'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $uname, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        echo "Invalid username or password.";

        if ($result->num_rows > 0) {
            //$_SESSION['username'] = $uname;
            header("Location: user.php");
            exit();
        }
        else{
            echo "Invalid username or password.";
        }
        
    }

    $stmt->close();
}

$conn->close();
?>
<html>
   <head>
      <title>Login</title>
      <link rel="stylesheet" type="text/css" href="s4.css">
   </head>
   <body>
    <div class = "acontainer">
         <form action="admin_login.php" method="post">
            <h3>Login</h3>
            <p>Username: <input type="text" name="uname" required/> </p>
            <p>Password: <input type="password" name="pass" required/> </p>
            <input type="submit" value="Login"/>
         </form>
</div>
   </body>
</html>