<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "arrays1.css">
</head>
<body>

<?php

    $pokemon = array (
        array("no" => "1", "name"=> 'Primarina', "age"=>'5', "birthday"=>'January 10', "dex_no"=>'0730' ),
        array("no" => "2", "name"=>'Greninja', "age"=>'8', "birthday"=>'December 8', "dex_no"=>'0658'),
        array("no" => "3", "name"=>'Sylveon', "age"=>'3', "birthday"=>'February 14', "dex_no"=>'0700'),
        array("no" => "4", "name"=>'Milotic', "age"=>'11', "birthday"=>'January 1', "dex_no"=>'0350'),
        array("no" => "5", "name"=>'Mimikyu', "age"=>'2', "birthday"=>'October 30', "dex_no"=>'0778'),
        array("no" => "6", "name"=>'Dragonair', "age"=>'6', "birthday"=>'July 9', "dex_no"=>'0148'),
        array("no" => "7", "name"=>'Sableye', "age"=>'7', "birthday"=>'July 25', "dex_no"=>'0302'),
        array("no" => "8", "name"=>'Decidueye', "age"=>'10', "birthday"=>'April 24', "dex_no"=>'0724'),
        array("no" => "9", "name"=>'Infernape', "age"=>'9', "birthday"=>'September 15', "dex_no" => '0392'),
        array("no" => "10", "name"=>'Spheal', "age"=>'1', "birthday"=>'November 5', "dex_no" =>'0363')
    );

    usort($pokemon, function($a, $b){
        return strcmp($a['name'], $b['name']);
    });
    
?>

<div class="header">My 10 Favorite Pokemon</div>

<table>
    <tr>
        <th>no.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Age</th>
        <th>Birthday</th>
        <th>Contact Number</th>
    </tr>
    
    <?php foreach ($pokemon as $mon): ?>
    <tr>
        <td><?php echo $mon['no']; ?></td>
        <td><?php echo $mon['name']; ?></td>
        <td><img src="<?php echo ($mon['name']); ?>.jpg" width="300"></td>
        <td><?php echo $mon['age']; ?></td>
        <td><?php echo $mon['birthday']; ?></td>
        <td><?php echo $mon['dex_no']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

    
</body>
</html>