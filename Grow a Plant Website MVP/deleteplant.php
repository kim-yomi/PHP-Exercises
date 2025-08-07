<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nickname = $_POST['nickname'];
    
    $stmt = $conn->prepare("SELECT plant_id FROM UserPlants WHERE user_id = ? AND nickname = ?");
    $stmt->bind_param("is", $_SESSION['user_id'], $nickname);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $plant_id = $result->fetch_assoc()['plant_id'];

        $stmt = $conn->prepare("DELETE FROM UserPlants WHERE user_id = ? AND nickname = ?");
        $stmt->bind_param("is", $_SESSION['user_id'], $nickname);
        
        if ($stmt->execute()) {
            echo "Plant deleted successfully.";
        } else {
            echo "Error deleting plant: " . $stmt->error;
        }
        
    } else {
        echo "No plant found with that nickname.";
    }

    $stmt->close();}
?>
<html>
<body> 

<h3>Delete Plant</h3>
<form action="deleteplant.php" method="post">
<label for="nickname">Delete Plant:</label>
<select name="nickname" id="nickname">
    <?php
    $conn = new mysqli("localhost", "root", "", "GAG");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $user_id = $_SESSION['user_id']; 
    $sql = "SELECT nickname FROM UserPlants WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $nickname = htmlspecialchars($row['nickname']);
        echo "<option value=\"$nickname\">$nickname</option>";
    }

    $stmt->close();
    $conn->close();
    ?>
</select>

    <input type="submit" value="Delete Plant"/>
      <input type="button" value="Go to addplants" onclick="window.location.href='addplant.php'">
      <input type="button" value="Go to view plants" onclick="window.location.href='viewplants.php'">
</form>

</body>

