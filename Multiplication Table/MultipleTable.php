<!DOCTYPE html>
<html>
    <head>
        <title>Multiplication Table</title>
        <link rel = "stylesheet" type = "text/css" href = "MultipleTable.css">
    </head>
        <body>
        <center><h1>MULTIPLICATION TABLE</h1></center>
    <center>
    <table>
        <?php
           
            for ($row = 0; $row <= 10; $row++) {
            echo "<tr>";
            for ($col = 0; $col <= 10; $col++) {
                $product = $row * $col;
                $class = (($row + $col) % 2 == 0) ? 'pink' : 'black';
                echo "<td class=\"$class\"> $product </td>";
            }
           echo "</tr>";
       }
       ?>
    </table>
    </center>
        </body>
</html>