<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $conn = connectDB();

    $check = $conn->prepare("SELECT * FROM user_sessions WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists!";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_sessions (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            $_SESSION['user_id'] = $conn->insert_id;
            $_SESSION['username'] = $username;
            header("Location: Final_2ndPage.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $conn->close();
}
?>
