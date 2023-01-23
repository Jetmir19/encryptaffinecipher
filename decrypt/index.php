<?php
// session_start();
// ob_start();
require_once  'decrypt/message.php';

$shkronjat = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z"];
$numrat = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];
$combined_arr = array_combine($numrat, $shkronjat); //konvertim ne array

print_r($combined_arr);
?>
<h2>Tabela alfa numerike per dekryptim Affine Cipher</h2>
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
<BR></BR>

<form action="decrypt/code.php" method="POST">


    <!-- Textarea with class .w-25 -->
    <div class="form-outline w-25 mb-4">
        <label class="form-label" for="textAreaExample4">Entry text for decryption</label>
        <textarea class="form-control" name="d_text" id="d_text" rows="3" style="text-transform:uppercase"></textarea>
    </div>



    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Key1 x</span>
        <input type="number" number="form-control" name="d_celesi1" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
        .....
        <span class="input-group-text" id="basic-addon1">Key2 +</span>
        <input type="number" number="form-control" name="d_celesi2" value="" min="1" max="7" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
    </div>




    </div>
    <button type="sumbit" name="submit" value="submit"> submit</button>
</form>


<?php
echo "</br>";
echo "</br>";



require_once  'decrypt/tables.php';
?>