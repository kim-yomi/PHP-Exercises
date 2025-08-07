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
$message = "";
$selected_userplant_id = $_GET['plant_id'] ?? null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['entry_content'], $_POST['current_status'], $selected_userplant_id)) {
    $entry_content = $_POST['entry_content'];
    $date_entry_added = $_POST['date_entry_added'] ?? date("Y-m-d");
    $current_status = $_POST['current_status'];

    $stmt = $conn->prepare("SELECT plant_id FROM userplants WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $selected_userplant_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $plantData = $result->fetch_assoc();
    $plant_id = $plantData['plant_id'] ?? null;
    $stmt->close();

    if ($plant_id) {
        $stmt = $conn->prepare("INSERT INTO Diary (user_id, plant_id, date_entry_added, entry_content) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $user_id, $plant_id, $date_entry_added, $entry_content);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("UPDATE UserPlants SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $current_status, $selected_userplant_id);
        $stmt->execute();
        $stmt->close();

        $stmt = $conn->prepare("SELECT message FROM StatusMessage WHERE current_status = ?");
        $stmt->bind_param("s", $current_status);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $message .= "🌱 " . $row['message'];
        }
        $stmt->close();

        $message = "✅ Diary entry saved. " . $message;
    } else {
        $message = "❌ Plant not found or you don't own it.";
    }
}

$plants = [];
$stmt = $conn->prepare("SELECT up.id, up.plant_id, up.nickname, up.date_added, p.common_name FROM UserPlants up JOIN plants p ON up.plant_id = p.id WHERE up.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $days_since_added = (new DateTime())->diff(new DateTime($row['date_added']))->days;
    $stage_stmt = $conn->prepare("SELECT image_url FROM growthstage WHERE plant_id = ? AND days_required <= ? ORDER BY days_required DESC LIMIT 1");
    $stage_stmt->bind_param("ii", $row['plant_id'], $days_since_added);
    $stage_stmt->execute();
    $stage_result = $stage_stmt->get_result();
    if ($stage_row = $stage_result->fetch_assoc()) {
        $row['image_path'] = $stage_row['image_url'];
    }
    $stage_stmt->close();
    $plants[] = $row;
}
$stmt->close();

$selectedPlant = null;
$entries = [];
$stage_image = "assets/defaultPlant.png";

if ($selected_userplant_id) {
    $stmt = $conn->prepare("SELECT up.*, p.common_name, p.latin_name, p.water_frequency FROM userplants up JOIN plants p ON up.plant_id = p.id WHERE up.id = ? AND up.user_id = ?");
    $stmt->bind_param("ii", $selected_userplant_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $selectedPlant = $result->fetch_assoc();
    $stmt->close();

    if ($selectedPlant) {
        $days_since_added = (new DateTime())->diff(new DateTime($selectedPlant['date_added']))->days;

        $stmt = $conn->prepare("SELECT image_url FROM growthstage WHERE plant_id = ? AND days_required <= ? ORDER BY days_required DESC LIMIT 1");
        $stmt->bind_param("ii", $selectedPlant['plant_id'], $days_since_added);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $stage_image = $row['image_url'];
        }
        $stmt->close();

        $stmt = $conn->prepare("SELECT date_entry_added, entry_content FROM Diary WHERE user_id = ? AND plant_id = ? ORDER BY date_entry_added DESC");
        $stmt->bind_param("ii", $user_id, $selectedPlant['plant_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $entries[] = $row;
        }
        $stmt->close();
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plant Diary</title>
  <link rel="stylesheet" href="Final_DiaryStyles.css">
</head>
<body>
<div class="background">
  <div class="navbar">
    <div class="logo-container">
      <img src="Assets/logo.png" alt="Grow a Plant Logo" class="logo-img" width="40">
      Grow a Plant
    </div>
    <nav>
      <a href="Final_2ndPage.php">Home</a>
      <a href="">Diary</a>
      <a href="Final_Learn.php">Learn</a>
      <a href="Final_AboutUs.php">About Us</a>
      <a href="Finals_logout.php" class="logout">Log Out</a>
    </nav>
  </div>
  <div class="container">
    <div class="sidebar">
      <?php foreach ($plants as $plant): ?>
        <div class="sidebar-item">
          <a href="?plant_id=<?= $plant['id'] ?>">
            <img src="<?= htmlspecialchars($plant['image_path']) ?>" alt="<?= htmlspecialchars($plant['nickname']) ?> Icon">
            <p><?= htmlspecialchars($plant['nickname']) ?><br>Planted <?= date("F j", strtotime($plant['date_added'])) ?></p>
          </a>
        </div>
      <?php endforeach; ?>
      <div class="sidebar-item">
        <a href="Final_Learn.php" style="text-decoration: none;">
          <p style="font-size: 2rem; text-align: center;">+</p>
        </a>
      </div>
    </div>
    <div class="main-content">
      <?php if (!empty($message)): ?>
        <div class="status-message"> <?= $message ?> </div>
      <?php endif; ?>

      <?php if ($selectedPlant): ?>
        <h2>📔 Diary for <em><?= htmlspecialchars($selectedPlant['nickname']) ?></em></h2>
        <img src="<?= htmlspecialchars($stage_image) ?>" alt="Stage Image" style="width:100px;height:auto">

        <form method="post" action="?plant_id=<?= $selectedPlant['id'] ?>">
          <p>Date: <input type="date" name="date_entry_added" value="<?= date('Y-m-d') ?>" readonly></p>
          <p>Entry: <textarea name="entry_content" rows="5" cols="40" required></textarea></p>
          <label for="current_status">Choose a status:</label>
          <select name="current_status" id="current_status">
            <option value="Healthy">Healthy</option>
            <option value="Dry">Dry</option>
            <option value="Overwatered">Overwatered</option>
            <option value="Rotting">Rotting</option>
          </select><br><br>
          <input type="submit" value="Save Entry" />
        </form>

        <hr>
        <h3>📖 Previous Entries</h3>
        <?php if ($entries): ?>
          <ul>
            <?php foreach ($entries as $entry): ?>
              <li>
                <strong><?= htmlspecialchars($entry['date_entry_added']) ?>:</strong><br>
                <?= nl2br(htmlspecialchars($entry['entry_content'])) ?>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else: ?>
          <p>No entries yet for this plant.</p>
        <?php endif; ?>
      <?php else: ?>
        <p>Please select a plant from the left to view or add diary entries.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
