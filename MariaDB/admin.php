<?php
session_start();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST["submit"])) {
    // Check if file is a valid image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

?>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="s4.css">
        <title>Session Example</title>
    </head>


<div class = "bcontainer">
    <h3>Admin Account</h3>
    <form action="admin.php" method="post" enctype="multipart/form-data">
        <h3>Upload File</h3>
        <?php
   $files = scandir($target_dir);
   foreach ($files as $file) {
       if ($file !== '.' && $file !== '..') {
           // Display the image
           echo "<div style='margin-bottom: 10px;'>";
           echo "<img src='" . $target_dir . $file . "' alt='" . htmlspecialchars($file) . "' style='max-width: 200px; max-height: 200px;'><br>";
           echo "<p>" . htmlspecialchars($file) . "</p>";
           echo "</div>";
       }
   } ?>
        <input type="file" name="fileToUpload" id="fileToUpload" required>
        <input type="submit" value="Upload File" name="submit">
</form>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s4technical"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    $sql = "SELECT * FROM s4 WHERE username = '".$_SESSION['uname']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
    echo "Welcome " . $row["username"] . "  (" . $row["userlevel"]. ")<br>";
    echo "Userlevel: ". $row["userlevel"]. "<br>";
    echo "Email: ". $row["email"]. "<br>";
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
        elseif($pass !== $_SESSION['pass']){
            echo "Current password is incorrect.";
            exit();
        }

        $update_sql = "UPDATE s4 SET password = ?, cpassword = ? WHERE username = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sss", $npass, $cpass, $_SESSION['uname']);

        if ($stmt->execute()) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . $conn->error;
        }

        $stmt->close();
    }

    $conn->close();

    
    

?>
<input type="button" value="Logout" onclick="window.location.href='logout.php'">
<input type="button" value="View Records" onclick="window.location.href='view_records.php'">
<input type="button" value="Add Records" onclick="window.location.href='admin_add-record.php'">
<div class = "acontainer">
   <form action="admin.php" method="post">
      <h3>Reset your password.</h3>
      <p>Enter current password: <input type="password" name="pass" required/> </p>
      <p>Enter new password: <input type="password" name="npass" required/></p>
      <p>Confirm new password: <input type="password" name="cpass" required/></p>
      <input type="submit" value="Submit" />
   </form>
</div>



</div>


</body>
</html>

<?php
