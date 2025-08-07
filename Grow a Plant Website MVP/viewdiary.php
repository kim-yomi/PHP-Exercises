<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "GAG";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$entries = [];
if (isset($_SESSION['username'])) {
    $user = $conn->real_escape_string($_SESSION['username']);
    $sql = "SELECT * FROM Diary WHERE username = '$user' ORDER BY date_entry_added DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $entries[] = $row;
        }
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Diary Entries</title>
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
        <a href="<?php echo isset($_SESSION['username']) ? 'Final_2ndPage.php' : 'Final_1stPage.php'; ?>">Home</a>
        <a href="Final_Diary.php">Diary</a>
        <a href="#">Learn</a>
        <a href="Final_AboutUs.php">About Us</a>
        <a href="Finals_logout.php" class="logout">Log Out</a>
      </nav>
    </div>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-item">
          <img src="assets/tomato/tomatoStage3.png" alt="Tomato Icon">
          <p>Planted July 2</p>
        </div>
        <div class="sidebar-item">
          <img src="assets/sunflower/sunflowerStage3.png" alt="Sunflower Icon">
          <p>Planted Yesterday</p>
        </div>
        <div class="sidebar-item">
          <p style="font-size: 2rem">+</p>
        </div>
      </div>

      <div class="main-content">
        <h2>Your Diary Entries</h2>
        <?php if (!empty($entries)): ?>
          <?php foreach ($entries as $entry): ?>
            <div class="entry-block" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; background-color:rgb(25, 92, 50);">
              <strong>Entry #<?php echo $entry['id']; ?></strong><br>
              <em>Date:</em> <?php echo $entry['date_entry_added']; ?><br>
              <p><?php echo nl2br(htmlspecialchars($entry['entry_content'])); ?></p>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <p>No diary entries found.</p>
        <?php endif; ?>

        <form>
          <input type="button" value="View Plants" onclick="window.location.href='viewplants.php'">
          <input type="button" value="Go to addplants" onclick="window.location.href='addplant.php'">
          <input type="button" value="Delete plants" onclick="window.location.href='deleteplant.php'">
          <input type="button" value="Add diary entry" onclick="window.location.href='Final_Diary.php'">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
