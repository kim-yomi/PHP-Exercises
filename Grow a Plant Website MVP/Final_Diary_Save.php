<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: Final_1stPage.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['plant_id'], $_POST['entry_content'])) {
    $userplant_id = $_POST['plant_id'];
    $entry_content = $_POST['entry_content'];
    $date_entry_added = $_POST['date_entry_added'] ?? date("Y-m-d");
    $current_status = $_POST['current_status'] ?? 'Healthy';

    $stmt = $conn->prepare("SELECT plant_id FROM userplants WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $userplant_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $plantData = $result->fetch_assoc();
    $stmt->close();

    if ($plantData) {
        $plant_id = $plantData['plant_id'];

        $stmt = $conn->prepare("INSERT INTO Diary (user_id, plant_id, date_entry_added, entry_content) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $user_id, $plant_id, $date_entry_added, $entry_content);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("UPDATE UserPlants SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $current_status, $userplant_id);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: Final_2ndPage.php?plant_id=" . urlencode($userplant_id));
exit();
?>
