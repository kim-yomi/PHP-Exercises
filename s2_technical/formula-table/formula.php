<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="formula.css">
    <title>Document</title>
</head>
<body>
    <?php

    define("PI", 3.14159265358979323846);

    function solveVCube($side){
        $result = $side * $side * $side;
        return $result;
    }

    function solveVRRPrism($length, $width, $height){
        $result = $length * $width * $height;
        return $result;
    }

    function solveVCylinder($radius, $height){
        $result = PI * $radius * $radius * $height;
        return $result;
    }

    function solveVCone($radius, $height){
        $result = PI * $radius * $radius * $height/3;
        return $result;
    }

    function solveVSphere($radius){
        $result = 4/3 * PI * $radius * $radius * $radius;
        return $result;
    }

    $shapes = array(
        array("values"=>"s=5", "formula"=>"V = s^3", "result"=>solveVCube(5)),
        array("values"=>"l=3, w=4, h=5", "formula"=>"V = l * w * h", "result"=>solveVRRPrism(3, 4, 5)),
        array("values"=>"r=2, h=6", "formula"=>"V = π * r^2 * h", "result"=>solveVCylinder(2, 6)),
        array("values"=>"r=2, h=6", "formula"=>"V = (1/3) * π * r^2 * h", "result"=>solveVCone(2, 6)),
        array("values"=>"r=3", "formula"=>"V = (4/3) * π * r^3", "result"=>solveVSphere(3))
    );

    ?>

<h1>Formulas for Volume</h1>

<table>
    <tr>
        <th>Values</th>
        <th>Formula</th>
        <th>Result</th>
    </tr>
    
    <?php foreach ($shapes as $shape): ?>
    <tr>
    <td><?php echo $shape['values']; ?></td>
    <td><?php echo $shape['formula']; ?></td>       
    <td><?php echo $shape['result']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>


</body>
</html>