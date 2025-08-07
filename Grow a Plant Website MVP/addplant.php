<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$_SESSION['user_id'] = 1;
$_SESSION['username'] = 'test';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $common_name = $_POST['common_name'];
    $date_added = $_POST['date_added'];
    $nickname = $_POST['nickname'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $stmt = $conn->prepare("SELECT id FROM Plants WHERE common_name = ?");
    $stmt->bind_param("s", $common_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $plant_id = $result->fetch_assoc()['id'];
    } else {
        echo "No matching plant found.";
        exit();
    }


    $stmt = $conn->prepare("INSERT INTO UserPlants (user_id, plant_id, date_added, last_watered, nickname) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iisss", $user_id, $plant_id, $date_added, $last_watered, $nickname);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    


    $stmt->close();
    $conn->close();
}
?>

<html>
<body>
    <form action="addplant.php" method="post">
        <h3>Add a Plant</h3>    
        <label for="common_name">Choose an option:</label>
            <select name="common_name" id="common_name">
                <option value="Tomato">Tomato</option>
                <option value="Pechay">Pechay</option>
                <option value="Eggplant">Eggplant</option>
                <option value="Garlic">Garlic</option>
                <option value="Potato">Potato</option>
                <option value="Sunflower">Sunflower</option>
            </select>
        <p>Nickname: <input type="text" name="nickname"/> </p>
        <p>Date Planted: <input type="date" name="date_added"/> </p>
        <p>Last watered: <input type="date" name="last_watered"/> </p>
        <input type="submit" value="Submit" />
        <input type="button" value="View Plants" onclick="window.location.href='viewplants.php'">
    </form>
</body>
</html>
