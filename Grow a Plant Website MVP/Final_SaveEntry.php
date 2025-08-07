<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "grow_a_plant";

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error)
{
    die("Connection failed: " .$conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

$create_table = "CREATE TABLE IF NOT EXISTS diary_entries (
                entry_num INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(100) NOT NULL,
                diary_entry TEXT,
                entry_date DATETIME DEFAULT CURRENT_TIMESTAMP
                )";
$conn->query($create_table);

$diary_entry = $_POST['diary_entry'] ?? '';
$username = $_SESSION['username'] ?? 'not set';

if (!empty($diary_entry))
{
    $stmt = $conn->prepare("INSERT INTO diary_entries (username, diary_entry) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $diary_entry);
    $stmt->execute();
    $stmt->close();
}



$conn->close();

header("Location: Final_Diary.php");
exit();
?>

