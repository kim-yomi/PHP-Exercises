<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Grade Results</title>
    <link rel = "stylesheet" href="result.css">
  </head>
  <body>

  <?php
  $firstName = $_GET['fname'];
  $lastName = $_GET['lname'];
  $grade = $_GET['grade'];
?>

<div>
    <h2>Grade Results</h2>
<?php
  echo "First Name: $firstName<br/>";
  echo "Last Name: $lastName<br/>";
  echo "Grade: $grade<br/>";
  if ($grade >= 93 && $grade <= 100){
    echo "Your ranking is A";
  }
  elseif($grade >= 90 && $grade <= 92){
    echo "Your ranking is A-";
  }
  elseif($grade >= 87 && $grade <= 89){
    echo "Your ranking is B+";
  }
  elseif($grade >= 83 && $grade <= 86){
    echo "Your ranking is B";
  }
  elseif($grade >= 80 && $grade <= 82){
    echo "Your ranking is B-";
  }
  elseif($grade >= 77 && $grade <= 79){
    echo "Your ranking is C+";
  }
  elseif($grade >= 73 && $grade <= 76){
    echo "Your ranking is C";
  }
  elseif($grade >= 70 && $grade <= 72){
    echo "Your ranking is C-";
  }
  elseif($grade >= 67 && $grade <= 69){
    echo "Your ranking is D+";
  }
  elseif($grade >= 63 && $grade <= 66){
    echo "Your ranking is D";
  }
  elseif($grade >= 60 && $grade <= 62){
    echo "Your ranking is D-";
  }
  elseif($grade <= 60){
    echo "Your ranking is F";
  }
  else{
    echo "Invalid grade.";
  }
  ?>
</div>

  
</body>
</html>