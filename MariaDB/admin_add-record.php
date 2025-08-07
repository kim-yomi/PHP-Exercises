<html>
   <head>
      <link rel = "stylesheet" href = "s4.css"/>
</head>
<body>
   <div class = "acontainer">
   <form action="admin_add-record.php" method="post">
      <h3>Add Record</h3>
	  <input type="button" value="Back" onclick="window.location.href='admin.php'">
      <p>ID: <input type="text" name="id"/> </p>
      <p>User Level: <input type="text" name="userlevel" required/> </p>
      <p>Status: <input type="text" name="status" required/> </p>
      <p>Username: <input type="text" name="uname" required/> </p>
      <p>Password: <input type="password" name="pass" required/> </p>
      <p>Email: <input type="email" name="email" required/> </p>
      <input type="submit" value="Submit" />
   </form>
</div>
<div class = "bcontainer">
   <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "s4technical";

	//Variable Mapping
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
		$userlevel = $_POST['userlevel'];
		$status = $_POST['status'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO s4 (id, userlevel, status, username, password, email)
	VALUES ($id, '$userlevel', '$status', '$uname', '$pass', '$email');";


	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

   
	$conn->close();
    
?>
</div>
</body>
</html>