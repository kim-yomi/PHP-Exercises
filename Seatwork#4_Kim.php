<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    $grade_array = array();
    $string_array = array("racecar", "moon", "noon", "level", "civic", "deed", "yolo",
                            "pop", "push", "mom");
    
    echo "String before imploding: <br>";
    foreach($string_array as $string){
        echo $string;
    }

    echo '<br>';
    echo '<br>';

    $implode_array = implode(", ", $string_array);

    echo "String after imploding: <br>";
    echo $implode_array;

    for ($i = 0; $i < 10; $i++){
        $grade_array[$i] = rand(0, 100);
    }
    echo '<br>';
    echo '<br>';

    echo "Imploded string length: <br>";
    echo strlen($implode_array)."<br><br>";

    echo "Imploded string to upper: <br>";
    echo strtoupper($implode_array)."<br><br>";

    echo "Imploded string to lower: <br>";
    echo strtolower($implode_array)."<br><br>";

    echo "Imploded string first letter capitalized: <br>";
    echo ucfirst($implode_array)."<br><br>";

    echo "Imploded string every first letter of a word capitalized: <br>";
    echo ucwords($implode_array)."<br><br>";

    echo "Array of grades are: ";
    foreach($grade_array as $grade){
        echo $grade." ";
    }

    echo '<br>';
    echo '<br>';

    echo "Lowest Grade: ".min($grade_array)."<br>";
    echo "Highest Grade: ".max($grade_array)."<br>";
    echo "Average Grade: ".array_sum($grade_array)/count($grade_array)."<br>";

    echo '<br>';

    $birthday=date_create("2005-01-04");

    echo "My birthday is on ".date_format($birthday, 'l jS \of F Y h:i:s');

    ?>
</body>
</html>