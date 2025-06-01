<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Measure Conversion Chart - Lengths (UK)</title>
    <link rel = "stylesheet" href = "conversion.css">
</head>

<body>
        <?php

        $oneCentiToMilli = 1*10;
        $oneDeciToCenti = 1*10;
        $oneMetreToCenti = 1*100;
        $oneKiloToMetre = 1*1000;

        $oneFootToInch = 1*12;
        $oneYardToFeet = 1*3;
        $oneChainToYards = 1*22;
        $oneFurLongToYards = 1*220;
        $oneMileToYards = 1*1760;

        $oneMilliToInch = 1*0.03937;
        $oneCentiToInch = 1*0.39370;
        $oneMetreToInch = 1*39.37008;
        $oneMetreToFeet = 1*3.28084;
        $oneMetreToYard = 1*1.09361;
        $oneKiloToYard = 1*1093.6133;
        $oneKiloToMile = 1*0.62137;

        $oneInchToCenti = 1*2.54;
        $oneFootToCenti = 1*30.48;
        $oneYardToCenti = 1*91.44;
        $oneYardToMetre = 1*0.9144;
        $oneMileToMetre = 1*1609.344;
        $oneMileToKilo = 1*1.609344;

            ?>
        
        <h1>MEASURE CONVERSION CHART - LENGTHS (UK)</h1>
        <br/>
        <table>
            <tr>
                <th colspan="6">METRIC CONVERSIONS</th>
            </tr>
            <tr>
                <td>1 centimetre</td>
                <td>=</td>
                <td><?php echo "$oneCentiToMilli millimetres    " ?></td>
                <td>1 cm</td>
                <td>=</td>
                <td><?php echo "$oneCentiToMilli mm" ?></td>
            </tr>
            <tr>
                <td>1 decimetre</td>
                <td>=</td>
                <td><?php echo "$oneDeciToCenti centimetres    " ?></td>
                <td>1 dm</td>
                <td>=</td>
                <td><?php echo "$oneDeciToCenti cm" ?></td>
            </tr>
            <tr>
                <td>1 metre</td>
                <td>=</td>
                <td><?php echo "$oneMetreToCenti centimetres    " ?></td>
                <td>1 m</td>
                <td>=</td>
                <td><?php echo "$oneMetreToCenti cm" ?></td>
            </tr>
            <tr>
                <td>1 kilometre</td>
                <td>=</td>
                <td><?php echo "$oneKiloToMetre metres    " ?></td>
                <td>1 km</td>
                <td>=</td>
                <td><?php echo "$oneKiloToMetre m" ?></td>
            </tr>
        </table>
<br/>
        <table>
            <tr>
                <th colspan="6">IMPERIAL CONVERSIONS</th>
            </tr>
            <tr>
                <td>1 foot</td>
                <td>=</td>
                <td><?php echo "$oneFootToInch inches    " ?></td>
                <td>1 ft</td>
                <td>=</td>
                <td><?php echo "$oneFootToInch in" ?></td>
            </tr>
            <tr>
                <td>1 yard</td>
                <td>=</td>
                <td><?php echo "$oneYardToFeet feet    " ?></td>
                <td>1 yd</td>
                <td>=</td>
                <td><?php echo "$oneYardToFeet ft" ?></td>
            </tr>
            <tr>
                <td>1 chain</td>
                <td>=</td>
                <td><?php echo "$oneChainToYards yards    " ?></td>
                <td>1 ch</td>
                <td>=</td>
                <td><?php echo "$oneChainToYards yd" ?></td>
            </tr>
            <tr>
                <td>1 furlong</td>
                <td>=</td>
                <td><?php echo "$oneFurLongToYards yards    " ?></td>
                <td>1 fur</td>
                <td>=</td>
                <td><?php echo "$oneFurLongToYards yd" ?></td>
            </tr>
            <tr>
                <td>1 mile</td>
                <td>=</td>
                <td><?php echo "$oneMileToYards yards    " ?></td>
                <td>1 mi</td>
                <td>=</td>
                <td><?php echo "$oneMileToYards yd" ?></td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <th colspan="6">METRIC -> IMPERIAL CONVERSIONS</th>
            </tr>
            <tr>
                <td>1 millimetre</td>
                <td>=</td>
                <td><?php echo "$oneMilliToInch inches    " ?></td>
                <td>1 mm</td>
                <td>=</td>
                <td><?php echo "$oneMilliToInch in" ?></td>
            </tr>
            <tr>
                <td>1 centimetre</td>
                <td>=</td>
                <td><?php echo "$oneCentiToInch inches    " ?></td>
                <td>1 cm</td>
                <td>=</td>
                <td><?php echo "$oneCentiToInch in" ?></td>
            </tr>
            <tr>
                <td>1 metre</td>
                <td>=</td>
                <td><?php echo "$oneMetreToInch inches    " ?></td>
                <td>1 m</td>
                <td>=</td>
                <td><?php echo "$oneMetreToInch in" ?></td>
            </tr>
            <tr>
                <td>1 metre</td>
                <td>=</td>
                <td><?php echo "$oneMetreToFeet feet    " ?></td>
                <td>1 m</td>
                <td>=</td>
                <td><?php echo "$oneMetreToFeet ft" ?></td>
            </tr>
            <tr>
                <td>1 metre</td>
                <td>=</td>
                <td><?php echo "$oneMetreToYard yards    " ?></td>
                <td>1 m</td>
                <td>=</td>
                <td><?php echo "$oneMetreToYard yd" ?></td>
            </tr>
            <tr>
                <td>1 kilometre</td>
                <td>=</td>
                <td><?php echo "$oneKiloToYard yards    " ?></td>
                <td>1 km</td>
                <td>=</td>
                <td><?php echo "$oneKiloToYard yd" ?></td>
            </tr>
            <tr>
                <td>1 kilometre</td>
                <td>=</td>
                <td><?php echo "$oneKiloToMile miles    " ?></td>
                <td>1 km</td>
                <td>=</td>
                <td><?php echo "$oneKiloToMile mi" ?></td>
            </tr>
        </table>
        <br/>
        <table>
            <tr>
                <th colspan="6">IMPERIAL -> METRIC CONVERSIONS</th>
            </tr>
            <tr>
            <td>1 inch</td>
                <td>=</td>
                <td><?php echo "$oneInchToCenti centimetres    " ?></td>
                <td>1 in</td>
                <td>=</td>
                <td><?php echo "$oneInchToCenti cm" ?></td>
            </tr>
            <td>1 foot</td>
                <td>=</td>
                <td><?php echo "$oneFootToCenti centimetres    " ?></td>
                <td>1 ft</td>
                <td>=</td>
                <td><?php echo "$oneFootToCenti cm" ?></td>
            </tr>
            <td>1 yard</td>
                <td>=</td>
                <td><?php echo "$oneYardToCenti centimetres    " ?></td>
                <td>1 yd</td>
                <td>=</td>
                <td><?php echo "$oneYardToCenti cm" ?></td>
            </tr>
            <td>1 yard</td>
                <td>=</td>
                <td><?php echo "$oneYardToMetre metres    " ?></td>
                <td>1 yd</td>
                <td>=</td>
                <td><?php echo "$oneYardToMetre m" ?></td>
            </tr>
            <td>1 mile</td>
                <td>=</td>
                <td><?php echo "$oneMileToMetre metres    " ?></td>
                <td>1 mi</td>
                <td>=</td>
                <td><?php echo "$oneMileToMetre m" ?></td>
            </tr>
            <td>1 mile</td>
                <td>=</td>
                <td><?php echo "$oneMileToKilo kilometres    " ?></td>
                <td>1 mi</td>
                <td>=</td>
                <td><?php echo "$oneMileToKilo kilometres" ?></td>
            </tr>
        </table>

        <h3>Made by Chorong Kim</h3>
</body>
</html>