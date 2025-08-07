<?php
session_start();
?>
<html>
    <body>
        <head>
        <title>Session Example</title>
    </head>


<div class = "bcontainer">
    <?php
    echo "See you again next time!";
    ?>

</div>

</body>
</html>
<?php
session_unset();
session_destroy();
?>