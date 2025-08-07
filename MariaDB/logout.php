<?php
session_start();
?>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="s4.css">
        <title>Session Example</title>
    </head>


<div class = "bcontainer">
    <?php
    echo "Goodbye, " . $_SESSION['uname'] . "!<br>";
    echo "See you again next time!";
    ?>

</div>

</body>
</html>
<?php
session_unset();
session_destroy();
?>