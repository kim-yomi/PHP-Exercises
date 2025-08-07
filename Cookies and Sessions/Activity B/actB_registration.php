<html>
   <head>
      <link rel = "stylesheet" href = "registration_mod.css"/>
</head>
<body>
   <div class = "acontainer">
   <form action="actB_registration.php" method="post">
      <h3>My Personal Information</h3>
      <p>ID: <input type="text" name="id"/> </p>
      <p>First Name: <input type="text" name="fname" required/> </p>
      <p>Middle Name: <input type="text" name="mname" required/> </p>
      <p>Last Name: <input type="text" name="lname" required/> </p>
      <p>Username: <input type="text" name="uname" required/> </p>
      <p>Password: <input type="password" name="pass" required/> </p>
      <p>Confirm Password: <input type="password" name="cpass" required/></p>
      <p>Birthday: <input type="date" name="bday" required/> </p>
      <p>Email: <input type="email" name="email" required/> </p>
      <p>Contact Number: <input type="tel" name="contactno" pattern="[0-9]{4}[0-9]{3}[0-9]{4}" required></p>
      <input type="submit" value="Submit" />
   </form>
</div>
<div class = "bcontainer">
   <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "login";

	//Variable Mapping
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $id = $_POST['id'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass']; 
		$cpass = $_POST['cpass'];
		$bday = $_POST['bday'];
		$email = $_POST['email'];
        $contactno = $_POST['contactno'];

	}
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

    if($pass !== $cpass){
        echo "Passwords do not match. Please try again.";
        exit();
    }

	$sql = "INSERT INTO personalinfo (id, fname, mname, lname, uname, pass, cpass, bday, email, contactno)
	VALUES ($id, '$fname', '$mname', '$lname', '$uname', '$pass', '$cpass', '$bday', '$email', '$contactno');"; 


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