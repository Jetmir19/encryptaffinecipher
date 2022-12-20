<?php

$text = 0;
$celesi1 = 0;
$celesi2 = 0;
$decimal = 0;
$split1 = 0;
$split2 = 0;
$split22 = 0;
$y = 0;
$mod = 0;
$combined_arr[] = 0;
$shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
$numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];


if (isset($_GET['submit'])) :
    $text = $_GET['text'];
    $textarray = str_split($text); // variabla $text nga inputi, e konvertuar ne index arrray
    print_r($combined_arr);
    $combined_arr = array_combine($shkronjat, $numrat); //konvertim ne array



    $celesi1 = $_GET['celesi1'];
    $celesi2 = $_GET['celesi2'];



    $mod = $text + ($celesi1 * $celesi2);

    $decimal = $mod / count($combined_arr); // mod pjestim, numri total i shkonjave te alfabetiti anglez qe eshte 26


    $split1 =  (int)$decimal;         //  pjesa e pare e pjeses dhjetore
    $split2  = ($decimal - (int) $decimal) * 100;  // pjesa e dyte e pjese dhjetore
    $split22 = (int) $split2; //largimi i zeros para pikes dhjetore


    $y = abs(($split1 * $split22) - $mod); //largimi i minusit 
// $split2 = ltrim($str, '0');
// $result = array_diff($textarray, $combined_arr);

// print_r($textarray);
// echo "</br>";
// print_r($combined_arr);
// echo "</br>";
// // print_r($result);
// echo  "</br>";

//
endif; ?>


<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>
<?php print_r($combined_arr); ?>
<h2>Tabela alfa numerike per enkyptim</h2>
<table style="width:100%">

    <tr>
        <?php
        foreach ($shkronjat as $shkronja) {
        ?>
            <td align="center"><?php echo $shkronja; ?></td>
        <?php
        }
        ?>
    </tr>


    <tr>
        <?php
        foreach ($numrat as $nr) {
        ?>
            <td align="center"><?php echo $nr ?></td>
        <?php
        }
        ?>

    </tr>
</table>

</br>
</br>
</br>

<form action="" method="get">
    <label for="text">jepe numrin e shkronjes per enkryptim</label>
    <input type="number" name="text" value="" min="1" max="26" />
    -----------
    <label for="text">jepe celesi 1</label>
    <input type="number" name="celesi1" value="" min="1" max="6" />
    ------
    <label for="text">jepe celesi 2</label>
    <input type="number" name="celesi2" value="" min="1" max="6" />
    <button type="sumbit" name="submit" value="submit"> submit</button>

</form>

<?php

// print_r($value);

echo "</br>";
echo "</br>";

echo "</br>";
foreach ($combined_arr as $key1 => $value1) {
    if ($value1 == $text) {
        echo "-'<b>'$key1'</b>' - eshte shkronje qe i pershtatet numrit:'<b>'$value1'</b>' ";

        echo "</br>";

        // echo  "teksti hyres :" . $text . "</br>";
        echo  "celesi pare :" . $celesi1 . "</br>";
        echo  "celesi dyte :" . $celesi2 . "</br>";
        echo  "----mod----:" . $mod . "</br>";
        echo  "Decimal-- :" . $decimal . "</br>";
        echo  "split1----- :" . $split1 . "</br>";
        echo  "split2------:" . $split22 . "</br>";
        // echo  "Y eshte :" . $y . "</br>";






        foreach ($combined_arr as $key => $value) {
            if ($value == $y) {
                echo " -  Enkriptimi behet nga shkronja'<b>'$key1'</b>' -'<b>'$value1'</b>' ne shkronjen: '<b>'$key'</b>'- '<b>'$y'</b>' ";
            }
        }
    }
}
// print_r($combined_arr);




// if ($textarray = $combined_arr) {
//     echo $textarray;
//     echo $combined_arr;
// }


?>