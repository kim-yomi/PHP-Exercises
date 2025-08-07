<!-- Superglobals $_REQUEST with POST Method Demo-->
<html>
<body>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <p>First Name: <input type="text" name="first_name" /></p>
      <p>Last Name: <input type="text" name="last_name" /></p>
      <input type="submit" value="Submit" />
   </form>
   <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      echo "<h3>First Name: " . $_REQUEST['first_name'] . "<br />"
      . "Last Name: " . $_REQUEST['last_name'] . "</h3>";
   ?>
</body>
</html>