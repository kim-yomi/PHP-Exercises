<?php
// set the expiration date to one hour ago
setcookie("user", "", time() - (86400 * 31), "/");
?>
<html>
<body>
 
<?php
echo "Cookie 'user' is deleted.";
?>
 
</body>
</html>