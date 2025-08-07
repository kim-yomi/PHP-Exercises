<html>
<head>
   <title>PHP Sessions: How to Use $_SESSION to Manage User Data</title>
   <meta name="keywords" content="PHP Sessions, PHP $_SESSION, Manage User Data in PHP, PHP session_start, session variables, PHP session tutorial">
</head>
<body>
   <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <h3>User's ID: <input type="text" name="ID"/></h3>
      <h3>Your Name: <input type="text" name="name"/></h3>
      <h3>Enter Age: <input type="text" name="age"/></h3>
      <input type="submit" value="Submit"/>
   </form>
   <?php
      session_start();
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $_SESSION['UserID'] = $_POST['ID'];
         $_SESSION['Name'] = $_POST['name'];
         $_SESSION['age'] = $_POST['age'];
      }
      echo "Following Session Variables Created: \n";
 
      foreach ($_SESSION as $key=>$val)
      echo "<h3>" . $key . "=>" . $val . "</h3>";
      echo "<br/>" . '<a href="anotherpage.php">Click Here</a>';
   ?>
</body>
</html>