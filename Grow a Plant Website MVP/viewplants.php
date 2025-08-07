<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";

$message = "";
$plant_stages = [];
var_dump($user = $_SESSION['user_id']);

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql = "SELECT up.nickname, p.common_name, up.date_added, up.last_watered, up.status, up.plant_id
        FROM UserPlants up
        JOIN Plants p ON up.plant_id = p.id
        WHERE up.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

while ($plant = $result->fetch_assoc()) {
    $plant_id = $plant['plant_id'];
    $common_name = $plant['common_name'];
    $date_added = $plant['date_added'];

    $days_since_planting = (strtotime(date("Y-m-d")) - strtotime($date_added)) / (60 * 60 * 24);

    $sql2 = "SELECT image_url, stage_name, description 
             FROM GrowthStage 
             WHERE plant_id = ? AND ? >= days_required 
             ORDER BY days_required DESC 
             LIMIT 1";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("ii", $plant_id, $days_since_planting);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        $stage = $result2->fetch_assoc();
        $plant_stages[] = [
            'nickname' => $plant['nickname'],
            'name' => $common_name,
            'image' => $stage['image_url'],
            'stage_name' => $stage['stage_name'],
            'description' => $stage['description'],
            'days_since' => (int)$days_since_planting,
            'status' => $plant['status']
        ];
    } else {
        $plant_stages[] = [
            'nickname' => $plant['nickname'],
            'name' => $common_name,
            'image' => '',
            'stage_name' => 'Unknown',
            'description' => 'No growth stage data available.',
            'days_since' => (int)$days_since_planting,
            'status' => $plant['status']
        ];
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Common Tomato - Plant Diary</title>
  <link rel="stylesheet" href="Final_DiaryStyles.css">
</head>
<body>
    <h3>View Plants</h3>  
    <h3>Your Plants and Their Growth Stages</h3>
    <?php foreach ($plant_stages as $plant): ?>
        <div style="margin-bottom: 20px;">
            <strong><?php echo htmlspecialchars($plant['name']); ?></strong><br>
            Nickname: <?php echo htmlspecialchars($plant['nickname']); ?><br>
            Status: <?php echo htmlspecialchars($plant['status']); ?><br>
            Stage: <?php echo htmlspecialchars($plant['stage_name']); ?> <br>
            Days Since Planted: <?php echo $plant['days_since']; ?><br>
            Description: <?php echo htmlspecialchars($plant['description']); ?><br>
            <?php if ($plant['image']): ?>
                <img src="<?php echo $plant['image']; ?>" alt="Growth Stage Image" style="width:200px;">
            <?php else: ?>
                <p>No image available.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <form>
      <input type="button" value="Go to addplants" onclick="window.location.href='addplant.php'">
      <input type="button" value="Delete plants" onclick="window.location.href='deleteplant.php'">
      <input type="button" value="Add diary entry" onclick="window.location.href='Final_Diary.php'">
      <input type="button" value="Logout" onclick="window.location.href='logout.php'">

    </form>
</body>
</html>
