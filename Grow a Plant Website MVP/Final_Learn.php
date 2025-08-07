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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_plant'])) {
    $nickname = $_POST['nickname'];
    $date_added = $_POST['date_added'];
    $last_watered = $_POST['last_watered'];
    $common_name = $_POST['common_name'];
    $user_id = $_SESSION['user_id'];

    $plant_folder = strtolower($common_name);
    $image_path = "assets/$plant_folder/{$plant_folder}Stage1.png";

    $stmt = $conn->prepare("SELECT id FROM Plants WHERE common_name = ?");
    $stmt->bind_param("s", $common_name);
    $stmt->execute();
    $result = $stmt->get_result();
    $plant_id = ($result->num_rows > 0) ? $result->fetch_assoc()['id'] : null;
    $stmt->close();

    if ($plant_id !== null) {
        $stmt = $conn->prepare("INSERT INTO UserPlants (user_id, plant_id, date_added, last_watered, nickname, image_path) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissss", $user_id, $plant_id, $date_added, $last_watered, $nickname, $image_path);

        if ($stmt->execute()) {
            echo "<p style='color:lime'>🌱 Plant successfully added to your garden!</p>";
        } else {
            echo "<p style='color:red'>❌ Failed to add plant: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        echo "<p style='color:red'>❗ Plant not found in database.</p>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Common Tomato</title>
  <link rel="stylesheet" href="Final_LearnStyles.css" />
  <style>
    body, html {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }

    .background {
      background: url('Assets/background.png') no-repeat center center/cover;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .main-wrapper {
      padding: 60px 100px;
    }

    .go-back {
      margin-bottom: 20px;
      text-align: right;
      margin-right: 10px;
    }


    .go-back a {
      color: white;
      text-decoration: underline;
      font-weight: bold;
    }

    .plant-container {
      background-color: rgba(0, 0, 0, 0.4);
      padding: 30px;
      border-radius: 12px;
    }

    .header-row {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-bottom: 2px solid white;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }

    .header-left {
      display: flex;
      flex-direction: column;
    }

    .header-left h1 {
      font-size: 3.5rem;
      font-weight: bold;
      margin: 0;
    }

    .header-left em {
      font-size: 1.4rem;
      color: #ccc;
      margin-top: 5px;
    }

    .header-icon img {
      width: 60px;
      height: auto;
    }

    .info-section {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 30px;
    }

    .info-text {
      flex: 3;
      font-size: 1.1rem;
      line-height: 1.8;
    }

    .info-image img {
      width: 300px;
      height: auto;
      border-radius: 8px;
    }

    .track-button {
      margin-top: 20px;
      text-align: right;
    }

    .track-button a {
      color: white;
      font-weight: bold;
      text-decoration: underline;
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <div class="background">
    <div class="navbar">
      <div class="logo-container">
        <img src="assets/logo.png" alt="Grow a Plant Logo" class="logo-img" width="40">
        Grow a Plant
      </div>
      <nav>
       <a href="<?php echo isset($_SESSION['username']) ? 'Final_2ndPage.php' : 'Final_1stPage.php'; ?>">Home</a>
        <a href="Final_Diary.php">Diary</a>
        <a href="">Learn</a>
        <a href="Final_AboutUs.php">About Us</a>
        <a href="Finals_logout.php" class="logout">Log Out</a>
      </nav>
    </div>

    <div class="main-wrapper">
      <div class="go-back">
        <a href="#" onclick="history.back(); return false;">Go Back</a>
      </div>

      <div class="plant-container">
        <div class="track-button plant-tabs">
          <button onclick="loadPlant('tomato')">Tomato</button>
          <button onclick="loadPlant('eggplant')">Eggplant</button>
          <button onclick="loadPlant('garlic')">Garlic</button>
          <button onclick="loadPlant('pechay')">Pechay</button>
          <button onclick="loadPlant('potato')">Potato</button>
          <button onclick="loadPlant('sunflower')">Sunflower</button>
        </div>


          <div class="header-row">
            <div class="header-left">
              <h1 id="plant-title">Common Tomato</h1>
              <em id="plant-scientific">Solanum lycopersicum</em>
            </div>
            <div class="header-icon">
              <img id="plant-icon" src="assets/tomato/tomatoStage3.png" alt="Plant Icon">
            </div>
          </div>

          <div class="info-section">
            <div class="info-text" id="plant-description">
              Tomatoes are rich in vitamins, require regular watering and prefer warm climates. They thrive in well-draining soil and full sun.
            </div>
            <div class="info-image">
              <img id="plant-photo" src="assets/tomato/tomatoPhoto.png" alt="Plant Photo">
            </div>
          </div>


        <div class="track-button">
          <a href="#" onclick="document.getElementById('addPlantForm').style.display='block'; return false;" class="track-button">Track In Your Garden</a>
          <form method="post" action="" id="addPlantForm" style="display: none; margin-top: 20px;">
            <h3>Add This Plant to Your Garden</h3>
            <input type="hidden" name="common_name" value="Tomato">
            <label>Nickname: <input type="text" name="nickname" required></label><br>
            <label>Date Planted: <input type="date" name="date_added" value="<?= date('Y-m-d') ?>" required></label><br>
            <label>Last Watered: <input type="date" name="last_watered" value="<?= date('Y-m-d') ?>" required></label><br>
            <input type="submit" name="add_plant" value="Add Plant">
          </form>

          
        </div>
      </div>
    </div>
  </div>
  </div>
  
<script>
  const plantData = {
    tomato: {
      name: "Common Tomato",
      scientific: "Solanum lycopersicum",
      icon: "assets/tomato/tomatoStage3.png",
      photo: "assets/tomato/tomatoPhoto.png",
      description: "Tomatoes are rich in vitamins, require regular watering and prefer warm climates. They thrive in well-draining soil and full sun."
    },
    eggplant: {
      name: "Eggplant",
      scientific: "Solanum melongena",
      icon: "assets/eggplant/eggplantStage3.png",
      photo: "assets/eggplant/eggplantPhoto.png",
      description: "Eggplants prefer hot weather and well-drained soil. They are sensitive to frost and need consistent watering."
    },
    garlic: {
      name: "Garlic",
      scientific: "Allium sativum",
      icon: "assets/garlic/garlicStage3.png",
      photo: "assets/garlic/garlicPlant.png",
      description: "Garlic needs full sun and is planted in cool weather. It grows from cloves and matures in several months."
    },
    pechay: {
      name: "Pechay",
      scientific: "Brassica rapa",
      icon: "assets/pechay/pechayStage3.png",
      photo: "assets/pechay/pechayPlant.png",
      description: "Pechay is a leafy green that grows fast in moist, fertile soil. It prefers partial shade and consistent moisture."
    },
    potato: {
      name: "Potato",
      scientific: "Solanum tuberosum",
      icon: "assets/potato/potatoStage3.png",
      photo: "assets/potato/potatoPlant.png",
      description: "Potatoes grow from tubers and need loose soil, regular watering, and full sun. Harvest when leaves yellow."
    },
    sunflower: {
      name: "Sunflower",
      scientific: "Helianthus annuus",
      icon: "assets/sunflower/sunflowerStage3.png",
      photo: "assets/sunflower/sunflowerPlant.png",
      description: "Sunflowers need full sun and well-drained soil. They're known for tracking the sun and growing tall rapidly."
    }
  };

  function loadPlant(key) {
    const plant = plantData[key];
    if (!plant) return;

    document.getElementById('plant-title').textContent = plant.name;
    document.getElementById('plant-scientific').textContent = plant.scientific;
    document.getElementById('plant-icon').src = plant.icon;
    document.getElementById('plant-photo').src = plant.photo;
    document.getElementById('plant-description').textContent = plant.description;
    document.querySelector('input[name="common_name"]').value = plant.name;
  }
</script>


</body>
</html>
