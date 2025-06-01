<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="fruit-table.css">
    <title>Document</title>
</head>
<body>
    <?php 
    $berries = array(
        array("name"=>"Oran Berry", "description"=>"Nature's gifts came together 
        as one in this Berry. It has a wondrous mix of flavors that spread in the 
        mouth.", "facts"=>"
        If the holder's HP reaches ½, the Oran Berry is consumed, and the Pokémon's 
        health is increased by 10. It can also be used as a Bag item, which does the 
        same effect to the selected Pokémon."),
        array("name"=>"Sitrus Berry", "description"=>"Sitrus came from the same 
        family as Oran. It is larger and smoother tasting than Oran.", "facts"=>"
        If the holder's HP reaches ½, the Sitrus Berry is consumed, and the Pokémon's
        health is increased by ¼ of its maximum HP. It can also be used as a Bag item, 
        which does the same effect to the selected Pokémon."),
        array("name"=>"Cheri Berry", "description"=>"This bright red Berry is very 
        spicy and has a provocative flavor. It blooms with delicate, pretty flowers.", 
        "facts"=>"
        It can be held by a Pokémon and the Pokémon will automatically eat it once 
        it is paralyzed."),
        array("name"=>"Chesto Berry", "description"=>"This Berry's thick skin and
        fruit are very tough and dry tasting. However, every bit of it can be eaten.", "facts"=>"
        In a battle, if a Pokémon is holding a Chesto Berry, it can cure their sleep 
        instantly. It can also be used like an item also to cure sleep."),
        array("name"=>"Rawst Berry", "description"=>"If the leaves grow longer and 
        curlier than average, this Berry will have a somewhat-bitter taste.", "facts"=>"
        It can be held by a Pokémon and the Pokémon will automatically eat it once 
        it is burned."),
        array("name"=>"Leppa Berry", "description"=>"It takes longer to grow than 
        Berries such as Cheri. The smaller Berries taste better.", "facts"=>"
        If held by a Pokémon, a Leppa Berry is used to restore 10 PP to the first 
        move that drops to a PP of 0."),
        array("name"=>"Aguav Berry", "description"=>"This Berry turns bitter toward 
        the stem. The dainty flower it grows from doesn't absorb much sunlight.", "facts"=>"
        If the holder's HP reaches ¼, the Aguav Berry is consumed. The Pokémon's health 
        is increased by ⅓ of its maximum HP, but it will also be confused if it 
        dislikes the bitter flavor."),
        array("name"=>"Razz Berry", "description"=>"This red berry tastes slightly spicy. 
        It grows quickly in just four hours.", "facts"=>"
        After giving it to the wild Pokémon, it increases the chance of catching it for 
        the next attempt only."),
        array("name"=>"Aspear Berry", "description"=>"This Berry's peel is hard, 
        but the flesh inside is very juicy. It is distinguished by its bracing sourness.", "facts"=>"
        It can be held by a Pokémon and the Pokémon will automatically eat it once 
        it is frozen."),
        array("name"=>"Figy Berry", "description"=>"This Berry is oddly shaped, 
        appearing as if someone took a bite out of it. It is packed full of spicy 
        substances.", "facts"=>"
        If the holder's HP reaches ¼, the Figy Berry is consumed. The Pokémon's health 
        is increased by ⅓ of its maximum HP, but it will also be confused if it dislikes 
        the spicy flavor.")
    );

    usort($berries, function($a, $b){
        return strcmp($a['name'], $b['name']);
    });
    ?>


<h1>10 Berries in Pokemon</h1>

<table>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Facts</th>
    </tr>
    
    <?php foreach ($berries as $berry): ?>
    <tr>
    <td><img src="berry images/<?php echo $berry['name']; ?>.jpg" width="100"></td> 
    <td><?php echo $berry['name']; ?></td>
    <td><?php echo $berry['description']; ?></td>       
    <td><?php echo $berry['facts']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

    
</body>
</html>
    