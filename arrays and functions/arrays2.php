<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "table_arrays.css">
</head>
<body>
    <h1>PHP Operations (Fixed)</h1>

    <?php

    $array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    
    ?>

    <table>
        <tr>
            <th colspan="3">
                Array list:
            <?php foreach ($array as $x){
            echo $x . " ";
        }; ?>
            </th>   
        </tr>
        <tr>
            <td>Addition</td>
            <td>=</td>
            <td><?php $sum = 0;
        foreach ($array as $x){
            $sum += $x;
        }
        echo $sum; ?></td>
        </tr>
        <tr>
            <td>Subtraction</td>
            <td>=</td>
            <td><?php $sum = 0;
        foreach ($array as $x){
            $sum -= $x;
        }
        echo $sum; ?></td>

        </tr>
        <tr>
            <td>Multiplication</td>
            <td>=</td>
            <td><?php $product = 1;
        foreach ($array as $x){
            $product *= $x;
        }
        echo $product; ?></td>

        </tr>
        <tr>
            <td>Division</td>
            <td>=</td>
            <td><?php $result = 1;
        foreach ($array as $x){
            $result /= $x;
        }
        echo $result; ?></td>

        </tr>
    </table>


    
    
</body>
</html>