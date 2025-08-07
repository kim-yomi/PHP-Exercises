<html>
<body>
<div class = "bcontainer">
   <?php
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

    $sql = "SELECT id, userlevel, status, username, password, email FROM s4 ORDER BY id ASC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row

   ?>
        <h3>User/Admin Records</h3>

    <table>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>User Level</th>
        <th>Email</th>
        <th>Password</th>
        <th>Status</th>
    </tr>
    
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["username"]; ?></td>
        <td><?php echo $row["userlevel"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td><?php echo $row["status"]; ?></td>
    </tr>
    
    <?php }
    }else{
        echo "No records found.";
    };
    
    $conn->close();
    ?>
    </table>
</div>
</body>
</html>