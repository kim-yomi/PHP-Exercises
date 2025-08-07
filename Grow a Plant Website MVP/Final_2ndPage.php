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
$username = $_SESSION['username'];

$plants = [];
$stmt = $conn->prepare("SELECT up.id AS userplant_id, up.nickname, up.image_path, up.date_added, up.status, up.last_watered, p.common_name, p.latin_name, p.water_frequency, p.id AS plant_id 
                        FROM userplants up 
                        JOIN plants p ON up.plant_id = p.id 
                        WHERE up.user_id = ?");
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
$selected_id = $_GET['plant_id'] ?? null;
foreach ($plants as $plant) {
    if ($selected_id && $plant['userplant_id'] == $selected_id) {
        $selectedPlant = $plant;
        break;
    }
}
if (!$selectedPlant && !empty($plants)) {
    $selectedPlant = $plants[0];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Grow a Plant</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Final_Styles2.css">
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
        <a href="Final_Diary.php">Diary</a>
        <a href="Final_Learn.php">Learn</a>
        <a href="Final_AboutUs.php">About Us</a>
        <a href="Finals_logout.php" class="logout">Log Out</a>
      </nav>
    </div>

    <main class="container">
      <aside class="plant-menu">
        <?php foreach ($plants as $plant): ?>
          <a href="Final_2ndPage.php?plant_id=<?= $plant['userplant_id'] ?>" class="plant-box">
            <img src="<?= htmlspecialchars($plant['image_path']) ?>" alt="<?= htmlspecialchars($plant['nickname']) ?>" width="50"><br>
            <span class="nickname"><?= htmlspecialchars(strip_tags($plant['nickname'])) ?></span>
          </a>
        <?php endforeach; ?>
        <a href="Final_Learn.php" class="plant-box add">+</a>
      </aside>

      <section class="plant-info">
        <?php if ($selectedPlant): ?>
          <h1><?= htmlspecialchars($selectedPlant['common_name']) ?></h1>
          <h2><em><?= htmlspecialchars($selectedPlant['latin_name']) ?></em></h2>
          <p class="plant-date">
            You planted <strong><?= htmlspecialchars(strip_tags($selectedPlant['nickname'])) ?></strong> on 
            <?= date("F j, Y", strtotime($selectedPlant['date_added'])) ?>
          </p>

          <div class="alerts">
            <p>
              <strong>🔔 Water every <?= htmlspecialchars($selectedPlant['water_frequency']) ?> days.</strong><br>
              Last watered: <strong><?= htmlspecialchars($selectedPlant['last_watered']) ?></strong>
            </p>
            <p>
              <strong>📌 Status:</strong> <?= htmlspecialchars($selectedPlant['status']) ?><br>
              <span class="highlight">Adjust sunlight/water if needed.</span>
            </p>
          </div>

          <div class="plant-status">
            <img src="<?= htmlspecialchars($selectedPlant['image_path']) ?>" alt="Plant Status">
            <div>
              <p>According to your logs, your plant is:</p>
              <h3><?= htmlspecialchars($selectedPlant['status']) ?></h3>
              <p class="confirm">Is this correct? <button>Yes</button> <button>No</button></p>
            </div>
          </div>
        <?php else: ?>
          <p>No plants found. <a href="Final_Learn.php">Add one now</a>.</p>
        <?php endif; ?>
      </section>

      <section class="diary-section">
        <h3>Personal Garden Diary</h3>
        <?php if ($selectedPlant): ?>
          <form action="Final_Diary_Save.php" method="post">
            <input type="hidden" name="plant_id" value="<?= $selectedPlant['userplant_id'] ?>">
            <label>Date: <input type="date" name="date_entry_added" value="<?= date('Y-m-d') ?>" required></label>
            <textarea name="entry_content" placeholder="Write about how your plant is doing..." required></textarea>
            <label for="current_status">Status:</label>
            <select name="current_status" id="current_status">
              <option value="Healthy">Healthy</option>
              <option value="Dry">Dry</option>
              <option value="Overwatered">Overwatered</option>
              <option value="Rotting">Rotting</option>
            </select>
            <button type="submit" class="view-button">Save Entry</button>
          </form>

          <div class="daily-log">
            <h3>Daily Log</h3>
            <label>💧 Water (ml): <input type="number" name="water_amount"></label>
            <label>☀️ Sunny? <input type="checkbox" name="sunny"></label>
            <label>🌿 Dry? <input type="checkbox" name="dry"></label>
          </div>
        <?php endif; ?>
      </section>
    </main>
  </div>
</body>
</html>
