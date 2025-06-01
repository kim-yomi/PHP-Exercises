<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "table_arrays.css">
</head>
<body>
    <h1>PHP Operations (With Functions)</h1>

    <?php

    $array = array(25, 13, 16);

    function displayArray($array){
        foreach ($array as $x){
            echo $x . " ";
        }
    }

    function addArray($array){
        $sum = 0;
        foreach ($array as $x){
            $sum += $x;
        }
        echo $sum;
    }

    function subtractArray($array){
        $sum = 0;
        foreach ($array as $x){
            $sum -= $x;
        }
        echo $sum;
    }

    function multiplyArray($array){
        $product = 1;
        foreach ($array as $x){
            $product *= $x;
        }
        echo $product;
    }

    function divideArray($array){
        $result = 1;
        foreach ($array as $x){
            $result /= $x;
        }
        echo $result;
    }
    
    ?>


    <table>
        <tr>
            <th colspan="3">
                Array list:
            <?php echo displayArray($array); ?>
            </th>   
        </tr>
        <tr>
            <td>Addition</td>
            <td>=</td>
            <td><?php addArray($array) ?></td>
        </tr>
        <tr>
            <td>Subtraction</td>
            <td>=</td>
            <td><?php subtractArray($array) ?></td>

        </tr>
        <tr>
            <td>Multiplication</td>
            <td>=</td>
            <td><?php multiplyArray($array) ?></td>

        </tr>
        <tr>
            <td>Division</td>
            <td>=</td>
            <td><?php divideArray($array) ?></td>

        </tr>
    </table>


    
    
</body>
</html>