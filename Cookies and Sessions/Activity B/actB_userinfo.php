<?php
session_start();
?>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="registration_mod.css">
        <title>Session Example</title>
    </head>


<div class = "bcontainer">
    <h3>User Information</h3>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    $sql = "SELECT fname, mname, lname, uname, bday, email, contactno FROM personalinfo WHERE uname = '".$_SESSION['username']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
    echo "Welcome " . $row["fname"] . " " . $row["lname"]. "<br>";
    echo "Birthday: ". $row["bday"]. "<br>";
    echo "Email: ". $row["email"]. "<br>";
    echo "Contact Number: ". $row["contactno"]. "<br>";
    }
    } else {
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pass = $_POST['pass'];
        $npass = $_POST['npass'];
        $cpass = $_POST['cpass'];

        if ($npass !== $cpass) { 
            echo "New password and confirm new password must have the same values.";
            exit();
        }
        elseif($pass === $npass){
            echo "New password must be different from current password.";
            exit();
        }
        elseif($pass !== $_SESSION['password']){
            echo "Current password is incorrect.";
            exit();
        }

        $update_sql = "UPDATE personalinfo SET pass = ?, cpass = ? WHERE uname = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sss", $npass, $cpass, $_SESSION['username']);

        if ($stmt->execute()) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();

?>
<div class = "acontainer">
   <form action="actB_userinfo.php" method="post">
      <h3>Reset your password.</h3>
      <p>Enter current password: <input type="password" name="pass" required/> </p>
      <p>Enter new password: <input type="password" name="npass" required/></p>
      <p>Confirm new password: <input type="password" name="cpass" required/></p>
      <input type="submit" value="Submit" />
   </form>
</div>
<input type="button" value="Logout" onclick="window.location.href='actB_logout.php'">

</div>


</body>
</html>
