<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grow a Plant - About Us</title>
    <link rel="stylesheet" href="Final_AboutUsStyles.css">

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
                <?php if (isset($_SESSION['username'])): ?><a href="Final_Diary.php">Diary</a>
                <?php else: ?>
                    <a href="Final_1stPage.php">Diary</a>
                <?php endif; ?>

                <?php if (isset($_SESSION['username'])): ?><a href="Final_Learn.php">Learn</a>
                <?php else: ?>
                    <a href="Final_1stPage.php">Learn</a>
                <?php endif; ?>

                <a href="">About Us</a>
                <?php if (isset($_SESSION['username'])): ?><a href="Finals_logout.php">Log out</a>
                <?php else: ?>
                    <a href="Final_1stPage.php">Log in</a>
                <?php endif; ?>
            </nav>
        </div>

        <div class="team-section">
            <div class="logos-top">
                <img src="assets/feutech.png" alt="FEU Logo"> 
                <img src="assets/logo.png" alt="Grow a Plant Logo"> 
            </div>

            <div class="team-grid">
                <div class="member">
                    <img src="assets/us/albert.png" alt="Albert Aguila"> 
                    <h3>Albert Aguila</h3>
                    <p>Main Programmer</p>
                </div>
                <div class="member">
                    <img src="assets/us/ina.png" alt="Ina Bautista"> 
                    <h3>Ina Bautista</h3>
                    <p>UI/UX Designer</p>
                </div>
                <div class="member">
                    <img src="assets/us/chowong.png" alt="Chorong Kim"> 
                    <h3>Chorong Kim</h3>
                    <p>Database Manager</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
