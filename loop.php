<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Grade Results</title>
  </head>
  <body>

  <?php
  for($i = 0; $i < 100; $i++){
    echo str_pad($i, 2, '0', STR_PAD_LEFT).",";
  }

  $one = 1;
  $two = 2;
  $result = $one + $two;
  echo $result;

  ?>

  
</body>
</html>

