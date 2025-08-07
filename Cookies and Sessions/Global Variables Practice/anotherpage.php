<?php
session_start();
   echo "<h2>Following Session variables Read:</h2>";
   foreach ($_SESSION as $key=>$val)
   echo "<h3>" . $key . "=>" . $val . "</h3>";
?>