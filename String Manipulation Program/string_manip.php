<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel ="stylesheet" href="string_manip.css">
</head>
<body>
    <?php

    $arrayOfNames = array('Primarina', 'Infernape', 'Rayquaza','Pikachu','Mimikyu',
    'Ho-oh','Solgaleo','Sableye','Milotic','Gyarados',
    'Steelix','Popplio','Raichu','Eeeve','Snorlax',
    'Drampa','Charizard','Spheal','Umbreon','Flareon');
    ?>
    <div class = "header">List of names: <?php 
            foreach ($arrayOfNames as $name){
                echo $name.", ";
            }
            ?>
    </div>

    <table>
        <tr>
            <th><p>Name</p></th>
            <th class = "col2"><p>Number of characters</p></th>
            <th><p>Uppercase first character</p></th>
            <th><p>Replace vowels with @</p></th>
            <th><p>Check position of character "a"</p></th>
            <th><p>Reverse name</p></th>
        </tr>

        <?php foreach ($arrayOfNames as $name): ?>
        <tr>
            <td><p><?php echo strtolower($name); ?></p></td>
            <td><p><?php echo strlen($name); ?></p></td>
            <td><p><?php echo ucfirst($name); ?></p></td>
            <td><p><?php $temp = $name; 
                    $temp = str_ireplace('a', '@', $temp);
                    $temp = str_ireplace('e', '@', $temp);
                    $temp = str_ireplace('i', '@', $temp);
                    $temp = str_ireplace('o', '@', $temp);
                    $temp = str_ireplace('u', '@', $temp);
                    echo $temp; ?></p></td>
            <td><p><?php echo stripos($name, "a"); ?></p></td>
            <td><p><?php echo strrev($name); ?></p></td>

        </tr>
        <?php endforeach; ?>
        </table>
</body>
</html>