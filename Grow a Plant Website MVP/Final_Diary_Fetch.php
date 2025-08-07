<?php
session_start();
include 'db_connection.php';
$conn = connectDB();

$user = $_SESSION['user_id'] ?? null;
$nick = $_GET['nickname'] ?? '';

if (!$user) exit(json_encode([]));

$stmt = $conn->prepare("SELECT date_entry_added, entry_content
  FROM diary d JOIN userplants up ON d.plant_id = up.plant_id
  WHERE up.user_id=? AND up.nickname=? ORDER BY date_entry_added DESC");
$stmt->bind_param("is", $user, $nick);
$stmt->execute();
$res = $stmt->get_result();

$entries = [];
while ($row = $res->fetch_assoc()) $entries[] = $row;

header('Content-Type: application/json');
echo json_encode($entries);
?>
