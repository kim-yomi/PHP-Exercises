<?php
session_start();
?>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="registration_mod.css">
        <title>Session Example</title>
    </head>


<div class = "bcontainer">
    <?php
    echo "Welcome, " . $_SESSION['username'] . "!<br>";
    echo "Your password is " . $_SESSION['password'] . "<br>";
    ?>
    <input type="button" value="Logout" onclick="window.location.href='actA_logout.php'">

</div>

</body>
</html>
