<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grow a Plant</title>
    <link rel="stylesheet" href="Final_Styles1.css">

</head>
<body>
    <?php session_start(); ?>
    <div class="background">
        <div class="navbar">
            <div class="logo-container">
                <img src="Assets/logo.png" alt="Grow a Plant Logo" class="logo-img" width="40">
                Grow a Plant
            </div>
            <nav>
                <a href="">Home</a>
                <a onclick="showLogin()">Diary</a>
                <a onclick="showLogin()">Learn</a>
                <a href="Final_AboutUs.php">About Us</a>
                <a onclick="showLogin()">Log in</a>
            </nav>
        </div>

        <div class="hero">
            <div class="hero-text">
                <h1>Making gardening<br>more accessible;</h1>
                <p>Helping you achieve your home garden dreams, we guide you every step of the way from propagation to produce!</p>
            </div>

            <div class="right-panel">
                <div class="hero-buttons" id="heroButtons">
                    <button onclick="showRegister()">Start your journey</button>
                    <button onclick="showLogin()">Log In</button>
                    <button onclick="location.href='Final_AboutUs.php'">About</button>
                </div>

                <form class="login-form" id="registerForm" action="Final_Registration_script.php" method="post" style="display: none; background-color: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 10px;">
                    <input type="text" name="username" placeholder="Username" required style="width: 100%; margin: 10px 0; padding: 10px; border-radius: 6px; border: none; font-size: 0.9rem; box-sizing: border-box;">
                    
                    <input type="email" name="email" placeholder="Email" required style="width: 100%; margin: 10px 0; padding: 10px; border-radius: 6px; border: none; font-size: 0.9rem; box-sizing: border-box;">
                    
                    <input type="password" name="password" placeholder="Password" required style="width: 100%; margin: 10px 0; padding: 10px; border-radius: 6px; border: none; font-size: 0.9rem; box-sizing: border-box;">
                    
                    <button type="submit" style="background: #ffffffbb; color: #000; font-weight: bold; border-radius: 6px; padding: 10px; width: 100%; border: none; cursor: pointer;">Register</button>
                </form>




                </div>

                <form class="login-form" id="loginForm" action="FinalProj_login.php" method="post">
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit">Log In</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showLogin() {
            const buttons = document.getElementById('heroButtons');
            const login = document.getElementById('loginForm');
            
            buttons.classList.add('hide');
            setTimeout(() => {
                buttons.style.display = 'none';
                login.classList.add('show');
            }, 500);    
        }

        function showRegister() {
            const buttons = document.getElementById('heroButtons');
            const register = document.getElementById('registerForm');
            const login = document.getElementById('loginForm');
            
            buttons.classList.add('hide');
            login.style.display = 'none';

            setTimeout(() => {
                buttons.style.display = 'none';
                register.style.display = 'block';
                register.classList.add('show');
            }, 500);
        }


    </script>
    
</body>
</html>
