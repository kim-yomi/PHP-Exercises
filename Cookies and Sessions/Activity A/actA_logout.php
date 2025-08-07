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
    echo "Goodbye, " . $_SESSION['username'] . "!<br>";
    echo "See you again next time!";
    ?>

</div>

</body>
</html>
<?php
session_unset();
session_destroy();
?>