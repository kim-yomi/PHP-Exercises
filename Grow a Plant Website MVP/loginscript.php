<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "grow_a_plant";

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");

$conn->select_db($dbname);

$table_sql = "CREATE TABLE IF NOT EXISTS user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    last_login DATETIME DEFAULT CURRENT_TIMESTAMP,
    progress TEXT
)";
$conn->query($table_sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $_SESSION['username'] = $username;

    $stmt = $conn->prepare("SELECT id FROM user_sessions WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $update_stmt = $conn->prepare("UPDATE user_sessions SET last_login = NOW() WHERE username = ?");
        $update_stmt->bind_param("s", $username);
        $update_stmt->execute();
    } else {
        $insert_stmt = $conn->prepare("INSERT INTO user_sessions (username) VALUES (?)");
        $insert_stmt->bind_param("s", $username);
        $insert_stmt->execute();
    }

    header("Location: Final_2ndPage.php");
    exit();
}
?>
