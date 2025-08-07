<?php
session_start();
session_destroy();
header("Location: Final_1stPage.php");
exit();
