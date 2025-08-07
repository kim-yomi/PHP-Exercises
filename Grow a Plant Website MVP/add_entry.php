<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entry_content = $_POST['entry_content'];
    $date_entry_added = date("Y-m-d");
    $current_status = $_POST['current_status'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO Diary (date_entry_added, entry_content) VALUES (?, ?)");
$stmt->bind_param("ss", $date_entry_added, $entry_content);
    $stmt->execute();
    $entry_id = $stmt->insert_id;
echo "New diary entry created successfully. Entry No: " . $entry_id;
    

    if ($stmt->execute()) {
        echo "New diary record created successfully.<br>";
    } else {
        echo "Error: " . $stmt->error . "<br>";
    }
    $stmt->close();

    $stmt = $conn->prepare("UPDATE UserPlants SET status = ? WHERE plant_id = ?");
    $stmt->bind_param("si", $current_status, $id);
    if ($stmt->execute()) {
        echo "Status updated successfully.<br>";
    } else {
        echo "Error updating status: " . $stmt->error . "<br>";
    }
    $stmt->close();

    $sql = "SELECT message FROM StatusMessage WHERE current_status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $current_status);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $message = $result->fetch_assoc()['message'];
        echo "Status message: " . $message;
    } else {
        echo "No status message found for this status.";
    }
    $stmt->close();
    $conn->close();
}
?>


<html>
<head>
    <link rel="stylesheet" href="Final_DiaryStyles.css">
</head>
<body>
    <form action="add_entry.php" method="post">
        <h3>Add an Entry</h3>    
        <p>Date: <input type="date" name="date_entry_added" value="<?php echo date('Y-m-d'); ?>" readonly/></p>
        <p>Entry: <textarea name="entry_content" rows="5" cols="40"></textarea></p>
        <label for="current_status">Choose an option:</label>
            <select name="current_status" id="current_status">
                <option value="Healthy">Healthy</option>
                <option value="Dry">Dry</option>
                <option value="Overwatered">Overwatered</option>
                <option value="Rotting">Rotting</option>
            </select>
        <input type="submit" value="Submit" />
        <input type="button" value="View Plants" onclick="window.location.href='viewplants.php'">
        <input type="button" value="Go to addplants" onclick="window.location.href='addplant.php'">
      <input type="button" value="Delete plants" onclick="window.location.href='deleteplant.php'">
      <input type="button" value="View diary entry" onclick="window.location.href='viewdiary.php'">

    </form>
</body>
</html>
